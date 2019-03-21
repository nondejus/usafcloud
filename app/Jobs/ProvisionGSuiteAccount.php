<?php

namespace App\Jobs;

use App\Models\Auth\User;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\SendGSuiteLoginDetailsEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProvisionGSuiteAccount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    public $defaultPassword;

    /**
     * Google SDK Client
     */
    public $google_client;

    /**
     * Google Directory Service Client
     */
    public $google_directory_service;

    /**
     * Google Username object
     */
    public $google_username;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, $defaultPassword = '')
    {
        $this->user = $user;
        $this->defaultPassword = $defaultPassword;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // New up a Directory User
        $google_user = new \Google_Service_Directory_User;

        // Set the name for the new User
        $google_user->setName($this->getNameForNewGoogleUser());

        // Set the email handle for the new user
        $google_user->setPrimaryEmail($this->getEmailHandleForNewGoogleUser());

        // Set the default password for the new user
        if ($this->defaultPassword === '') {
            $this->defaultPassword = Str::random(10);
        }
        $google_user->setPassword($this->defaultPassword);

        // Make the user reset the passwor @ next login
        $google_user->setChangePasswordAtNextLogin(true);

        $directory_client = $this->getGoogleDirectoryClient($this->getGoogleClient());

        $directory_client->users->insert($google_user);

        SendGSuiteLoginDetailsEmail::dispatch($this->user, $this->getEmailHandleForNewGoogleUser(), $this->defaultPassword);
    }

    public function getGoogleClient()
    {
        if ($this->google_client == null) {
            $this->prepareGoogleClient();
        }
        return $this->google_client;
    }

    public function getGoogleDirectoryClient()
    {
        if ($this->google_directory_service == null) {
            $this->prepareGoogleDirectoryClient();
        }
        return $this->google_directory_service;
    }

    public function getNameForNewGoogleUser()
    {
        if ($this->google_username == null) {
            $this->prepareName();
        }
        return $this->google_username;
    }

    public function getEmailHandleForNewGoogleUser()
    {
        return "{$this->user->first_name}.{$this->user->last_name}@usaf.cloud";
    }

    public function prepareName()
    {
        // New up Google_Service_Directory_UserName
        $new_user_name = new \Google_Service_Directory_UserName;

        // Set user given name
        $given_name = Str::title($this->user->first_name);
        $new_user_name->setGivenName($given_name);

        // Set user family name
        $family_name = Str::title($this->user->last_name);
        $new_user_name->setFamilyName($family_name);

        $this->google_username = $new_user_name;
    }

    public function prepareGoogleDirectoryClient()
    {
        if ($this->google_client == null) {
            $this->prepareGoogleClient();
        }

        // New up a Directory Service
        $this->google_directory_service = (new \Google_Service_Directory($this->google_client));
    }

    public function prepareGoogleClient()
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
        $this->google_client = $google_client;
    }
}
