<?php

namespace App\Http\Controllers\UserPanel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\StoreUser;
use App\Models\StoreItem;
use yajra\Datatables\Datatables;
use Carbon\Carbon;

class UserItemsController extends Controller
{
    /**
     * Show all useritems the user owns
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('templates.' . \Config::get('userpanel.template') . 'userpanel.useritems.index');
    }

    /**
     * Show the items that are available for purchase
     *
     * @return Response
     */
    public function getBuyOverview()
    {
        return view('templates.' . \Config::get('userpanel.template') . 'userpanel.useritems.buyoverview');
    }


    public function getBuy($item_id)
    {
        $item = StoreItem::find($item_id);
        return view('templates.' . \Config::get('userpanel.template') . 'userpanel.useritems.buyconfirm', compact("item"));
    }

    /**
     * Perform the actual Purchase
     *
     * @return Response
     */
    public function postBuy(Request $request, $item_id)
    {
        $user = StoreUser::find($request->session()->get('store_user_id'));
        $item = StoreItem::find($item_id);


        //Check if item can be bought
        if ($item->is_buyable == 0) abort(400);

        //Check if the user has got enough credits
        if($user->credits >= $item->price)
        {
            $user->credits = $user->credits - $item->price;
            $user->save();
            $user->items()->attach($item->id, ['acquire_method' => 'web','acquire_date'=> Carbon::now()->toDateTimeString()]);
            return redirect()->route('userpanel.useritems.index');
        }
        else
        {
            abort(402);
        }
    }

    /**
     * Remove the item and refund credits if item is refundable
     *
     * @param  int  $id
     * @return Response
     */
    public function postSell(Request $request, $item_id)
    {
        //TODO: Add Logging
        //TODO: Add Tests

        $single_item = $request->input("single_item");
        if(!isset($single_item) || $single_item = NULL) $single_item = true;

        $user = StoreUser::find($request->session()->get('store_user_id'));
        $item = StoreItem::find($item_id);

        //Check if the user ownes the item before removing it
        $owned_items = $user->items()->where('item_id',$item->id)->count();

        if($owned_items <= 0)
        {
            //TODO: Log this
            abort(400);
        }

        //Check if item is refundable or not
        if ($item->is_refundable == 0)
        {
            $user->items()->detach($item->id); //Remove item
            if($single_item == true)
            {
                //TODO: Find a way to replace the for loop
                for ($i = 1 ; $i <= $owned_items - 1; $i++) //Reattach items again
                {
                    $user->items()->attach($item->id);
                }
            }

            return redirect()->route('userpanel.useritems.index');
        }
        elseif ($item->is_refundable == 1) //Check if credits should be awarded
        {
            if($single_item == true) //Check if only a single item should be removed
            {
                //TODO: Find a way to replace the for loop
                $user->items()->detach($item->id); //Remove items
                for ($i = 1 ; $i <= $owned_items - 1; $i++) //Reattach all but one item again
                {
                    $user->items()->attach($item->id);
                }

                $user->credits = $user->credits + $item->price; //Award Credits TODO: Add "refund-fee"
                $user->save(); //Save Credts
            }
            else //All items should be removed
            {
                $user->items()->detach($item->id);
                $user->credits = $user->credits + $item->price * $owned_items; //TODO: Add "refund-fee"
                $user->save();
            }

            return redirect()->route('userpanel.useritems.index');
        }
        else
        {
            abort(500, "Invalid refundable string");
        }

    }

    /**
     * Returns the Datatables data
     * Get the Useritems for the user
     *
     * @param $request
     * @return mixed
     */
    public function getUserData(Request $request)
    {
        $user = StoreUser::find($request->session()->get('store_user_id'));

        $useritems = $user->items();

        return Datatables::of($useritems)
            ->addColumn('action', function ($item) {
                $actions = view('templates.' . \Config::get('userpanel.template') . 'userpanel.useritems._sellactions', compact('item'))->render();
                return $actions;
            })
            ->make(true);
    }

    /**
     * Returns the Datatables data
     * Get all Items that are available for purchase
     *
     * @return mixed
     */
    public function getItemData(Request $request)
    {
        $items = StoreItem::where("is_buyable","1")->with('category');

        return Datatables::of($items)
            ->addColumn('action', function ($item) {
                $actions = view('templates.' . \Config::get('userpanel.template') . 'userpanel.useritems._buyactions', compact('item'))->render();
                return $actions;
            })
            ->make(true);
    }

}
