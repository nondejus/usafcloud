<?php

namespace App\Http\Controllers\ACL\Permissions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:super-admin');
    }

    public function index()
    {
        $permissions = Permission::all()->load('roles');
        return view('app.admin.permissions.index', compact('permissions'));
    }
}
