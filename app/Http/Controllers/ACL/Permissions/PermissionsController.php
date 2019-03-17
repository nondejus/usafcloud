<?php

namespace App\Http\Controllers\ACL\Permissions;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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

    public function update(Permission $permission, Request $request)
    {
        $this->validate($request, [
            'name' => [
                'required',
                'string',
                Rule::unique('permissions', 'name')->ignore($permission->id),
            ]
        ]);

        $permission->name = $request->name;
        $permission->save();

        return redirect()->back()->with('status', 'Permission updated!');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:permissions,name'
        ]);

        Permission::create(['guard_name' => 'web', 'name' => $request->name]);

        return redirect()->back()->with('status', 'Permission created!');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->back()->with('status', 'Permission deleted!');
    }
}
