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

        // Set the credentials
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . storage_path('credentials.json'));

        $google_client = new \Google_Client();

        // Set the user to impersonate
        $google_client->setSubject(config('gsuite.subject'));

        // Instruct Google To Use Default Creds
        $google_client->useApplicationDefaultCredentials();

        // Set the proper scopes
        $google_client->setScopes('https://www.googleapis.com/auth/admin.directory.user');

        $directory = new \Google_Service_Directory($google_client);

        $users = $directory->users->listUsers(['domain' => 'usaf.cloud']);

        //dd($users);

        $accounts = GSuiteAccount::all();
        return view('app.admin.gsuite.index', [
            'accounts' => $accounts,
            'users' => $users
        ]);
    }
}
