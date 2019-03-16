<?php

namespace App\GSuite;

use GuzzleHttp\Client;
use Laravel\Helper\Str;
use App\Models\Auth\User;

class GSuite
{
    protected $client;

    protected $url = 'https://www.googleapis.com/admin/directory/v1/users';

    protected $scopes = [
        'https://www.googleapis.com/auth/admin.directory.user',
        'https://www.googleapis.com/auth/admin.directory.user.alias',
        'https://www.googleapis.com/auth/admin.directory.orgunit',
        'https://www.googleapis.com/auth/admin.directory.group.member',
    ];

    public function __construct()
    {
        $this->client = new Client;
    }

    public function createGSuiteAccountForUser(User $user)
    {
        $g_user = [
            'primaryEmail' => strtolower("{$user->first_name}.{$user->last_name}@usaf.cloud"),
            'name' => [
                'family_name' => $user->last_name,
                'given_name' => $user->first_name,
            ],
            'suspended' => false,
            'password' => 'randolph123!',
            'changePasswordAtNextLogin' => true,
            'includeInGlobalAddressList' => true,
        ];

        $response = $this->client->request(
            'POST',
            $this->url . '?key=' . env('GSUITE_API_KEY'),
            [
                $this->setRequestHeaders(),
                $this->setRequestBody($g_user),
            ]
        );

        dd($response);

        return $response->getStatusCode();
    }

    protected function setRequestHeaders()
    {
        return [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]
        ];
    }

    protected function setRequestBody($user)
    {
        return [
            'body' => [$user]
        ];
    }
}
