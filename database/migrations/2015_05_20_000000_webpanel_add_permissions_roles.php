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

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WebpanelAddPermissionsRoles extends Migration {

    /**
     * Contains the Permissions and their descriptions that are available in the WebPanel
     *
     * @var array
     */
    private $permissions = array(
        // **Store Permissions**

        //Item Permissions
        array('name' => 'WebPanelStoreItemsView',   'display_name' => 'View Store Items', 'description' => ''),
        array('name' => 'WebPanelStoreItemsCreate', 'display_name' => 'Create Store Items', 'description' => ''),
        array('name' => 'WebPanelStoreItemsEdit',   'display_name' => 'Edit Store Items', 'description' => ''),
        array('name' => 'WebPanelStoreItemsDelete', 'display_name' => 'Delete Store Items', 'description' => ''),

        //Category Permissions
        array('name' => 'WebPanelStoreCategoriesView',      'display_name' => 'View Store Categories', 'description' => ''),
        array('name' => 'WebPanelStoreCategoriesCreate',    'display_name' => 'Create Store Categories', 'description' => ''),
        array('name' => 'WebPanelStoreCategoriesEdit',      'display_name' => 'Edit Store Categories', 'description' => ''),
        array('name' => 'WebPanelStoreCategoriesDelete',    'display_name' => 'Delete Store Categories', 'description' => ''),

        //User Permissions
        array('name' => 'WebPanelStoreUsersView',   'display_name' => 'View Store Users', 'description' => ''),
        array('name' => 'WebPanelStoreUsersCreate', 'display_name' => 'Create Store Users', 'description' => ''),
        array('name' => 'WebPanelStoreUsersEdit',   'display_name' => 'Edit Store Users', 'description' => ''),
        array('name' => 'WebPanelStoreUsersDelete', 'display_name' => 'Delete Store Users', 'description' => ''),

        //Server Permissions
        array('name' => 'WebPanelStoreServersView',     'display_name' => 'View Store Servers', 'description' => ''),
        array('name' => 'WebPanelStoreServersCreate',   'display_name' => 'Create Store Servers', 'description' => ''),
        array('name' => 'WebPanelStoreServersEdit',     'display_name' => 'Edit Store Servers', 'description' => ''),
        array('name' => 'WebPanelStoreServersDelete',   'display_name' => 'Delete Store Servers', 'description' => ''),

        //Version Permissions
        array('name' => 'WebPanelStoreVersionsView', 'display_name' => 'View Store Versions', 'description' => ''),

        //Tools Permissions
        array('name' => 'WebPanelStoreToolsView',           'display_name' => 'View the Tools', 'description' => ''),
        array('name' => 'WebPanelStoreToolsJsonShrinker',   'display_name' => 'Use the JSON Shrinker', 'description' => ''),
        array('name' => 'WebPanelStoreToolsJsonChecker',    'display_name' => 'Use the JSON Checker', 'description' => ''),
        array('name' => 'WebPanelStoreToolsImport',         'display_name' => 'Import Items', 'description' => ''),
        array('name' => 'WebPanelStoreToolsExport',         'display_name' => 'Export Items', 'description' => ''),


        // **Panel Permissions**

        //Permission Permissions
        array('name' => 'WebPanelPanelPermissionsView',   'display_name' => 'View Panel Permissions', 'description' => ''),
        array('name' => 'WebPanelPanelPermissionsCreate', 'display_name' => 'Create Panel Permissions', 'description' => ''),
        array('name' => 'WebPanelPanelPermissionsEdit',   'display_name' => 'Edit Panel Permissions', 'description' => ''),
        array('name' => 'WebPanelPanelPermissionsDelete', 'display_name' => 'Delete Panel Permissions', 'description' => ''),

        //Role Permissions
        array('name' => 'WebPanelPanelRolesView',   'display_name' => 'View Panel Roles', 'description' => ''),
        array('name' => 'WebPanelPanelRolesCreate', 'display_name' => 'Create Panel Roles', 'description' => ''),
        array('name' => 'WebPanelPanelRolesEdit',   'display_name' => 'Edit Panel Roles', 'description' => ''),
        array('name' => 'WebPanelPanelRolesDelete', 'display_name' => 'Delete Panel Roles', 'description' => ''),

        //User Permissions
        array('name' => 'WebPanelPanelUsersView',   'display_name' => 'View Panel Users', 'description' => ''),
        array('name' => 'WebPanelPanelUsersCreate', 'display_name' => 'Create Panel Users', 'description' => ''),
        array('name' => 'WebPanelPanelUsersEdit',   'display_name' => 'Edit Panel Users', 'description' => ''),
        array('name' => 'WebPanelPanelUsersDelete', 'display_name' => 'Delete Panel Users', 'description' => ''),
    );

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // Inserts the Permissions
        Permission::insert($this->permissions);

        // Creates a root admin role
        $rootadmin = new Role();
        $rootadmin->name = "rootadmin";
        $rootadmin->display_name = "Root Admin";
        $rootadmin->description = "Has Permissions to do everything in the WebPanel";
        $rootadmin->save();

        //Get all permissions
        $ids = Permission::lists('id')->all();

        //Sync them to the rootadmin
        $rootadmin->perms()->sync($ids);


        //Creates an admin user
        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('password');
        $admin->save();

        $admin->roles()->sync(array($rootadmin->id));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        //Delete the rootadmin user
        $user = User::where('name','admin')->first();
        $user->roles()->sync(array());
        $user->delete();

        //Delete the rootadmin role
        $rootadmin = Role::where('name','rootadmin')->first();
        $rootadmin->perms()->sync(array());
        $rootadmin->delete();

        //Delete all the permissions
        foreach($this->permissions as $permission)
        {
            $wp_perm = Permission::where('name',$permission['name']);
            $wp_perm->delete();
        }

	}

}
