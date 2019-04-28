<?php

namespace App\Http\Controllers\Admin\Organizations;

use App\Models\User\User;
use Illuminate\Http\Request;
use App\Models\GSuite\GSuiteAccount;
use App\Http\Controllers\Controller;
use App\Jobs\ProvisionGSuiteAccount;
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

        $organization = Organization::create([
            'name' => $request->name
        ]);

        $account = GSuiteAccount::create([
            'GSuiteable_id' => $organization->id,
            'GSuiteable_type' => Organization::class,
            'gsuite_email' => GSuiteAccount::ensureUniqueEmailAddress("{$organization->name}@usaf.cloud"),
            'creating' => true,
        ]);

        ProvisionGSuiteAccount::dispatch($organization, $account->gsuite_email);

        return redirect()->back()->with('status', 'Organization created!');
    }

    public function show(Organization $organization)
    {
        $organization = $organization->load('members');
        $users = User::all()->whereNotIn('id', $organization->members->pluck('id'));
        return view('app.admin.organizations.show', compact('organization', 'users'));
    }

    public function destroy(Organization $organization)
    {
        $this->authorize('delete', $organization);

        $organization->delete();

        return redirect()->route('app.admin.organizations.index')->with('status', 'Organization Deleted!');
    }
}
