<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => 'LWCvfxNnZP3bblar-Hluwg',
    ],

    'ses' => [
        'key'    => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => Funnel\User::class,
        'key'    => '',
        'secret' => '',
    ],

    'facebook' => [
        'client_id' => '582360481866544',
        'client_secret' => 'bc3066dfd344c7bd9e76c26166c86d25',
        'redirect' => 'http://funnel.io/auth/callback',
    ],

];
