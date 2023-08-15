<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
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
    'linkedin' => [
        'client_id' => env('LinkedIn_CLIENT_ID'),
        'client_secret' => env('LinkedIn_CLIENT_SECRET'),
        'acces_token' => env('LinkedIn_ACCES_TOKEN'),
        'redirect' => env('LinkedIn_REDIRECT_URL'),
    ],
    'Twitter' => [
        'client_id' => env('Twitter_API_KEY'),
        'client_secret' => env('Twitter_API_SECRET'),
        'redirect' => env('Twitter_REDIRECT_URL'),
    ],

];
