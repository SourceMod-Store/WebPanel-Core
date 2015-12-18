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


namespace App\Http\Controllers\UserPanel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\StoreUser;
use Ehesp\SteamLogin\Laravel\Facades\SteamLogin;
use App\Http\Controllers\UserPanel\SteamConvertController;
use Mockery\CountValidator\Exception;
use Log;

class AuthController extends Controller
{

    /**
     * Displays the available login methods to the user
     * And shows errors if there are any
     *
     * @param Request $request
     * @return Response
     */
    public function getIndex(Request $request)
    {
        return view('templates.' . \Config::get('webpanel.template') . 'auth.userpanellogin');
    }


    /**
     * Login the user with the supplied token + userid + ip
     *
     * @param Request $request
     * @return Response
     */
    public function serverlogin(Request $request)
    {
        $token = $request->input("token");
        $userid = intval($request->input("userid"));
        $page = $request->input("page");
        $game = $request->input("game");
        $clientip = $request->getClientIp();

        //Validate input
        if (!isset($token) || !isset($userid))
        {
            Log::debug("No token or userid has been provided");
            abort(400);
        }

        //GET the user from the db
        try {
            $user = StoreUser::findOrFail($userid);
        }
        catch(\Exception $e)
        {
            Log::notice("User does not exist in db",["userid" => $userid]);
            abort(401);
        }

        //Check if the token matches
        if ($user->token != $token || $user->token == NULL || $user->token == "")
        {
            Log::notice("Invalid Token",["token" => $user->token , "provided_token" => $token]);
            abort(401);
        }
        //Check if the ip matches
        if (!\Config::get('userpanel.serverlogin_ignore_ipmismatch') && ($user->ip !=$clientip || $user->ip == NULL || $user->ip == ""))
        {
            Log::notice("Invalid User IP",["ip" => $user->ip , "provided_ip" => $clientip]);
            abort(401);
        }


        //Check if the session variable already exists
        if($request->session()->has("store_user_id"))
        {
            Log::debug("Session with store_user_id already exists");
            //TODO: Handle the case that the store_user_id already exists
        }

        //Set the session variable
        $request->session()->put('store_user_authmethod','server_token');
        $request->session()->put('store_user_id',$user->id);
        $request->session()->put('store_user_name',$user->name);
        $request->session()->put('store_user_auth',$user->auth);

        Log::info("User logged in",["user_id" => $user->id , "user_name" => $user->name]);


        //GAME: CSGO
        if($game == "csgo")
        {
            Log::debug("User is on CSGO",["user_id" => $user->id , "user_name" => $user->name, "page" => $page]);
            $data = array();

            switch ($page)
            {
                case "item_buy":
                    $data["namedroute"] = "userpanel.useritems.buyoverview";
                    $data["title"] = "Store UserPanel";
                    break;
                case "inventory":
                    $data["namedroute"] = "userpanel.useritems.index";
                    $data["title"] = "Store UserPanel";
                    break;
                case "loadouts":
                    $data["namedroute"] = "userpanel.loadouts.index";
                    $data["title"] = "Store UserPanel";
                    break;
                case "dashboard":
                    $data["namedroute"] = "userpanel.dashboard";
                    $data["title"] = "Store UserPanel";
                    break;
                default:
                    $data["namedroute"] = "userpanel.dashboard";
                    $data["title"] = "Store UserPanel";
            }
            return view('templates.' . \Config::get('userpanel.template') . 'userpanel.csgoredirector',$data);
        }
        else // Game is not CSGO
        {
            Log::debug("User is not on CSGO",["user_id" => $user->id , "user_name" => $user->name, "page" => $page]);
            if (!isset($page) || !isset($page))
            {
                return redirect()->route('userpanel.dashboard');
            }

            switch ($page)
            {
                case "item_buy":
                    return redirect()->route('userpanel.useritems.buyoverview');
                    break;
                case "inventory":
                    return redirect()->route('userpanel.useritems.index');
                    break;
                case "loadouts":
                    return redirect()->route('userpanel.loadouts.index');
                    break;
                case "dashboard":
                    return redirect()->route('userpanel.dashboard');
                    break;
                default:
                    return redirect()->route('userpanel.dashboard');
                    break;
            }
        }
    }



    /**
     * Login the user via steam
     *
     * @param Request $request
     * @return Response
     */
    public function steamlogin(Request $request)
    {
        //Handle the return and try to validate it
        try
        {
            $community = SteamLogin::validate();
        }
        catch(\Exception $e)
        { //If not possible show 401 error
            Log::notice("Invalid Steam Auth Attempt");
            view()->share('message',$e->getMessage());
            abort(401);
        }
        //Get the auth string for the steamid64
        $steam = SteamConvertController::communityid_to_steam($community);
        $auth = SteamConvertController::steamid_to_auth($steam);

        Log::debug("Successful Stem Auth",["CommunityID" => $community,"SteamID"=>$steam,"auth" => $auth]);

        //Get the userid for the auth string
        try
        {
            $user = StoreUser::where("auth",$auth)->firstOrFail();
        }
        catch(\Exception $e)
        {
            Log::notice("User does not exist in db",["auth" => $auth]);
            view()->share('message','You have to play on the server before you can use the UserPanel');
            abort(401);
        }

        //Set the session vars
        $request->session()->put('store_user_authmethod','steam_openid');
        $request->session()->put('store_user_id',$user->id);
        $request->session()->put('store_user_name',$user->name);
        $request->session()->put('store_user_auth',$user->auth);

        //Redirect the user to the User Dashboard
        return redirect()->route('userpanel.dashboard');
    }

    /**
     * Logs the user out of the application
     *
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request)
    {
        $request->session()->forget("store_user_id");
        echo "logged out";
        //TODO: Add a proper view
    }
}
