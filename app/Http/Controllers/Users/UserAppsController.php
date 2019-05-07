<?php

namespace App\Http\Controllers\Users;

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
        //dd($user->apps->first()->client->name);
        // $user->apps->each(function ($token) {
        //     dd($token);
        // });
        return view('app.users.apps.index', compact('user'));
    }
}
