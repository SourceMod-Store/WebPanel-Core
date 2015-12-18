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
        $versions = StoreVersion::all();

        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.versions.index', compact('versions'));
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
}
