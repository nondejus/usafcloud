<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Mail\AccountCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewUser;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin|super-admin');
    }

    public function create()
    {
        return view('app.admin.users.create');
    }

    public function store(CreateNewUser $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'email' => $request->email,
            'password_reset_required' => true,
            'last_password_reset' => now()
        ]);

        $user->assignRole('user');

        Mail::to($request->email)
            ->cc('admin@us.af.mil')
            ->queue(new AccountCreated($user));

        return redirect()->route('app.admin.users.index')->with('status', 'User created!');
    }

    public function index()
    {
        $users = User::all()->load('roles.permissions')->sortBy('last_name');
        return view('app.admin.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        if (auth()->user()->can('users:destroy') && auth()->user()->id <> $user->id) {
            $user->delete();
            return redirect()->route('app.admin.users.index')->with('status', 'User Deleted!');
        }
        abort(403, 'Unable to delete your own account.');
    }

    public function show(User $user)
    {
        $user->with(['roles', 'permissions']);
        return view('app.admin.users.show', compact('user'));
    }
}
