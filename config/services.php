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
    'facebook' => [
        'client_id' => '443065804770242' ,  //client face của bạn
        'client_secret' => '2e75463d743d8fd7de41cd8c558c0540',  //client app service face của bạn
        'redirect' => 'http://localhost/cc/Open-Source/dang-nhap/admin/callback' //callback trả về
    ],
    'google' => [
        'client_id' => '474844116494-akv0j56gt3p0valsvje1leonjhc503p1.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost/cc/Open-Source/google/callback' 
    ],


];
