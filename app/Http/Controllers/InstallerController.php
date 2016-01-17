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

    public function postWelcome()
    {

    }

    public function showFillDb()
    {
        return view('templates.installer.fill');
    }

    public function postFillDb()
    {
        \Artisan::call('migrate', array());
        $output = \Artisan::output();
        return view('templates.installer.fillresult',compact("output"));
    }

    public function showMigrate()
    {
        return view('templates.installer.migrate');
    }

    public function postMigrate(Request $request)
    {
        $store = $request->input("store");

        if($store == "new")
        {
            return redirect()->route("installer.finish.show");
        }
        elseif($store == "store12") {
            //Run the database Migration Script
            $old_store_db = $request->input('store12_old_store_db');
            $new_store_db = $request->input('store12_new_store_db');
            $new_store_prefix = $request->input('store12_new_store_prefix');

        }
        else
        {
            return redirect()->route("installer.finish.show");
        }
    }

    public function showFinish()
    {
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
        dd($envcontent);

        $envfile = fopen(".test.env","w");

    }
}
