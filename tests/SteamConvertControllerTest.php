<?php

use App\Http\Controllers\UserPanel\SteamConvertController;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SteamConvertControllerTest extends TestCase
{
    //use DatabaseMigrations;

    /**
     * Checks if the SteamID is properly converted to a AuthID with multiple examples
     *
     * @test
     */
    public function test_steamid_to_auth()
    {
        $convert = new SteamConvertController();

        //Check if the conversion works properly
        $this->assertEquals($convert->steamid_to_auth("STEAM_0:1:37448025"),"74896051"); //Random ID 1
        $this->assertEquals($convert->steamid_to_auth("STEAM_0:0:15337483"),"30674966"); //Random ID 2

        //Check if the conversion fails when it should
        $this->assertEquals($convert->steamid_to_auth("STEAM_0:1"),"0"); //Not a proper steamid
        $this->assertEquals($convert->steamid_to_auth("STEAM_0"),"0"); //Not a proper steamid
    }

    /**
     * Checks if the SteamID32 is properly converted to a SteamID64/CommunityID with multiple examples
     *
     * @test
     */
    public function test_steamid_to_community()
    {
        $convert = new SteamConvertController();

        //Check if the conversion works properly
        $this->assertEquals($convert->steamid_to_community("STEAM_0:1:37448025"),"76561198035161779"); //Random ID 1
        $this->assertEquals($convert->steamid_to_community("STEAM_0:0:15337483"),"76561197990940694"); //Random ID 2

        //Check if the conversion fails when it should
        $this->assertEquals($convert->steamid_to_community("STEAM_0:1"),"0"); //Not a proper steamid
        $this->assertEquals($convert->steamid_to_community("STEAM_0"),"0"); //Not a proper steamid
    }

    /**
     * Checks if the SteamID64/CommunityID is properly converted to a SteamID32 with multiple examples
     *
     * @test
     */
    public function test_communityid_to_steam()
    {
        $convert = new SteamConvertController();

        //Check if the conversion works properly
        $this->assertEquals($convert->communityid_to_steam("76561198035161779"),"STEAM_0:1:37448025"); //Random ID 1
        $this->assertEquals($convert->communityid_to_steam("76561197990940694"),"STEAM_0:0:15337483"); //Random ID 2

        //Cant check for fail
    }

    /**
     * Checks if the AuthID is properly converted to a SteamID32 with multiple examples
     *
     * @test
     */
    public function test_auth_to_steamid()
    {
        $convert = new SteamConvertController();

        //Check if the conversion works properly
        $this->assertEquals($convert->auth_to_steamid("74896051"),"STEAM_0:1:37448025"); //Random ID 1
        $this->assertEquals($convert->auth_to_steamid("30674966"),"STEAM_0:0:15337483"); //Random ID 2

        //cant check for fail
    }
}