<?php

use App\User;
use App\Role;
use App\Permission;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionsTest extends TestCase
{
    //use DatabaseMigrations;

    /** @test */
    public function cant_access_if_unauthenticated()
    {
        //Check if the Dashboard is Shown
        $this->visit('/')->see('A glimpse to the future of the Store Plugin');

        //Check if WebPanel cant be accessed if unauthorized
        $this->visit('/webpanel')->see('Sign in');
    }

    /** @test */
    public function can_access_if_authenticated()
    {//Login with the default admin user
        $user = User::where('name', 'admin')->first();
        //$this->be($user);

        //Check if WebPanel can be accessed
        $this->visit('/webpanel')->see('Dashboard');
    }

    /** @test */
    public function cant_access_if_unauthorized()
    {
        //Create the Temp User and the Temp Group
        $user_role = $this->create_temp_user_and_role_if_not_exists();

        $user = $user_role[0];
        $role = $user_role[1];

        $this->remove_permissions_from_role($role);

        //Login with the user
        $this->actingAs($user);

        //Check if Dashboard can be accessed
        $this->visit('/webpanel')->see('Dashboard');

        //Check if Unauthorized
        $this->visit('/webpanel/store/items')->see('You do not have the permission WebPanelStoreItemsView that is required to perform this action');
        $this->visit('/webpanel/store/categories')->see('You do not have the permission WebPanelStoreCategoriesView that is required to perform this action');
        $this->visit('/webpanel/store/users')->see('You do not have the permission WebPanelStoreUsersView that is required to perform this action');
        $this->visit('/webpanel/store/servers')->see('You do not have the permission WebPanelStoreServersView that is required to perform this action');
        $this->visit('/webpanel/store/tools')->see('You do not have the permission WebPanelStoreToolsView that is required to perform this action');

        //Assign permissions to group
        $this->add_permissions_to_role($role);

        //Check if Authorized
        $this->visit('/webpanel/store/items')->see('Items');
        $this->visit('/webpanel/store/categories')->see('Categories');
        $this->visit('/webpanel/store/users')->see('Users');
        $this->visit('/webpanel/store/servers')->see('Servers');
        $this->visit('/webpanel/store/tools')->see('Tools');

        //Delete user and role
        $this->delete_user_role($user, $role);
    }

    private function create_temp_user_and_role_if_not_exists()
    {
        //Check if the user and group exists
        $user = User::where('name', 'temp')->first();
        $role = Role::where('name', 'temp')->first();

        // Check if user exists, if not create a user
        if ($user == null) {
            $user = new User;
            $user->name = "temp";
            $user->email = "temp@temp.com";
            $user->password = bcrypt("temp");
            $user->save();
        }

        if ($role == null) {
            $role = new Role;
            $role->name = "temp";
            $role->display_name = "temp";
            $role->description = "A Temp Role";
            $role->save();
        }

        $user->roles()->sync(array($role->id));

        //Return the existing user and group if they exist
        return array($user, $role);
    }

    private function delete_user_role(User $user, Role $role)
    {
        //Remove all permissions then delete the user and the roles
        $role->perms()->sync(array());
        $user->delete();
        $role->delete();
    }

    private function add_permissions_to_role(Role $role)
    {
        //Get the permissions and assign them to the Role
        $perm_str_itm_view = Permission::where('name', 'WebPanelStoreItemsView')->first();
        $perm_str_cat_view = Permission::where('name', 'WebPanelStoreCategoriesView')->first();
        $perm_str_usr_view = Permission::where('name', 'WebPanelStoreUsersView')->first();
        $perm_str_srv_view = Permission::where('name', 'WebPanelStoreServersView')->first();
        $perm_str_tol_view = Permission::where('name', 'WebPanelStoreToolsView')->first();

        $role->attachPermissions(array($perm_str_itm_view, $perm_str_cat_view, $perm_str_usr_view, $perm_str_srv_view, $perm_str_tol_view));
    }

    private function remove_permissions_from_role(Role $role)
    {
        $role->perms()->sync(array());
    }
}