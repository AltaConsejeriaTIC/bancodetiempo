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
		'client_id' => env('FACEBOOK_CLIENT_ID'),
		'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
		'redirect' => env('CALLBACK_URL'),
	],
	'google' => [
		'client_id'     => "976477239659-1icagpc3a64akkne3tfk9nq7ip8u425c.apps.googleusercontent.com",
		'client_secret' => "BOp8JnJUkEGv7eRw-oa5-K_T",
		'redirect'      => "http://bancodetiempo.com/callback/google"
	],
	'linkedin' => [
			'client_id' => env('LINKEDIN_KEY'),
			'client_secret' => env('LINKEDIN_SECRET'),
			'redirect' => env('LINKEDIN_REDIRECT_URI'),
	],
		

];
