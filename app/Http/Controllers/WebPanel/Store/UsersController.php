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

use App\Models\StoreUser;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param Requests\StoreUserRequest $request
     * @return Response
     */
    public function store(Requests\StoreUserRequest $request)
    {
        $input = $request->all();

        StoreUser::create($input);

        return redirect()->route('webpanel.store.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  StoreUser $store_user
     * @return Response
     */
    public function show(StoreUser $store_user)
    {
        return redirect()->route(['webpanel.store.users.edit', $store_user->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StoreUser $store_user
     * @return Response
     */
    public function edit(StoreUser $store_user)
    {
        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.users.edit', compact('store_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreUser $store_user
     * @param  Requests\StoreUserRequest $request
     * @return Response
     */
    public function update(StoreUser $store_user, Requests\StoreUserRequest $request)
    {
        $store_user->update($request->all());
        return redirect()->route('webpanel.store.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  StoreUser $store_user
     * @return Response
     */
    public function destroy(StoreUser $store_user)
    {
        $store_user->delete();
        return redirect()->route('webpanel.store.users.index');
    }


    /**
     * Returns the Datatables data
     *
     * @return mixed
     */
    public function getData()
    {
        $users = StoreUser::select(['id','auth','name','credits']);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                $actions = view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.users._actions', compact('user'))->render();
                return $actions;
            })
            ->make();
    }

}
