<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\Auth\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        $temp_password = Str::random(16);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'email' => $request->email,
            'password' => Hash::make($temp_password),
            'password_reset_required' => true,
            'last_password_reset' => now()
        ]);

        $user->assignRole('user');

        $user->save();

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
