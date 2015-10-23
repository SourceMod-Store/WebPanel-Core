<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;

class SteamConvertController extends Controller
{
    //TODO: Move that to its own library
    //TODO: Add Tests
    public static function steamid_to_auth($steamid)
    {
        if (substr_count($steamid, ":") != 2)
            return 0;
        //from https://forums.alliedmods.net/showpost.php?p=1890083&postcount=234
        $toks = explode(":", $steamid);
        $odd = (int) $toks[1];
        $halfAID = (int) $toks[2];
        return ($halfAID * 2) + $odd;
    }
    public static function steamid_to_community($steamid)
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
    public static function communityid_to_steam($i64friendID)
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
    public static function auth_to_steamid($authid)
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
