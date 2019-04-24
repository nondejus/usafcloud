<?php

namespace App\Http\Controllers\API\Users;

use App\Rules\AllowedDomain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserEmailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function show(Request $request)
    {
        return $request->user()->email;
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email', new AllowedDomain],
        ]);

        $request->user()->email = $request->email;
        $request->user()->email_verified_at = null;
        $request->save();

        return $request->user();
    }
}
