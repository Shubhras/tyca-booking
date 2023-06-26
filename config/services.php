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

    'stripe' => [
        'key' => 'pk_test_51HUtVaBcMJXLBqj7cBNHLVg2XLYOlukQ5kOEwxgbioo8Mqwlkpa1lSQ81FIwZ3Zu3tNBA7ZhfWwYupCeUE16KPwa00FdyV6QCg',
        'secret_key' => 'sk_test_51HUtVaBcMJXLBqj7ixb7Z9enyLTWGGwmp4paujhAR6NYoQwbSs4HOkeicbVLj0jVrV1px7Zzlirjs90jQHLdE7Fs007zbsFt4t',
        'webhook_secret_key' => env('STRIPE_WEBHOOK_SECRET_KEY'),
    ],

    'paytm-wallet' => [
        'env' => env('PAYTM_ENVIRONMENT'),
        'merchant_id' => env('PAYTM_MERCHANT_ID'),
        'merchant_key' => env('PAYTM_MERCHANT_KEY'),
        'merchant_website' => env('PAYTM_MERCHANT_WEBSITE'),
        'channel' => env('PAYTM_CHANNEL'),
        'industry_type' => env('PAYTM_INDUSTRY_TYPE'),
    ],

];
