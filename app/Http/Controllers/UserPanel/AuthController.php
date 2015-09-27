<?php

namespace App\Http\Controllers\UserPanel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\StoreUser;

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

        //TODO: Remove that
//        echo "<p>auth Test</p>";
//        echo "<p>token:".$request->input("token")."</p>";
//        echo "<p>userid:".$request->input("userid")."</p>";
//        echo "<p>ip:".$request->getClientIp()."</p>";
//        echo "<p>username:".$user->name."</p>";

    }



    /**
     * Login the user via steam
     *
     * @param Request $request
     * @return Response
     */
    public function steamlogin(Request $request)
    {
        abort(501);
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
