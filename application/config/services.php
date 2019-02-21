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

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],

    ],

    'facebook' => [
    'client_id' => '857187704616582',      // Your GitHub Client ID
    'client_secret' => 'fa514f51557304102cf1defe33ddec46', // Your GitHub Client Secret
    'redirect' => 'https://localhost/public/login/facebook/callback'
    ],

    'google' => [
        'client_id' => '479520269093-3mbs1356svk2m4h6mvagdhmisoovht2p.apps.googleusercontent.com',
        'client_secret' => 'ptSH4MH7lPUzRNqSERK3w4oI',
        'redirect' => 'https://localhost/public/login/google/callback'
    ]
];
