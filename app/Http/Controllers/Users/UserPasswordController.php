<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string',
            'new_password' => 'required|string|confirmed|min:8',
        ]);

        if (Hash::check($request->password, auth()->user()->password)) {
            auth()->user()->update([
                'password' => Hash::make($request->new_password),
                'last_password_reset' => now()
            ]);
        } else {
            abort(403);
        }

        return redirect()->back();
    }
}
