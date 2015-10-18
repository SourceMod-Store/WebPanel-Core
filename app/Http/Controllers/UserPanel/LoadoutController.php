<?php

namespace App\Http\Controllers\UserPanel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\StoreLoadout;
use yajra\Datatables\Datatables;
use Carbon\Carbon;

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
        return view('templates.' . \Config::get('userpanel.template') . 'userpanel.loadouts.create');
    }

    /**
     * Creates the new loadout
     *
     * This page allows the user to create a new loadout
     * Once the loadout is created the user is redirected to the new loadout
     */
    public function postCreate()
    {

    }

    /**
     * Details for the Loadout
     * Displays the associted items
     * Displays a owned tag if a item is owned
     *
     * @param $loadoutid
     */
    public function getLoadout($loadoutid)
    {

    }

    public function getLoadoutEdit($loadoutid)
    {
        $loadout = StoreLoadout::find($loadoutid);
        return view('templates.' . \Config::get('userpanel.template') . 'userpanel.loadouts.edit',compact('loadout'));
    }

    /**
     * Shows everyone who subscribed to the loadout
     *
     * @param $loadoutid
     */
    public function getLoadoutSubscribers($loadoutid)
    {

    }

    /**
     *
     */
    public function getSubscribe($loadoutid)
    {

    }

    /**
     *
     *
     * @param $loadoutid
     */
    public function getClone ($loadoutid)
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
     * @param $loadoutid
     */
    public function getItemDataForLoadout($loadoutid)
    {

    }

    /**
     * Datatable data for subscribers for a specific loadout
     *
     * @param $loadoutid
     */
    public function getSubscriberDataForLoadout($loadoutid)
    {

    }
}
