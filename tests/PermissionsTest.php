<?php

use App\User;
use App\Role;

class PermissionsTest extends TestCase {

    /** @test */
    public function cant_access_if_unauthorized()
    {
        //Check if the Dashboard is Shown
        $this->visit('/');

        //Check if WebPanel cant be accessed if unauthorized
        $this->visit('/webpanel')->see('Sign in');
    }

    /** @test */
    public function can_access_if_authorized()
    {//Login with the default admin user
        $user = User::where('name','admin')->first();
        $this->be($user);

        //Check if WebPanel can be accessed
        $this->visit('/webpanel')->see('Dashboard');
    }


    public function cant_access_if_authorized()
    {

        //Login with the user

        
        //Check if Unauthorized


        //Get some permission IDs and assign them to the Users


        //Grant additional permissions


        //Check if Authorized


        //Delete user


    }
}