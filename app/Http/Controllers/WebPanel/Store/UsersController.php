<?php namespace App\Http\Controllers\WebPanel\Store;

use App\Models\StoreUser;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = StoreUser::all();

        return view('templates.'.\Config::get('webpanel.template').'webpanel.store.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('templates.'.\Config::get('webpanel.template').'webpanel.store.users.create');
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
	 * @param  int $id
	 * @return Response
	 */
	public function show($id)
	{
        $user = StoreUser::find($id);
        return redirect()->route(['webpanel.store.users.edit',$user->id]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = StoreUser::find($id);
        return view('templates.'.\Config::get('webpanel.template').'webpanel.store.users.edit',compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
     * @param  Requests\StoreUserRequest $request)
	 * @return Response
	 */
	public function update($id, Requests\StoreUserRequest $request)
	{
        $user = StoreUser::find($id);
		$user->update($request->all());
        return redirect()->route('webpanel.store.users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $user = StoreUser::find($id);
		$user->delete();
        return redirect()->route('webpanel.store.users.index');
	}

}
