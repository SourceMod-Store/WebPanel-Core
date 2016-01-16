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

use App\Models\StoreServer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ServersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $servers = StoreServer::all();

        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.servers.index', compact('servers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.servers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\ServerRequest $request
     *
     * @return Response
     */
    public function store(Requests\StoreServerRequest $request)
    {
        $input = $request->all();

        StoreServer::create($input);

        return redirect()->route('webpanel.store.servers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\StoreServer $server
     *
     * @return Response
     */
    public function show($server)
    {
        return redirect()->route(['webpanel.store.servers.edit', $server->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\StoreServer $server
     *
     * @return Response
     */
    public function edit($server)
    {
        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.servers.edit', compact('server'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Models\StoreServer $server
     * @param  Requests\ServerRequest $request
     *
     * @return Response
     */
    public function update($server, Requests\StoreServerRequest $request)
    {
        $server->update($request->all());
        return redirect()->route('webpanel.store.servers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\StoreServer $server
     * @return Response
     */
    public function destroy($server)
    {
        $server->delete();
        return redirect()->route('webpanel.store.servers.index');
    }

}
