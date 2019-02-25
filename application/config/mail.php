<?php

return [


    'driver' => env('MAIL_DRIVER'),

    'host' => env('MAIL_HOST'),

    'port' => env('MAIL_PORT'),


    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'naoresponda@milhoapp.com.br'),
        'name' => env('MAIL_FROM_NAME', 'Central MilhoAPP'),
    ],


    'encryption' => env('MAIL_ENCRYPTION'),

    'username' => env('MAIL_USERNAME'),

    'password' => env('MAIL_PASSWORD'),

    'sendmail' => '/usr/sbin/sendmail -bs',

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

    'log_channel' => env('MAIL_LOG_CHANNEL'),

];
