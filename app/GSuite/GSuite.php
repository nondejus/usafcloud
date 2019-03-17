<?php

namespace App\GSuite;

use Google_Client;
use GuzzleHttp\Client;
use App\Models\Auth\User;
use Google_Service_Directory;
use Google_Service_Directory_User;
use Google\Auth\Credentials\ServiceAccountCredentials;

class GSuite
{
    /*
    * Email address for admin user that should be used to perform API actions
    * Needs to be created via Google Apps Admin interface and be added to an admin role
    * that has permissions for Admin APIs for Users
    */
    //protected $delegatedAdmin = 'usafcloudsuite@usafcloud.iam.gserviceaccount.com';
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
        'https://www.googleapis.com/auth/admin.directory.user',
        'https://www.googleapis.com/auth/admin.directory.group'
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
        $this->credentialsFile = storage_path('usafcloud-f00169c02ecd.json');
    }

    protected function setGoogleClient()
    {
        $this->google_client = new Google_Client;
        $this->setGoogleClientOptions();
    }

    protected function setGoogleDirectoryClient($google_client)
    {
        $this->google_directory_client = new Google_Service_Directory($google_client);
        dd($this->google_directory_client);
    }

    protected function setGoogleClientOptions()
    {
        $this->google_client->setApplicationName($this->appName);
        $this->google_client->setAuthConfig($this->credentialsFile);
        $this->google_client->setSubject($this->delegatedAdmin);
        $this->google_client->setScopes($this->scopes);
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
        $cred = new ServiceAccountCredentials($this->scopes, $this->credentialsFile, $this->delegatedAdmin);
        $client = $this->getGoogleDirectoryClient($this->getGoogleClient());
        $users = $client->users->listUsers(['maxResults' => 100, 'domain' => 'usaf.cloud']);
        dd($users);
    }
}
