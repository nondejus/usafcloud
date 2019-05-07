<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\User\User;
use App\Models\GSuite\GSuiteAccount;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewUser;
use App\Models\Organizations\Organization;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth', 'verified', 'role:super-admin'
        ]);
    }

    public function index()
    {
        $this->authorize('view', User::class);

        $users = User::all()->sortBy('first_name')->sortBy('last_name');

        return view('app.admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        $this->authorize('create', User::class);

        return view('app.admin.users.create');
    }

    public function show(User $user)
    {
        $this->authorize('create', User::class);

        $availableOrganizations = Organization::all()->whereNotIn('id', $user->organizations->pluck('id'));

        $user = $user->load(['roles', 'permissions', 'organizations']);

        return view('app.admin.users.show', [
            'user' => $user,
            'organizations' => $availableOrganizations
        ]);
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
            'last_password_reset' => null
        ]);

        // Assign the user role
        $user->assignRole('user');

        // If the user needs a GSuite account, dispatch the job
        if ($request->has('needs_gsuite')) {
            GSuiteAccount::create([
                'GSuiteable_id' => $user->id,
                'GSuiteable_type' => User::class,
                'gsuite_email' => GSuiteAccount::ensureUniqueEmailAddress("{$user->first_name}.{$user->last_name}@usaf.cloud"),
                'creating' => true,
            ]);
        }

        return redirect()->route('app.admin.users.index')->with('status', 'User created!');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('app.admin.users.index')->with('status', 'User Deleted!');
    }
}
