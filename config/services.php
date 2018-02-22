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
    'google'   => [
        'client_id'     => '109200403701-vsgk1h4dua8l4q85gp6ieqgi43ebk2fb.apps.googleusercontent.com',
        'client_secret' => 'nZi3auTWte-ZkUA3hCFArnV3',
        'redirect'      => 'http://localhost:81/hoctienganh/public/auth/google/callback',
    ],
    'facebook'   => [
        'client_id'     => '273065589864224',
        'client_secret' => '2e41fd83aa97613f6c42e89ae9203f93',
        'redirect'      => 'http://localhost:81/hoctienganh/public/auth/facebook/callback',
    ],

];
