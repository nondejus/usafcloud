<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth', 'verified', 'role:super-admin'
        ]);
    }

    public function index()
    {
        return view('app.admin.index');
    }
}
