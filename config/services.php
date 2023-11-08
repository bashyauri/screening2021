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
    'nigeriabulksms' => [
        'username'      => env('NIGERIABULKSMS_USERNAME'),
        'password'      => env('NIGERIABULKSMS_PASSWORD'),
        'sender'        => env('NIGERIABULKSMS_SENDER'),
    ],
    'admission' => [
        'academic_session' => env('ACADEMIC_SESSION'),

    ],
    'schoolfees' => [
        'sciences' =>  [

            'registration_folder' => 5000,
            'examination_fees' => 12_500,
            'library_registration' => 1000,
            'sports_fee' => 1_600,
            'identity_card' => 2_000,
            'medical_fee' => 2_000,
            'practicals_fee' => 3_500,
            'students_handbook' => 1_500,
            'library_development' => 3_000,
            'certificate_verification' => 2_000,
            'sug_dues' => 1_000,
            'ict' => 4_000,
            'development_levy' => 6_500,
            'entrepreneurship_dev' => 3_000,
            'siwes_fee' => 1_000


        ],
        'socialSciences' =>   [

            'registration_folder' => 5000,
            'examination_fees' => 12_500,
            'library_registration' => 1000,
            'sports_fee' => 1_600,
            'identity_card' => 2_000,
            'medical_fee' => 2_000,
            'practicals_fee' => 1_500,
            'students_handbook' => 1_500,
            'library_development' => 3_000,
            'certificate_verification' => 2_000,
            'sug_dues' => 1_000,
            'ict' => 4_000,
            'development_levy' => 6_500,
            'entrepreneurship_dev' => 3_000,
            'siwes_fee' => 1_000


        ],
        'scienceDepartments' => [7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 19, 21, 22, 23, 25, 26],
        'socialScienceDepartments' => [1, 2, 3, 4, 5, 6, 20, 24, 27],

    ]

];