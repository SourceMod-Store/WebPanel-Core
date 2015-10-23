<?php

namespace App\Http\Controllers\UserPanel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\StoreLoadout;
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

        return redirect()->route('userpanel.loadouts.view',$loadout->id);
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
        return view('templates.' . \Config::get('userpanel.template') . 'userpanel.loadouts.loadoutadditems',compact("loadout"));
    }

    /**
     * Adds the item to the loadout
     *
     * @param $loadout
     * @param Request $request
     */
    public function postLoadoutItemsAdd($loadout, Request $request)
    {
        //Check if a item with that type is already added
        //Then redirect to the loadout edit page
    }

    /**
     * Removes the item from the loadout
     *
     * @param $loadout
     * @param Request $request
     */
    public function postLoadoutItemsRemove($loadout, Request $request)
    {
        //Remvoe the item from the loadout
        //Then redirect to the loadout edit page
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
     * Subscribes a user to a loadout
     */
    public function getSubscribe($loadout)
    {

    }

    /**
     *
     *
     * @param $loadoutid
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
    }

    /**
     * Datatable data for subscribers for a specific loadout
     *
     * @param $loadoutid
     */
    public function getSubscriberDataForLoadout($loadout)
    {

    }
}
