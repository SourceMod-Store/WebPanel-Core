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
     * Sell the item and refund credits
     *
     * @param  int  $id
     * @return Response
     */
    public function postSell($id)
    {
        //Check if it can be sold
        //If not, then trash
    }

    /**
     * Remove the Item without refunding credits
     *
     * @param $id
     */
    public function postTrash($id)
    {

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
