<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DeleteGSuiteAccount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * GSuite email to delete
     */
    public $gsuite_email;

    /**
     * Google SDK Client
     */
    public $google_client;

    /**
     * Google Directory Service Client
     */
    public $google_directory_service;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($gsuite_email)
    {
        $this->gsuite_email = $gsuite_email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $directory_client = $this->getGoogleDirectoryClient($this->getGoogleClient());

        $directory_client->users->delete($this->gsuite_email);

        return true;
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
