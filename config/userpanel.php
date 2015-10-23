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


    /*
    |--------------------------------------------------------------------------
    | Item Refund Fee
    |--------------------------------------------------------------------------
    |
    | The value of the items will be multiplied with that value
    |
    | Example:
    | 0.8 -> 80% of the item value will be returned to the user
    | 0.5 -> 50% of the item value will be returned to the user
    |
    | Default: 0.8
    */

    'items_refundfee' => env('UP_ITEMS_REFUNDFEE', 0.8),


];
