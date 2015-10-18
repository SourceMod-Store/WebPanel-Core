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
//TODO: Convert the loadoutid to a loadout object
//TODO: Check if the supplied loadoutid is valid. If not -> fail

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
    public function postCreate(Request $request)
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
    public function getLoadout($loadoutid)
    {
        $loadout = StoreLoadout::find($loadoutid);
        return view('templates.' . \Config::get('userpanel.template') . 'userpanel.loadouts.view',compact('loadout'));
    }

    /**
     * Displays the Edit Loadout Page
     *
     * @param $loadoutid
     * @return \BladeView|bool|\Illuminate\View\View
     */
    public function getLoadoutEdit($loadoutid)
    {
        $loadout = StoreLoadout::find($loadoutid);

        if ($loadout->owner_id == Session::get('store_user_id',0))
        {
            return view('templates.' . \Config::get('userpanel.template') . 'userpanel.loadouts.edit',compact('loadout'));
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
    public function postLoadoutEdit($loadoutid, Request $request)
    {
        $loadout = StoreLoadout::find($loadoutid);

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
    public function getDelete($loadoutid, Request $request)
    {
        $loadout = StoreLoadout::find($loadoutid);
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
