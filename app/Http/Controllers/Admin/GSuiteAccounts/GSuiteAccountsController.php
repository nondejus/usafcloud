<?php

namespace App\Http\Controllers\Admin\GSuiteAccounts;

use App\Models\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\App\Organizations\Organization;
use App\Models\GSuite\GSuiteAccount;

class GSuiteAccountsController extends Controller
{
    public function __construct()
    { }

    public function index()
    {
        $accounts = GSuiteAccount::all();
        $users = (new \App\GSuite\GoogleDirectory)->users();

        return view('app.admin.gsuite.index', [
            'accounts' => $accounts,
            'users' => $users
        ]);
    }
}
