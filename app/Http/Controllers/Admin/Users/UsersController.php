<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin|super-admin');
    }

    public function index()
    {
        $users = User::all()->load('roles.permissions');
        return view('app.admin.users.index', compact('users'));
    }
}
