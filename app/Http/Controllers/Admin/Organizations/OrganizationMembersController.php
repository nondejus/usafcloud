<?php

namespace App\Http\Controllers\Admin\Organizations;

use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\App\Organizations\Organization;

class OrganizationMembersController extends Controller
{
    public function store(Organization $organization, Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id'
        ]);

        $user = User::findOrFail($request->user_id);

        $organization->addUser($user);

        return redirect()->route('app.admin.organizations.show', $organization);
    }
}
