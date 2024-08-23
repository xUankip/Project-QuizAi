<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'admins',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'admins',
            'hash' => false,
        ],
    ],

    'providers' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        // Other providers...
    ],

    'passwords' => [
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
        ],
    ],

    'reset' => [
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
        ],
    ],

    'throttle' => [
        'max_attempts' => 5,
        'decay_minutes' => 1,
    ],

];
