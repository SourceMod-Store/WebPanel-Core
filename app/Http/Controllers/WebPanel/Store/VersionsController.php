<?php namespace App\Http\Controllers\WebPanel\Store;

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

use App\Models\StoreVersion;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use Carbon\Carbon;

use Illuminate\Http\Request;

class VersionsController extends Controller
{

    /**
     * Gives an Overview of the installed module Versions
     *
     * @return Response
     */
    public function index()
    {
        //Check if the Versions are cached
        if(!Storage::exists('/versions/master.json'))
        {
            $this->do_update();
        }

        $master_json = Storage::get('/versions/master.json');
        $master_array = json_decode($master_json,true);
        $master_version = $master_array['format-version'];

        //Verify that the master_version is correct
        if($master_version != '0.0.3')
        {
            $versions = array();
            return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.versions.index', compact('versions'))
                ->with("flash_notification",array("message"=>"Master Version Mismatch", "level"=>"error"));
        }

        //Get days since the last update
        $update_date = Storage::lastModified('/versions/master.json');
        $update_date = Carbon::createFromTimestamp($update_date);
        $current_date = Carbon::today();
        $date_diff = $update_date->diffInDays($current_date);

        //Get the installed modules from the db
        $plugins = StoreVersion::all();

        //dd($plugins);
        $plugin_versions = array();
        foreach($plugins as $plugin)
        {
            //Populate the default fields
            $plugin_versions[$plugin->id]["mod_id"] = $plugin->id;
            $plugin_versions[$plugin->id]["mod_name"] = $plugin->mod_name;
            $plugin_versions[$plugin->id]["mod_description"] = $plugin->mod_description;
            $plugin_versions[$plugin->id]["mod_ver_convar"] = $plugin->mod_ver_convar;
            $plugin_versions[$plugin->id]["mod_ver_number"] = $plugin->mod_ver_number;
            $plugin_versions[$plugin->id]["mod_last_updated"] = $plugin->last_updated;
            $plugin_versions[$plugin->id]["server_id"] = $plugin->server_id;

            //Get the online data for the plugin
            $plugin_data =json_decode(Storage::get('/versions/'.$plugin->mod_ver_convar.'.json'),true);

            //Add the online data to the plugin
            $plugin_versions[$plugin->id]["name"] = $plugin_data["name"];
            $plugin_versions[$plugin->id]["display-name"] = $plugin_data["display-name"];
            $plugin_versions[$plugin->id]["description"] = $plugin_data["description"];
            $plugin_versions[$plugin->id]["author"] = $plugin_data["author"];
            $plugin_versions[$plugin->id]["current-version"] = $plugin_data["current-version"];
            $plugin_versions[$plugin->id]["min-store-version"] = $plugin_data["min-store-version"];
            $plugin_versions[$plugin->id]["max-store-version"] = $plugin_data["max-store-version"];
            $plugin_versions[$plugin->id]["link"] = $plugin_data["link"];
            $plugin_versions[$plugin->id]["tags"] = $plugin_data["tags"];

            //Check if its up2date
            $u2d = $this->check_if_up2date($plugin->mod_ver_number, $plugin_data["current-version"]);
            $plugin_versions[$plugin->id]["version"] = $u2d;
        }

        //dd($plugin_versions);



        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.versions.index', compact('date_diff','plugin_versions'));
    }

    /**
     * Shows details about the Selected Version
     *
     * @param StoreVersion $version
     */
    public function show($version)
    {
        dd($version);
    }


    /**
     * Updates the Cached Versions
     */
    public function update()
    {
        $this->do_update();
        return redirect()->route('webpanel.store.versions.index');
    }

    /**
     * Perform the Update
     */
    private function do_update()
    {
        //Delete the current files
        $files = Storage::allFiles('/versions');
        Storage::delete($files);

        //Download the main file
        $master_version = file_get_contents('https://raw.githubusercontent.com/SourceMod-Store/Module-Versions/master/modules.json');
        Storage::put('/versions/master.json',$master_version);

        $master_version = json_decode($master_version,true);
        //Download additional files
        foreach($master_version['modules-links'] as $module=>$version_link)
        {
            Storage::put('/versions/'.$module.'.json',file_get_contents($version_link));
        }
    }

    /**
     * Check if the store plugin is up2date
     */
    private function check_if_up2date($plugin_version,$online_version)
    {
        //Return
        /**
         * txt_short = Short Message to the User
         * txt_long = Long Message
         * description = A description of the available update
         * code = a return code that describes what happened
         * * 0 -> up2date
         * * 11 -> major version outofdate
         * * 12 -> minor version outofdate
         * * 13 -> patchlevel outofdate
         * * 91 -> Problem when checking major version
         * * 92 -> Problem when checking minor version
         * * 93 -> Problem when checking patchlevel
         */

        $plg_ver_array = explode(".",$plugin_version);
        $onl_ver_array = explode(".",$online_version);

        //Compare Major Version, then Minor and then Patchlevel
        if($plg_ver_array[0] < $onl_ver_array[0])
        {
            return array(
                "txt_short"=>"Out Of Date",
                "txt_long"=>"Major Version is out of date",
                "description" => "A Major Release is available",
                "code"=>"11",
            );
        }
        elseif($plg_ver_array[0] == $onl_ver_array[0])
        {
            //Compare Minor Versions
            if($plg_ver_array[1] < $onl_ver_array[1])
            {
                return array(
                    "txt_short"=>"Out Of Date",
                    "txt_long"=>"Minor Version is out of date",
                    "description" => "A feature update is available",
                    "code"=>"12",
                );
            }
            elseif($plg_ver_array[1] == $onl_ver_array[1])
            {
                if($plg_ver_array[2] < $onl_ver_array[2])
                {
                    return array(
                        "txt_short"=>"Out Of Date",
                        "txt_long"=>"Patchlevel is out of date",
                        "description" => "A patch is available",
                        "code"=>"13",
                    );
                }
                elseif($plg_ver_array[2] == $onl_ver_array[2])
                {
                    return array(
                        "txt_short"=>"Up2Date",
                        "txt_long"=>"The version is up to date",
                        "description" => "There is no update available",
                        "code"=>"0",
                    );
                }
                else
                {
                    return array(
                        "txt_short"=>"Error",
                        "txt_long"=>"Error during version check",
                        "description" => "There has been an error while checking the patchlevel",
                        "code"=>"93",
                    );
                }
            }
            else
            {
                return array(
                    "txt_short"=>"Error",
                    "txt_long"=>"Error during version check",
                    "description" => "There has been an error while checking minor version",
                    "code"=>"92",
                );
            }
        }
        else
        {
            return array(
                "txt_short"=>"Error",
                "txt_long"=>"Error during version check",
                "description" => "There has been an error while checking the major version",
                "code"=>"91",
            );
        }
    }
}
