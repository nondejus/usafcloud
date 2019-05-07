<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $user = auth()->user()->load('apps');

        return view('app.users.index', ['user' => $user]);
    }
}
