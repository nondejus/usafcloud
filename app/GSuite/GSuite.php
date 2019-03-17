<?php

namespace App\GSuite;

use Google_Client;
use Google_Service_Directory;

class GSuite
{
    // TODO: To be continued...

    /*
    * Email address for admin user that should be used to perform API actions
    * Needs to be created via Google Apps Admin interface and be added to an admin role
    * that has permissions for Admin APIs for Users
    */
    protected $delegatedAdmin = 'admin@usaf.cloud';

    /*
    * Some name you want to use for your app to report to Google with calls, I assume
    * it is used in logging or something
    */
    protected $appName = 'USAF.Cloud';

    /*
    * Array of scopes you need for whatever actions you want to perform
    * See https://developers.google.com/admin-sdk/directory/v1/guides/authorizing
    */
    protected $scopes = array(
        'https://www.googleapis.com/auth/admin.directory.user'
    );

    /*
    * Provide path to JSON credentials file that was downloaded from Google Developer Console
    * for Service Account
    */
    protected $credentialsFile;

    protected $google_client = null;

    protected $google_directory_client = null;

    public function __construct()
    {
        $this->credentialsFile = storage_path('credentials.json');
    }

    protected function setGoogleClient()
    {
        $this->google_client = new Google_Client;

        $this->setGoogleClientOptions();

        return $this;
    }
    protected function setGoogleDirectoryClient($google_client)
    {
        $this->google_directory_client = new Google_Service_Directory($google_client);

        return $this;
    }

    protected function setGoogleClientOptions()
    {
        $this->google_client->setApplicationName($this->appName);
        $this->google_client->setScopes($this->scopes);
        $this->google_client->setAuthConfig($this->credentialsFile);
        //$this->google_client->setSubject($this->delegatedAdmin);
        $this->google_client->setPrompt('select_account consent');
        $this->google_client->setAccessType('offline');
    }

    public function getGoogleClient()
    {
        if ($this->google_client === null) {
            $this->setGoogleClient();
        }
        return $this->google_client;
    }
    public function getGoogleDirectoryClient()
    {
        if ($this->google_client === null) {
            $this->setGoogleClient();
        }
        if ($this->google_directory_client === null) {
            $this->setGoogleDirectoryClient($this->google_client);
        }
        return $this->google_directory_client;
    }
    public function listDomainUsers()
    {
        $client = $this->getGoogleDirectoryClient();
        dd($client);
        $user = $client->users->get('admin@usaf.cloud');
        dd($user);
    }
}
