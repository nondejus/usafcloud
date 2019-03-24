<?php

namespace App\Http\Controllers\Admin\Organizations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\App\Organizations\Organization;

class OrganizationsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:super-admin']);
    }

    public function index()
    {
        $organizations = Organization::all()->load('members');
        return view('app.admin.organizations.index', compact('organizations'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:organizations,name'
        ]);

        Organization::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('status', 'Organization created!');
    }

    public function show(Organization $organization)
    {
        $organization = $organization->load('members');
        return view('app.admin.organizations.show', compact('organization'));
    }

    public function destroy(Organization $organization)
    {
        $this->authorize('delete', $organization);

        $organization->delete();

        return redirect()->route('app.admin.organizations.index')->with('status', 'Organization Deleted!');
    }
}
