<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin|super-admin');
        $this->middleware('role:super-admin', ['only' => ['api']]);
    }

    public function index()
    {
        return view('app.admin.index');
    }

    public function api()
    {
        return view('app.admin.api.index');
    }
}
