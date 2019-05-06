<?php

namespace App\Http\Controllers\Admin\GSuiteAccounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organizations\Organization;
use App\Models\GSuite\GSuiteAccount;

class GSuiteAccountsController extends Controller
{
    public function index()
    {
        $accounts = GSuiteAccount::all()->load('gsuiteable');

        $users = (new \App\GSuite\GoogleDirectory)->users();

        return view('app.admin.gsuite.index', [
            'accounts' => $accounts,
            'users' => $users
        ]);
    }
}
