<?php namespace App\Http\Controllers;

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

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Output\StreamOutput;

use Illuminate\Http\Request;

class InstallerController extends Controller
{

    public function showWelcome()
    {
        return view('templates.installer.welcome');
    }

    public function showSettings()
    {
        return view('templates.installer.settings');
    }

    public function postSettings(Request $request)
    {
        $settings = array();

        $settings["APP_ENV"] = "local";
        $settings["APP_DEBUG"] = "true";
        $settings["APP_KEY"] = "";
        $settings["APP_URL"] = "";

        $settings["DB_HOST_PANEL"] = $request->input("db_host_panel");
        $settings["DB_DATABASE_PANEL"] = $request->input("db_database_panel");
        $settings["DB_USERNAME_PANEL"] = $request->input("db_username_panel");
        $settings["DB_PASSWORD_PANEL"] = $request->input("db_password_panel");
        $settings["DB_PREFIX_PANEL"] = $request->input("db_prefix_panel");

        $settings["DB_HOST_STORE"] = $request->input("db_host_store");
        $settings["DB_DATABASE_STORE"] = $request->input("db_database_store");
        $settings["DB_USERNAME_STORE"] = $request->input("db_username_store");
        $settings["DB_PASSWORD_STORE"] = $request->input("db_password_store");
        $settings["DB_PREFIX_STORE"] = $request->input("db_prefix_store");

        $settings["CACHE_DRIVER"] = $request->input("cache_driver");
        $settings["SESSION_DRIVER"] = $request->input("session_driver");
        $settings["QUEUE_DRIVER"] = $request->input("queue_driver");

        $settings["MAIL_DRIVER"] = $request->input("mail_driver");
        $settings["MAIL_HOST"] = $request->input("mail_host");
        $settings["MAIL_PORT"] = $request->input("mail_port");
        $settings["MAIL_USERNAME"] = $request->input("mail_username");
        $settings["MAIL_PASSWORD"] = $request->input("mail_password");
        $settings["MAIL_FROM_ADR"] = $request->input("mail_from_adr");
        $settings["MAIL_FROM_NAME"] = $request->input("mail_from_name");

        $settings["UP_SERVERLOGIN_IGNORE_IPMISMATCH"] = "true";
        $settings["UP_ITEMS_REFUNDFEE"] = "0.8";

        //Generate a new app key and add it to the config array
        \Artisan::call('key:generate');
        $output = \Artisan::output();
        $start = strpos($output,"[");
        $end = strpos($output,"]");
        $key = substr($output,$start+1,$end-$start-1);
        $settings["APP_KEY"] = $key;

        //Write the settings to file
        $this->writeEnvFile($settings);

        //Redirect to next page
        return redirect()->route('installer.fill_db.show');
    }

    public function showFillDb()
    {
        return view('templates.installer.fill');
    }

    public function postFillDb()
    {
        //Migrate DB
        \Artisan::call('migrate', array());
        $output = \Artisan::output();

        return view('templates.installer.fillresult',compact("output"));
    }

    public function showFinish()
    {
        //Write installed file
        $instfile = fopen("../INSTALLED","w");
        fwrite($instfile,"INSTALLED");
        fclose($instfile);

        return view('templates.installer.finish');
    }

    /**
     * @param $settings Settings to write to the Env File
     */
    private function writeEnvFile($settings)
    {
        $envcontent = "";

        foreach($settings as $setting=>$value)
        {
            $envcontent .= $setting."=".$value.PHP_EOL;
        }
        //dd($envcontent);

        $envfile = fopen("../.env","w");
        fwrite($envfile, $envcontent);
        fclose($envfile);

    }
}
