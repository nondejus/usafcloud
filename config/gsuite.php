<?php

return [
    'type' => 'service_account',
    'project_id' => env('GSUITE_PROJECT_ID'),
    'private_key' => realpath(storage_path('gsuite-private.key')),
    'client_email' => env('GSUITE_CLIENT_EMAIL'),
    'client_id' => env('GSUITE_CLIENT_ID'),
    'auth_uri' => env('GSUITE_AUTH_URI'),
    'token_uri' => env('GSUITE_TOKEN_URI'),
    'auth_provider_x509_cert_url' => env('GSUITE_PROVIDER_CERT_URL'),
    'client_x509_cert_url' => env('GSUITE_CLIENT_CERT_URL'),
];
