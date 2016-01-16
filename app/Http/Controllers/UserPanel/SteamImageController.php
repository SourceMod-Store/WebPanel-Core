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
use Storage;
use App\Http\Controllers\UserPanel\SteamConvertController;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Response;

class SteamImageController extends Controller
{
    /**
     * Returns the User Image for a specific auth ID
     *
     * Searches the Cache if the image exists already
     * And if it doesnt it fetches it from steam and adds it to the cache
     *
     * @param $auth
     * @return Image Returns a Image of the Steam User
     */
    public static function getUserImageForAuth($auth)
    {
        //Check if the image exists in the cache
        if (Storage::disk('local')->exists('pics/steam/'.$auth.'.jpg'))
        {
            $image = Storage::get('pics/steam/'.$auth.'.jpg');
            return Image::make($image)->response('jpg');
        }
        else
        {
            $image = SteamImageController::get_image_from_steam($auth);
            Storage::put('pics/steam/'.$auth.'.jpg', $image);

            //Return the Image
            return Image::make($image)->response('jpg');
        }
    }


    public static function getUserImageForCurrent(Request $request)
    {
        //Check if auth is set; If not revert back to session auth; If thats not set throw 404
        $auth = $request->session()->get('store_user_auth','not-set');

        //Check if session auth is set
        if($auth == 'not-set') abort(404);

        return SteamImageController::getUserImageForAuth($auth);
}

    public static function refreshUserImage($auth, Request $request)
    {
        //Check if auth is set; If not revert back to session auth; If thats not set throw 404
        $auth = $request->session()->get('store_user_auth','not-set');

        //Check if session auth is set
        if($auth == 'not-set') abort(404);

        //Get the steam Image and store it
        $image = SteamImageController::get_image_from_steam($auth);
        Storage::put('pics/steam/'.$auth.'.jpg', $image);

        return redirect()->route('userpanel.dashboard');
    }

    private static function get_image_from_steam($auth)
    {
        //If not calculate the steamid64
        $steam64 = SteamConvertController::steamid_to_community(SteamConvertController::auth_to_steamid($auth));
        //Get the image from steam
        $url = "http://steamcommunity.com/profiles/" . $steam64 . "?xml=1";
        $xml = simplexml_load_string(file_get_contents($url));
        $avatar_url = $xml->avatarMedium;

        //Store it in the cache
        return file_get_contents($avatar_url);
    }
}
