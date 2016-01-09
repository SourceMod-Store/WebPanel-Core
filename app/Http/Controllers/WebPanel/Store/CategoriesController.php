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

use App\Models\StoreCategory;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $current_servers = array();
        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.categories.create',compact('current_servers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\StoreCategoryRequest $request
     * @return Response
     */
    public function store(Requests\StoreCategoryRequest $request)
    {
        $input = $request->all();

        $category = StoreCategory::create($input);

        $this->SyncServers($category, $request->input('server_list'));

        return redirect()->route('webpanel.store.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  StoreCategory $category
     * @return Response
     */
    public function show($category)
    {
        return redirect()->route(['webpanel.store.categories.edit', $category->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StoreCategory $category
     * @return Response
     */
    public function edit($category)
    {
        $current_servers = array_pluck($category->servers()->get(['servers.id'])->toArray(),'id');
        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.categories.edit', compact('category','current_servers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreCategory $category
     * @param  Requests\StoreCategoryRequest $request
     * @return Response
     */
    public function update($category, Requests\StoreCategoryRequest $request)
    {
        $category->update($request->all());

        $this->SyncServers($category, $request->input('server_list'));

        return redirect()->route('webpanel.store.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  StoreCategory $category
     * @return Response
     */
    public function destroy($category)
    {
        $category->delete();
        return redirect()->route('webpanel.store.categories.index');
    }


    /**
     * Sync the Server List
     *
     * @param StoreCategory $category
     * @param array $servers
     */
    private function SyncServers(StoreCategory $category, $servers = array())
    {
        if ($servers == null) $servers = array();
        $category->servers()->sync($servers);
    }


    /**
     * Returns the Datatables data
     *
     * @return mixed
     */
    public function getData()
    {
        $categories = StoreCategory::select(['id','priority','display_name','require_plugin']);

        return Datatables::of($categories)
            ->addColumn('action', function ($category) {
                $actions = view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.categories._actions', compact('category'))->render();
                return $actions;
            })
            ->make();
    }

}
