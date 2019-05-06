<?php

namespace App\Http\Controllers\API\Organizations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organizations\Organization;

class OrganizationsController extends Controller
{
    public function index(Request $request)
    {
        $organizations = Organization::all();
        return $organizations;
    }

    public function show(Request $request)
    {
        $organization = Organization::where('id', $request->organization_id)->firstOrFail();
        return $organization;
    }
}
