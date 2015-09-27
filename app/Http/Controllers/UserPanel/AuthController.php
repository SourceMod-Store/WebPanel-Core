<?php

namespace App\Http\Controllers\UserPanel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\StoreUser;
use Ehesp\SteamLogin\Laravel\Facades\SteamLogin;

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
    //TODO: Add logging
    public function serverlogin(Request $request)
    {
        $token = $request->input("token");
        $userid = intval($request->input("userid"));
        $clientip = $request->getClientIp();

        //Validate input
        if (!isset($token) || !isset($userid))
        {
            echo "<p> Invalid input </p>";
            die();
        }

        //GET the user from the db
        $user = StoreUser::findOrFail($userid);

        //Check if the token matches
        if ($user->token != $token || $user->token == NULL || $user->token == "")
        {
            //TODO: Log the error
            abort(401);
        }
        //Check if the ip matches
        if ($user->ip !=$clientip || $user->ip == NULL || $user->ip == "")
        {
            //TODO: Log the error
            abort(401);
        }


        //Check if the session variable already exists
        if($request->session()->has("store_user_id"))
        {
            //TODO: Handle the case that the store_user_id already exists
        }

        //Set the session variable
        $request->session()->put('store_user_authmethod','server_token');
        $request->session()->put('store_user_id',$user->id);
        $request->session()->put('store_user_name',$user->name);
        $request->session()->put('store_user_auth',$user->auth);


        //Redirect the user to the User Dashboard
        return redirect()->route('userpanel.dashboard');

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
        catch(Exception $e)
        { //If not possible show 401 error
            abort(401);
        }

        echo "<p> Community:".$community."</p>";

        //Get the auth string for the steamid64
        $steam = $this->communityid_to_steam($community);
        $auth = $this->steamid_to_auth($steam);

        echo "<p> Steam:".$steam."</p>";
        echo "<p> Auth:".$auth."</p>";

        //Get the userid for the auth string
        $user = StoreUser::where("auth",$auth)->firstOrFail();

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


    //TODO: Move that to its own library
    //TODO: Add Tests
    private function steamid_to_auth($steamid)
    {
        if (substr_count($steamid, ":") != 2)
            return 0;
        //from https://forums.alliedmods.net/showpost.php?p=1890083&postcount=234
        $toks = explode(":", $steamid);
        $odd = (int) $toks[1];
        $halfAID = (int) $toks[2];
        return ($halfAID * 2) + $odd;
    }
    private function steamid_to_community($steamid)
    {
        $parts = explode(':', str_replace('STEAM_', '', $steamid));
        $result = bcadd(bcadd('76561197960265728', $parts['1']), bcmul($parts['2'], '2'));
        $remove = strpos($result, ".");
        if ($remove != false)
        {
            $result = substr($result, 0, strpos($result, "."));
        }
        return $result;
    }
    private function communityid_to_steam($i64friendID)
    {
        $tmpfriendID = $i64friendID;
        $iServer = "1";
        if (bcmod($i64friendID, "2") == "0")
        {
            $iServer = "0";
        }
        $tmpfriendID = bcsub($tmpfriendID, $iServer);
        if (bccomp("76561197960265728", $tmpfriendID) == -1)
        {
            $tmpfriendID = bcsub($tmpfriendID, "76561197960265728");
        }
        $tmpfriendID = bcdiv($tmpfriendID, "2");
        return ("STEAM_0:" . $iServer . ":" . $tmpfriendID);
    }
    private function auth_to_steamid($authid)
    {
        $steam = array();
        $steam[0] = "STEAM_0";
        if ($authid % 2 == 0)
        {
            $steam[1] = 0;
        }
        else
        {
            $steam[1] = 1;
            $authid -= 1;
        }
        $steam[2] = $authid / 2;
        return $steam[0] . ":" . $steam[1] . ":" . $steam[2];
    }
}
