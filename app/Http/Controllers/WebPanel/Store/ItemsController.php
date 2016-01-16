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

use App\Models\StoreItem;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class ItemsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.items.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $current_servers = null;
        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.items.create',compact('current_servers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\ItemRequest $request
     * @return Response
     */
    public function store(Requests\StoreItemRequest $request)
    {
        $input = $request->all();

        $item = StoreItem::create($input);

        $this->SyncServers($item, $request->input('server_list'));

        return redirect()->route('webpanel.store.items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  StoreItem $item
     * @return Response
     */
    public function show($item)
    {
        return redirect()->route(['webpanel.store.items.edit', $item->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StoreItem $item
     * @return Response
     */
    public function edit($item)
    {
        $current_servers = array_pluck($item->servers()->get(['servers.id'])->toArray(),'id');
        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.items.edit', compact('item','current_servers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Requests\ItemRequest $request
     * @param  StoreItem $item
     * @return Response
     */
    public function update($item, Requests\StoreItemRequest $request)
    {
        $item->update($request->all());

        $this->SyncServers($item, $request->input('server_list'));

        return redirect()->route('webpanel.store.items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  StoreItem $item
     * @return Response
     */
    public function destroy($item)
    {
        $item->delete();
        return redirect()->route('webpanel.store.items.index');
    }


    /**
     * Sync the Server List
     *
     * @param StoreItem $item
     * @param array $servers
     */
    private function SyncServers(StoreItem $item, $servers = array())
    {
        if ($servers == null) $servers = array();
        $item->servers()->sync($servers);
    }


    /**
     * Returns the Datatables data
     *
     * @return mixed
     */
    public function getData()
    {
        $items = StoreItem::select(['id','priority','name','type','price']);

        return Datatables::of($items)
            ->addColumn('action', function ($item) {
                $actions = view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.items._actions', compact('item'))->render();
                return $actions;
            })
            ->make();
    }

}
