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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '1327454967858113',
        'client_secret' => '0f0ee9c649fa26416ce916ddf77c02d5',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '522472831520-igf89vilj3gfh4ds1p9q6tl2dd1ddv4r.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],

];
