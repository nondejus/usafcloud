<?php

namespace App\Http\Controllers\App\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserNotificationsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('app.users.notifications', compact('user'));
    }
}
