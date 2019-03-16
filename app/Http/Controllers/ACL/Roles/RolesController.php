<?php

namespace App\Http\Controllers\ACL\Roles;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:super-admin');
    }

    public function index()
    {
        $roles = Role::all()->load('permissions');
        return view('app.admin.roles.index', compact('roles'));
    }
}