<?php

namespace App\Http\Controllers\App\Users;

use App\Models\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserInvitationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function show(User $user, Request $request)
    {
        if (!$request->hasValidSignature() || $user->password <> null) {
            abort(401);
        }
        return view('auth.invitations.show');
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user->password = Hash::make($request->password);
        $user->password_reset_required = false;
        $user->last_password_reset = now();
        $user->save();

        auth()->login($user);

        return redirect('/');
    }
}
