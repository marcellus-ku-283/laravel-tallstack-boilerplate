<?php

return [
    // Login credentials
    'username' => env('GATEKEEPER_USERNAME', 'admin'),
    'password' => env('GATEKEEPER_PASSWORD', 'admin@123'),

    // The key as which the littlegatekeeper session is stored
    'sessionKey' => 'littlegatekeeper.loggedin',

    // The route to which the middleware redirects if a user isn't authenticated
    'authRoute' => '/developer/login',
];