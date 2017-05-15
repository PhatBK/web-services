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
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
    'client_id' => '239916629746119',
    'client_secret' => '2ff19e0cf2b620d72fe7683219c2bdf6',
    'redirect' => 'http://localhost/Web-Service/public/auth/facebook/callback',
],
    'google' => [
    'client_id' => '517734894484-qlr2t5751eikv4rjsocclb2co563g8e5.apps.googleusercontent.com',
    'client_secret' => 'F06TS_3ntj994rMP4augX0za',
    'redirect' => 'http://localhost/Web-Service/public/auth/google/callback',
    ],

];
