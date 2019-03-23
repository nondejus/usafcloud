<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
 */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\Auth\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'google' => [

        /*
        |--------------------------------------------------------------------------
        | User to impersonate
        |--------------------------------------------------------------------------
        | The email of the user to impersonate, user should have neccessary
        | permissions for the scopes requested
        */
        'subject' => env('GOOGLE_SERVICE_ACCOUNT_USER'),

        /*
        |--------------------------------------------------------------------------
        | Path to Credentials
        |--------------------------------------------------------------------------
        | This should be the full path to the credentials file supplied
        | by google when creating a service account
        */
        'credentials_path' => storage_path('credentials.json'),

        /*
        |--------------------------------------------------------------------------
        | Scopes
        |--------------------------------------------------------------------------
        | The scopes requested
        | @link https://developers.google.com/admin-sdk/directory/v1/reference/
        */
        'scopes' => [
            'https://www.googleapis.com/auth/admin.directory.user',
            'https://www.googleapis.com/auth/admin.directory.group',
        ],
    ],

];
