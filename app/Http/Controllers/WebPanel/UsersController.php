<?php namespace App\Http\Controllers\Webpanel;

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
     * @param Requests\UserRequest $request
     * @return Response
     */
	public function store(Requests\UserRequest $request)
	{
        $input = $request->all();

        StoreUser::create($input);

        return redirect()->route('webpanel.store.users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  StoreUser $user
	 * @return Response
	 */
	public function show($user)
	{
        return redirect()->route(['webpanel.store.users.edit',$user->id]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  StoreUser $user
	 * @return Response
	 */
	public function edit($user)
	{
        return view('templates.'.\Config::get('webpanel.template').'webpanel.store.users.edit',compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  StoreUser $user
     * @param  Requests\UserRequest $request)
	 * @return Response
	 */
	public function update($user, Requests\UserRequest $request)
	{
		$user->update($request->all());
        return redirect()->route('webpanel.store.users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  StoreUser $user
	 * @return Response
	 */
	public function destroy($user)
	{
		$user->delete();
        return redirect()->route('webpanel.store.users.index');
	}

}
