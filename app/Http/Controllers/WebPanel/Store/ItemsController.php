<?php namespace App\Http\Controllers\WebPanel\Store;

use App\Models\StoreItem;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ItemsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $items = StoreItem::all();

        return view('templates.'.\Config::get('webpanel.template').'webpanel.store.items.index', compact('items'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('templates.'.\Config::get('webpanel.template').'webpanel.store.items.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
     * @param Requests\ItemRequest $request
	 * @return Response
	 */
	public function store(Requests\StoreItemRequest $request)
	{
        $input = $request->all();

        StoreItem::create($input);

        return redirect()->route('webpanel.store.items.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  StoreItem  $item
	 * @return Response
	 */
	public function show($item)
	{
        return redirect()->route(['webpanel.store.items.edit',$item->id]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  StoreItem  $item
	 * @return Response
	 */
	public function edit($item)
	{
        return view('templates.'.\Config::get('webpanel.template').'webpanel.store.items.edit',compact('item'));
	}

	/**
	 * Update the specified resource in storage.
	 *
     * @param  Requests\ItemRequest $request
	 * @param  StoreItem  $item
	 * @return Response
	 */
	public function update($item, Requests\StoreItemRequest $request)
	{
        $item->update($request->all());
        return redirect()->route('webpanel.store.items.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  StoreItem  $item
	 * @return Response
	 */
	public function destroy($item)
	{
        $item->delete();
        return redirect()->route('webpanel.store.items.index');
	}

}
