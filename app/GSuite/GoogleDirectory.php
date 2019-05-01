<?php

namespace App\GSuite;

use Exception;
use Illuminate\Support\Str;
use App\Models\GSuite\GSuiteAccount;
use App\Jobs\SendGSuiteLoginDetailsEmail;

class GoogleDirectory
{
    private $google_client;
    private $directory_client;

    public function users()
    {
        return collect($this->getDirectoryClient()->users->listUsers(['domain' => 'usaf.cloud'])->users);
    }

    public function provision(GSuiteAccount $gsuite_account)
    {
        // New up a Directory User
        $google_user = new \Google_Service_Directory_User;

        // Set the name for the new User
        $google_user->setName($this->prepareName($gsuite_account->gsuiteable));

        // Set the email handle for the new user
        $google_user->setPrimaryEmail($gsuite_account->gsuite_email);

        // Set the default password for the new user
        $password = Str::random(10);
        $google_user->setPassword($password);

        // Make the user reset the password @ next login
        $google_user->setChangePasswordAtNextLogin(true);

        // Actually Provision Account
        $this->getDirectoryClient()->users->insert($google_user);

        SendGSuiteLoginDetailsEmail::dispatch($gsuite_account, $password);
    }

    public function delete($gsuite_account_email)
    {
        try {
            $this->getDirectoryClient()->users->delete($gsuite_account_email);
            return true;
        } catch (Exception $e) {
            throw $e;
            return false;
        }
    }

    public function prepareName($owner)
    {
        $new_user_name = new \Google_Service_Directory_UserName;

        if ($owner instanceof \App\Models\User\User) {
            $new_user_name->setGivenName(ucfirst($owner->first_name));
            $new_user_name->setFamilyName(ucfirst($owner->last_name));
        } elseif ($owner instanceof \App\Models\App\Organizations\Organization) {
            $new_user_name->setGivenName(ucfirst($owner->name));
            $new_user_name->setFamilyName('USAF.Cloud');
        }

        return $new_user_name;
    }

    public function __construct()
    {
        $this->setDirectoryClient();

        return $this;
    }

    public function getDirectoryClient()
    {
        return $this->directory_client;
    }

    public function setDirectoryClient()
    {
        $this->directory_client = new \Google_Service_Directory($this->getGoogleClient());
    }

    public function getGoogleClient()
    {
        if (!$this->google_client) {
            $this->setGoogleClient();
        }
        return $this->google_client;
    }

    public function setGoogleClient()
    {
        // Set the credentials
        if (!getenv('GOOGLE_APPLICATION_CREDENTIALS')) {
            putenv('GOOGLE_APPLICATION_CREDENTIALS=' . storage_path('credentials.json'));
        }
        $this->google_client = new \Google_Client();
        $this->google_client->useApplicationDefaultCredentials();
        $this->google_client->setSubject(config('gsuite.subject'));
        $this->google_client->setScopes('https://www.googleapis.com/auth/admin.directory.user');
    }
}
