<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\User\User;
use App\Mail\AccountCreated;
use App\Jobs\ProvisionGSuiteAccount;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewUser;
use App\Models\App\Organizations\Organization;
use App\Models\GSuite\GSuiteAccount;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin|super-admin');
    }

    public function index()
    {
        $users = User::all()->sortBy('last_name');
        return view('app.admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('app.admin.users.create');
    }

    public function show(User $user)
    {
        $organizations = Organization::all()->whereNotIn('id', $user->organizations->pluck('id'));
        $user->with(['roles', 'permissions', 'organizations']);
        return view('app.admin.users.show', compact('user', 'organizations'));
    }

    public function store(CreateNewUser $request)
    {
        // Create the user
        $user = User::create([
            'first_name' => ucfirst($request->first_name),
            'last_name' => ucfirst($request->last_name),
            'middle_name' => ucfirst($request->middle_name),
            'email' => strtolower($request->email),
            'password_reset_required' => true,
            'last_password_reset' => now()
        ]);

        // Assign the user role
        $user->assignRole('user');

        // Send the user a welcome email
        Mail::to($request->email)
            ->bcc('admin@us.af.mil')
            ->queue(new AccountCreated($user));

        // If the user needs a GSuite account, dispatch the job
        if ($request->has('needs_gsuite')) {
            $account = GSuiteAccount::create([
                'GSuiteable_id' => $user->id,
                'GSuiteable_type' => User::class,
                'gsuite_email' => GSuiteAccount::ensureUniqueEmailAddress("{$user->first_name}.{$user->last_name}@usaf.cloud"),
                'creating' => true,
            ]);
            ProvisionGSuiteAccount::dispatch($user, $account->gsuite_email);
        }

        return redirect()->route('app.admin.users.index')->with('status', 'User created!');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        if (auth()->user()->id <> $user->id && !$user->hasRole('super-admin')) {

            $user->delete();

            return redirect()->route('app.admin.users.index')->with('status', 'User Deleted!');
        }

        return abort(403);
    }
}
