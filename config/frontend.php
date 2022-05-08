<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Frontend Main App
    |--------------------------------------------------------------------------
    |
    | This value contains the main values of your application frontend.
    |
    */

    'main_app' => [
        'url' => env('FRONTEND_MAIN_APP_URL', 'http://localhost'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Frontend Administrator App
    |--------------------------------------------------------------------------
    |
    | This value contains the administrator values of your application frontend.
    |
    */

    'administrator_app' => [
        'url' => env('FRONTEND_ADMINISTRATOR_APP_URL', 'http://localhost'),
    ],

];
