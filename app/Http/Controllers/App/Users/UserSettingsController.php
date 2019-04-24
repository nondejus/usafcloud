<?php

namespace App\Http\Controllers\App\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserSettingsController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('app.users.settings.index', compact('user'));
    }
}
