<?php

use Laravel\Jetstream\Http\Middleware\AuthenticateSession;

        // dump(config('jetstream.middleware', ['auth:sanctum']));
return [

    'middleware' => ['web'],
    'auth_session' => AuthenticateSession::class,
    'guard' => 'sanctum',


    'prefix' => [
        'admin' => 'admin',

    ],
];
