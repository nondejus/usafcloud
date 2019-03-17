<?php

namespace App\Http\Controllers\Admin\Organizations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\App\Organizations\Organization;

class OrganizationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:super-admin');
    }

    public function index()
    {
        $organizations = Organization::all();
        return view('app.admin.organizations.index', compact('organizations'));
    }
}
