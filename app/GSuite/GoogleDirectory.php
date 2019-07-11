<?php

namespace App\GSuite;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\GSuite\GSuiteAccount;
use App\Mail\NewGSuiteAccountCreated;

class GoogleDirectory
{
    private $google_client;

    private $directory_client;

    /**
     * List all provisioned GSuite Accounts
     */
    public function users()
    {
        return collect($this->getDirectoryClient()->users->listUsers(['domain' => 'usaf.cloud'])->users);
    }

    /**
     * Provsion a new GSuite Account
     */
    public function provision(GSuiteAccount $gsuite_account)
    {
        $user = (new \App\GSuite\GoogleUser)
                ->useAccount($gsuite_account)
                ->useRandomPassword()
                ->changePasswordNextLogin()
                ->get();

        $new_gsuite_account = $this->getDirectoryClient()->users->insert($user);

        // Send owner login details
        Mail::to($gsuite_account->gsuiteable->email)
            ->bcc('admin@usaf.cloud')
            ->queue(new NewGSuiteAccountCreated($gsuite_account->gsuite_email, $gsuite_account->password));

        return $gsuite_account;
    }

    /**
     * Delete a GSuite Account
     */
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

    public function suspend(GSuiteAccount $gsuite_account)
    {
        $merge = new \Google_Service_Directory_User(['suspended' => true]);
        $this->getDirectoryClient()->users->update($gsuite_account->gsuite_email, $merge);
    }

    public function unsuspend(GSuiteAccount $gsuite_account)
    {
        $merge = new \Google_Service_Directory_User(['suspended' => false]);
        $this->getDirectoryClient()->users->update($gsuite_account->gsuite_email, $merge);
    }

    private function prepareName($owner)
    {
        $new_user_name = new \Google_Service_Directory_UserName;

        if ($owner instanceof \App\Models\User\User) {
            $new_user_name->setGivenName(ucfirst($owner->first_name));
            $new_user_name->setFamilyName(ucfirst($owner->last_name));
        } elseif ($owner instanceof \App\Models\Organizations\Organization) {
            $new_user_name->setGivenName(ucfirst($owner->name));
            $new_user_name->setFamilyName('USAF.Cloud');
        }

        return $new_user_name;
    }

    public function __construct()
    {
        $this->setGoogleClient()
            ->setDirectoryClient();

        return $this;
    }

    private function setDirectoryClient()
    {
        $this->directory_client = new \Google_Service_Directory($this->getGoogleClient());

        return $this;
    }

    public function getDirectoryClient()
    {
        if (!$this->directory_client) {
            $this->setDirectoryClient();
        }
        return $this->directory_client;
    }

    private function setGoogleClient()
    {
        // Set the credentials
        if (!getenv('GOOGLE_APPLICATION_CREDENTIALS')) {
            putenv('GOOGLE_APPLICATION_CREDENTIALS=' . storage_path('credentials.json'));
        }
        $this->google_client = new \Google_Client();
        $this->google_client->useApplicationDefaultCredentials();
        $this->google_client->setSubject(config('gsuite.subject'));
        $this->google_client->setScopes('https://www.googleapis.com/auth/admin.directory.user');

        return $this;
    }

    public function getGoogleClient()
    {
        if (!$this->google_client) {
            $this->setGoogleClient();
        }
        return $this->google_client;
    }
}
