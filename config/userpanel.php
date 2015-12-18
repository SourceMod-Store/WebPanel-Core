<?php

//Copyright (c) 2015 "Werner Maisl"
//
//This file is part of the Store Webpanel V2.
//
//The Store Webpanel V2 is free software: you can redistribute it and/or modify
//it under the terms of the GNU Affero General Public License as
//published by the Free Software Foundation, either version 3 of the
//License, or (at your option) any later version.
//
//This program is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//GNU Affero General Public License for more details.
//
//You should have received a copy of the GNU Affero General Public License
//along with this program. If not, see <http://www.gnu.org/licenses/>.

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
