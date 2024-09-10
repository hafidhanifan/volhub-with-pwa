<?php

return [

    'defaults' => [
        'guard' => 'users',
        'passwords' => 'users',
    ],

    'guards' => [
        'users' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'mitra' => [
            'driver' => 'session',
            'provider' => 'mitras',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        'mitras' => [
            'driver' => 'eloquent',
            'model' => App\Models\Mitra::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
