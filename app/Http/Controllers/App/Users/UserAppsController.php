<?php

namespace App\Http\Controllers\App\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAppsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user()->load('apps');
        return view('app.users.apps.index', compact('user'));
    }
}
