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
use App\Models\StoreLoadout;
use App\Models\StoreUser;
use App\Models\StoreItem;
use yajra\Datatables\Datatables;
use Carbon\Carbon;
use Session;

//TODO: Add Logging

class LoadoutController extends Controller
{
    /**
     * Overview of all the loadouts
     * Display tags for the loadouts (owned, subscribed)
     * Display a subscribe button (and maybe a clone button)
     */
    public function getIndex()
    {
        return view('templates.' . \Config::get('userpanel.template') . 'userpanel.loadouts.index');
    }

    /**
     * Page to create a new loadout
     *
     * Displays the page to create a new loadout
     */
    public function getCreate()
    {
        return view('templates.' . \Config::get('userpanel.template') . 'userpanel.loadouts.create',compact('user_id'));
    }

    /**
     * Creates the new loadout
     *
     * This page allows the user to create a new loadout
     * Once the loadout is created the user is redirected to the new loadout
     */
    public function postCreate(Requests\StoreLoadoutRequest $request)
    {
        $input = $request->all();
        $loadout = StoreLoadout::create($input);

        return redirect()->route('userpanel.loadouts.edit',$loadout->id);
    }

    /**
     * Details for the Loadout
     * Displays the associted items
     * Displays a owned tag if a item is owned
     *
     * @param $loadoutid
     */
    public function getLoadout($loadout)
    {
        $items = $loadout->with("items")->find($loadout->id)->toArray()['items'];
        return view('templates.' . \Config::get('userpanel.template') . 'userpanel.loadouts.view',compact('loadout','items'));
    }

    /**
     * Displays the Edit Loadout Page
     *
     * @param $loadoutid
     * @return \BladeView|bool|\Illuminate\View\View
     */
    public function getLoadoutEdit($loadout)
    {
        $items = $loadout->with("items")->find($loadout->id)->toArray()['items'];
        if ($loadout->owner_id == Session::get('store_user_id',0))
        {
            return view('templates.' . \Config::get('userpanel.template') . 'userpanel.loadouts.edit',compact('loadout','items'));
        }
        else
        {
            abort(401);
        }
    }

    /**
     * Saves the Edited Loadout
     *
     * @param $loadoutid
     * @param Request $request
     */
    public function postLoadoutEdit($loadout, Requests\StoreLoadoutRequest $request)
    {
        if ($loadout->owner_id == Session::get('store_user_id',0))
        {
            $loadout->update($request->all());
            return redirect()->route('userpanel.loadouts.view',$loadout->id);
        }
        else
        {
            abort(401);
        }
    }

    /**
     * Deletes the Loadout
     *
     * @param $loadoutid
     * @param Request $request
     */
    public function getDelete($loadout, Request $request)
    {
        if ($loadout->owner_id == Session::get('store_user_id',0))
        {
            $loadout->delete();
            return redirect()->route('userpanel.loadouts.index');
        }
        else
        {
            abort(401);
        }
    }

    /**
     * Shows the page to add items to a loadout
     *
     * @param $loadout
     * @param Request $request
     */
    public function getLoadoutItems($loadout, Request $request)
    {
        if ($loadout->owner_id == Session::get('store_user_id',0))
        {
            return view('templates.' . \Config::get('userpanel.template') . 'userpanel.loadouts.loadoutadditems',compact("loadout"));
        }
        else
        {
            abort(401);
        }
    }

    /**
     * Adds the item to the loadout
     *
     * @param $loadout
     * @param $item_id
     * @param Request $request
     */
    public function postLoadoutItemsAdd($loadout, $item_id, Request $request)
    {
        //TODO: Add logging
        //Check if a item with that type is already added
        //Then redirect to the loadout edit page
        if ($loadout->owner_id == Session::get('store_user_id',0)) //Check if the User is the Owner of the loadout
        {
            $loadout_types = $loadout->items()->lists("loadout_slot")->toArray(); //Get the item types that are currently added to the loadout

            $item = StoreItem::findOrFail($item_id); //Get the item the user wants to add to the loadout

            //Check if the itemtype is not in the list of the currently added items
            if(in_array($item->loadout_slot, $loadout_types))
            {
                //redirect user to loadout edit page with error message
                return redirect()->route("userpanel.loadouts.edit",["loadout" => $loadout->id])
                    ->with("flash_notification",array("message"=>"The item can not be added to the loadout because a item with the same loadout slot is already assigned to that loadout", "level"=>"error"));
            }

            //attach item to loadout
            $loadout->items()->attach($item->id);

            //redirect back to loadout edit page with success message
            return redirect()->route("userpanel.loadouts.edit",["loadout" => $loadout->id])
                ->with("flash_notification",array("message"=>"The item has successfully been added to the loadout", "level"=>"success"));
        }
        else
        {
            abort(401);
        }
    }

    /**
     * Removes the item from the loadout
     *
     * @param $loadout
     * @param Request $request
     */
    public function postLoadoutItemsRemove($loadout, $item_id, Request $request)
    {
        //TODO: Add logging
        //Remvoe the item from the loadout
        //Then redirect to the loadout edit page
        if ($loadout->owner_id == Session::get('store_user_id',0)) //Check if the User is the Owner of the loadout
        {
            $item = StoreItem::findOrFail($item_id); //Get the item the user wants to add to the loadout

            //attach item to loadout
            $loadout->items()->detach($item->id);

            //redirect back to loadout edit page with success message
            return redirect()->route("userpanel.loadouts.edit",["loadout" => $loadout->id])
                ->with("flash_notification",array("message"=>"The item has successfully been removed from the loadout", "level"=>"success"));
        }
        else
        {
            abort(401);
        }
    }

    /**
     * Shows everyone who subscribed to the loadout
     *
     * @param $loadoutid
     */
    public function getLoadoutSubscribers($loadout)
    {

    }

    /**
     * Sets the loadout as primary loadout
     *
     * @param $loadout
     */
    public function postSelect($loadout)
    {
        $user = StoreUser::findOrFail(Session::get('store_user_id',0));
        $user->eqp_loadout_id = $loadout->id;
        $user->save();
        //redirect back to loadout edit page with success message
        return redirect()->route("userpanel.loadouts.view",["loadout" => $loadout->id])
            ->with("flash_notification",array("message"=>"The selected loadout has been set as your equipped loadout", "level"=>"success"));
    }

    /**
     * Subscribes a user to a loadout
     */
    public function getSubscribe($loadout)
    {

    }

    /**
     *
     *
     * @param $loadout
     */
    public function getClone ($loadout)
    {

    }


    /**
     * Datatable data for all Loadouts
     *
     */
    public function getLoadoutData(Request $request)
    {
        $loadouts = StoreLoadout::with('owner')
            ->where('privacy','public')
            ->orWhere('privacy',NULL)
            ->orWhere('owner_id',$request->session()->get('store_user_id'));

        return Datatables::of($loadouts)
            ->addColumn('action', function ($loadout) {
                $actions = view('templates.' . \Config::get('userpanel.template') . 'userpanel.loadouts._overviewactions', compact('loadout'))->render();
                return $actions;
            })
            ->make(true);
    }

    /**
     * Datatable data for items for a specific Loadout
     *
     * @param Store_Loadout $loadout
     * @param Request $request
     */
    public function getItemDataForLoadout($loadout, Request $request)
    {
        //Only display items with a loadoutslot that has not jet been added to a loadout

        //Get the types for the items that are currently associated with that loadout
        $loadout_types = $loadout->items()->lists("loadout_slot");

        $items = StoreItem::where("is_buyable","1")
            ->whereNotIn('loadout_slot',$loadout_types)
            ->with('category');

        Session::flash("loadout_id",$loadout->id); //Dirty hack to get the loadout id into the table via the ViewComposerServiceProvider

        return Datatables::of($items)
            ->addColumn('action', function ($item) {
                $actions = view('templates.' . \Config::get('userpanel.template') . 'userpanel.loadouts._additemactions', compact('item'))->render();
                return $actions;
            })
            ->make(true);
    }

    /**
     * Datatable data for subscribers for a specific loadout
     *
     * @param $loadout
     */
    public function getSubscriberDataForLoadout($loadout)
    {

    }
}
