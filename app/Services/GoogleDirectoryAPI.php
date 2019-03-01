<?php

namespace App\Services;

use Illuminate\Foundation\Auth\User;
use GuzzleHttp\Client;

class GoogleDirectoryAPI
{
    protected $api_url = 'https://www.googleapis.com/admin/directory/v1/users';

    public function createNewGSuiteUser(User $user)
    {
        $client = new Client;
        $response = $client->request('POST', $this->buildAPIUrl(), [
            $this->buildRequestBody($user),
            $this->setRequestHeaders()
        ]);
    }

    protected function buildAPIUrl()
    {
        return $this->api_url . '?key=' . config('services.gsuite.api_key');
    }

    protected function buildRequestBody($user)
    {
        return [
            'name' => $user->name,
            'password' => 'new user password',
            'primaryEmail' => $user->name . '@usaf.cloud'
        ];
    }

    /**
     * Get the default options for an HTTP request.
     *
     * @return array
     */
    protected function setRequestHeaders()
    {
        return [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ],
        ];
    }
}
