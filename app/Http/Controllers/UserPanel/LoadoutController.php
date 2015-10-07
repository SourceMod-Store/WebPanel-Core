<?php

namespace App\Http\Controllers\UserPanel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
     * Details for the Loadout
     * Displays the associted items
     * Displays a owned tag if a item is owned
     *
     * @param $loadoutid
     */
    public function getLoadout($loadoutid)
    {

    }

    /**
     * Shows a Add item page for the loadout
     * Displays all available items
     * Add a way to display only the owned items
     *
     * @param $loadoutid
     */
    public function getAddItemToLoadout($loadoutid)
    {

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
     * Datatable data for all Loadouts
     *
     */
    public function getLoadoutData()
    {

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
