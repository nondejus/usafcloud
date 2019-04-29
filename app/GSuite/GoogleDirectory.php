<?php

namespace App\GSuite;

class GoogleDirectory
{
    private $google_client;
    private $directory_client;

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

    public function users()
    {
        return collect($this->getDirectoryClient()->users->listUsers(['domain' => 'usaf.cloud'])->users);
    }
}
