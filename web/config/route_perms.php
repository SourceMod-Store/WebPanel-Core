<?php
//  File: config/route_perms.php
//  contains the route.name permission mappings.
//  Format: ['route.name' => 'permission']

return [
    'test' => 'test',

    'webpanel' => [
        //Permissions for the WebPanel Dashboard
        'dashboard'        => '',

        //Permissions for the WebPanel Store Items
        'items' => [
            'index'      => 'WebPanelItemsView',
            'create'     => 'WebPanelItemsCreate',
            'store'      => 'WebPanelItemsCreate',
            'show'       => 'WebPanelItemsView',
            'edit'       => 'WebPanelItemsEdit',
            'update'     => 'WebPanelItemsEdit',
            'destroy'    => 'WebPanelItemsDelete',
        ],

        //Permissions for the WebPanel Store Categories
        'categories' => [
            'index'      => 'WebPanelCategoriesView',
            'create'     => 'WebPanelCategoriesCreate',
            'store'      => 'WebPanelCategoriesCreate',
            'show'       => 'WebPanelCategoriesView',
            'edit'       => 'WebPanelCategoriesEdit',
            'update'     => 'WebPanelCategoriesEdit',
            'destroy'    => 'WebPanelCategoriesDelete',
        ],

        //Permissions for the WebPanel Store Users
        'users' => [
            'index'      => 'WebPanelUsersView',
            'create'     => 'WebPanelUsersCreate',
            'store'      => 'WebPanelUsersCreate',
            'show'       => 'WebPanelUsersView',
            'edit'       => 'WebPanelUsersEdit',
            'update'     => 'WebPanelUsersEdit',
            'destroy'    => 'WebPanelUsersDelete',
        ],
    ],

];