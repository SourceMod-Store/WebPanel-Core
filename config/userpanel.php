<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Template
    |--------------------------------------------------------------------------
    |
    | The Template the Application is going to use
    | !! DO NOT FORGET THE . AT THE END !!
    |
    | Default Templates:
    | adminlte205.
    | laravel.
    | bored.
    |
    */

    'template' => 'adminlte205.',


    /*
    |--------------------------------------------------------------------------
    | Ignore Permission System
    |--------------------------------------------------------------------------
    |
    | Set this to true to skip the ip check at the serverlogin
    |
    |
    | Default: false
    */

    'serverlogin_ignore_ipmismatch' => env('UP_SERVERLOGIN_IGNORE_IPMISMATCH', false),

];
