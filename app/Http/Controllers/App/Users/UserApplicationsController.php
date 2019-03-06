<?php

namespace App\Http\Controllers\App\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserApplicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user()->load('applications');
        return view('app.applications.index', compact('user'));
    }
}
