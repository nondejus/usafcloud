<?php

namespace App\Http\Controllers\App\Users;

use App\Models\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\App\Organizations\Organization;

class UserOrganizationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin|super-admin');
    }

    public function store(User $user, Request $request)
    {
        $this->validate($request, [
            'organization_id' => 'required|exists:organizations,id',
        ]);

        $organization = Organization::findOrFail($request->organization_id);

        $user->joinOrganization($organization);

        return redirect()->back()->with('status', 'Profile updated!');
    }
}
