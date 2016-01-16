<?php

use App\Http\Controllers\UserPanel\SteamConvertController;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserAuthTest extends TestCase
{
    //use DatabaseMigrations;

    /**
     * Checks if the SteamID is properly converted to a AuthID with multiple examples
     *
     * @test
     */
    public function test_index_and_steam_login()
    {
        //FAKE the SERVER HTTP Host or the Steam Login Library wont be able to generate the URL for the Button
        $_SERVER['HTTP_HOST'] = "host";

        $this->visit('/userpanel/auth')->see('Sign in to start your session');
        $this->see('Login via Steam!'); //Check for the Steam Button
    }

    /**
     * Checks if the User can log in with a token and the checks are applied
     *
     * @test
     */
    public function check_server_login()
    {
        //Create a User in the DB without a token or IP Set
        $user_id = $this->create_store_user();

        //Set the IP
        //Set the token

        //Make a login request with only the token supplied
        //Verify it failed

        //Make a login request with only the ip supplied
        //Verify it failed

        //Make a login request with the token and the ip but a invalid user supplied
        //Verify that it failed

        //Make a login request with a invalid ip
        //Verify that it failed

        //Make a login request with a invalid token
        //Verify that it failed

        //Make a login request with a valid token and a valid ip
        //Verify that it worked and the dashboard is displayed

        //Logout
        //Verify that the user is logged out

        //Make a valid login request with the page parameter set
        //Verify the results
    }

    private function create_store_user()
    {
        //return $user_id;
    }

    private function set_store_token_for_user($user_id, $token)
    {

    }

    private function set_store_ip_for_user($user_id, $ip)
    {

    }
}