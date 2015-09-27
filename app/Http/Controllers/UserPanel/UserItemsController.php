<?php

namespace App\Http\Controllers\UserPanel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\StoreUser;
use App\Models\StoreItem;
use yajra\Datatables\Datatables;

class UserItemsController extends Controller
{
    /**
     * Show all useritems the user owns
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('templates.' . \Config::get('webpanel.template') . 'userpanel.useritems.index');
    }

    /**
     * Show the items that are available for purchase
     *
     * @return Response
     */
    public function getBuy()
    {
        return view('templates.' . \Config::get('webpanel.template') . 'userpanel.useritems.buy');
    }

    /**
     * Perform the actual Purchase
     */
    public function postBuy()
    {

    }

    /**
     * Remove the item and refund credits if item is refundable
     *
     * @param  int  $id
     * @return Response
     */
    public function postRemove(Request $request)
    {
        //TODO: Add Logging
        //TODO: Add Tests

        $item_id = $request->input("item_id");
        $single_item = $request->input("single_item");


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

                $user->credits = $user->credits + $item->price; //Award Credits
                $user->save(); //Save Credts
            }
            else //All items should be removed
            {
                $user->items()->detach($item->id);
                $user->credits = $user->credits + $item->price * $owned_items;
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
     * @return mixed
     */
    public function getUserData(Request $request)
    {
        //$items = StoreItem::select(['id','priority','name','type','price']);
        $user = StoreUser::find($request->session()->get('store_user_id'));

        //$useritems = $user->items()->select(['priority','name','type','price'])->get();
        $useritems = $user->items()->get();

        return Datatables::of($useritems)
            ->addColumn('action', function ($useritem) {
                $actions = view('templates.' . \Config::get('webpanel.template') . 'userpanel.useritems._actions', compact('useritem'))->render();
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
                $actions = view('templates.' . \Config::get('webpanel.template') . 'userpanel.useritems._buyactions', compact('item'))->render();
                return $actions;
            })
            ->make(true);
    }

}
