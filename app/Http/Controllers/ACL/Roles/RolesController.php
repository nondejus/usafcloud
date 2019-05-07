<?php

namespace App\Http\Controllers\ACL\Roles;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth', 'verified', 'role:super-admin'
        ]);
    }

    public function index()
    {
        $roles = Role::all()->load('permissions');
        return view('app.admin.roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:roles,name',
            'display_name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);

        return redirect()->back();
    }

    public function update(Role $role, Request $request)
    {
        $this->validate($request, [
            'display_name' => 'required|string|max:255',
            'description' => 'required|string',
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('roles', 'name')->ignore($role->id, 'id'),
            ]
        ]);

        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;

        $role->save();

        return redirect()->route('app.admin.acl.roles.index')->with('status', 'Role Updated!');
    }
}
