<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserNotificationsController extends Controller
{
    public function index()
    {
        $user = auth()->user()->load('notifications');
        return view('app.users.notifications.index', compact('user'));
    }
}
