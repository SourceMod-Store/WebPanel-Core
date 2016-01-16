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

//  File: config/route_perms.php
//  contains the route.name permission mappings.
//  Format: ['route.name' => 'permission']

return [
    'test' => 'test',

    'webpanel' => [
        //Permissions for the WebPanel Dashboard
        'dashboard'        => '',

        // Permissions for the Store Part of the WebPanel
        'store' => [
            //Permissions for the WebPanel Store Items
            'items' => [
                'index'      => 'WebPanelStoreItemsView',
                'create'     => 'WebPanelStoreItemsCreate',
                'store'      => 'WebPanelStoreItemsCreate',
                'show'       => 'WebPanelStoreItemsView',
                'edit'       => 'WebPanelStoreItemsEdit',
                'update'     => 'WebPanelStoreItemsEdit',
                'destroy'    => 'WebPanelStoreItemsDelete',
                'data'       => 'WebPanelStoreItemsView',
            ],

            //Permissions for the WebPanel Store Categories
            'categories' => [
                'index'      => 'WebPanelStoreCategoriesView',
                'create'     => 'WebPanelStoreCategoriesCreate',
                'store'      => 'WebPanelStoreCategoriesCreate',
                'show'       => 'WebPanelStoreCategoriesView',
                'edit'       => 'WebPanelStoreCategoriesEdit',
                'update'     => 'WebPanelStoreCategoriesEdit',
                'destroy'    => 'WebPanelStoreCategoriesDelete',
                'data'       => 'WebPanelStoreCategoriesView',
            ],

            //Permissions for the WebPanel Store Users
            'users' => [
                'index'      => 'WebPanelStoreUsersView',
                'create'     => 'WebPanelStoreUsersCreate',
                'store'      => 'WebPanelStoreUsersCreate',
                'show'       => 'WebPanelStoreUsersView',
                'edit'       => 'WebPanelStoreUsersEdit',
                'update'     => 'WebPanelStoreUsersEdit',
                'destroy'    => 'WebPanelStoreUsersDelete',
                'data'       => 'WebPanelStoreUsersView',
            ],

            //Permissions for the WebPanel Store Servers
            'servers' => [
                'index'      => 'WebPanelStoreServersView',
                'create'     => 'WebPanelStoreServersCreate',
                'store'      => 'WebPanelStoreServersCreate',
                'show'       => 'WebPanelStoreServersView',
                'edit'       => 'WebPanelStoreServersEdit',
                'update'     => 'WebPanelStoreServersEdit',
                'destroy'    => 'WebPanelStoreServersDelete',
            ],

            //Permissions for the WebPanel Store Versions
            'versions' => [
                'index'      => 'WebPanelStoreVersionsView',
                'show'       => 'WebPanelStoreVersionsView',
            ],

            //Permissions for the WebPanel Store Tools
            'tools' => [
                'index'         => 'WebPanelStoreToolsView',
                'json_shrinker' => 'WebPanelStoreToolsJsonShrinker',
                'json_checker'  => 'WebPanelStoreToolsJsonChecker',
                'import'        => 'WebPanelStoreToolsImport',
                'edport'        => 'WebPanelStoreToolsExport',

            ],
        ],

        'panel' => [
            //Permissions for the WebPanel Panel Permissions
            'permissions' => [
                'index'      => 'WebPanelPanelPermissionsView',
                'create'     => 'WebPanelPanelPermissionsCreate',
                'store'      => 'WebPanelPanelPermissionsCreate',
                'show'       => 'WebPanelPanelPermissionsView',
                'edit'       => 'WebPanelPanelPermissionsEdit',
                'update'     => 'WebPanelPanelPermissionsEdit',
                'destroy'    => 'WebPanelPanelPermissionsDelete',
            ],

            //Permissions for the WebPanel Panel Roles
            'roles' => [
                'index'      => 'WebPanelPanelRolesView',
                'create'     => 'WebPanelPanelRolesCreate',
                'store'      => 'WebPanelPanelRolesCreate',
                'show'       => 'WebPanelPanelRolesView',
                'edit'       => 'WebPanelPanelRolesEdit',
                'update'     => 'WebPanelPanelRolesEdit',
                'destroy'    => 'WebPanelPanelRolesDelete',
            ],

            //Permissions for the WebPanel Panel Users
            'users' => [
                'index'      => 'WebPanelPanelUsersView',
                'create'     => 'WebPanelPanelUsersCreate',
                'store'      => 'WebPanelPanelUsersCreate',
                'show'       => 'WebPanelPanelUsersView',
                'edit'       => 'WebPanelPanelUsersEdit',
                'update'     => 'WebPanelPanelUsersEdit',
                'destroy'    => 'WebPanelPanelUsersDelete',
            ],
        ],
    ],

    'userpanel' => [

    ],
];