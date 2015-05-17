<?php namespace App\Http\Controllers;

use App\StoreUser;
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

        return view('templates.'.\Config::get('webpanel.template').'webpanel.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('templates.'.\Config::get('webpanel.template').'webpanel.users.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param Requests\CreateUserRequest $request
     * @return Response
     */
	public function store(Requests\CreateUserRequest $request)
	{
        $input = $request->all();

        StoreUser::create($input);

        return redirect()->route('webpanel.users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  StoreUser $user
	 * @return Response
	 */
	public function show($user)
	{
        return redirect()->route(['webpanel.users.edit',$user->id]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  StoreUser $user
	 * @return Response
	 */
	public function edit($user)
	{
        return view('templates.'.\Config::get('webpanel.template').'webpanel.users.edit',compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  StoreUser $user
	 * @return Response
	 */
	public function update($user, Requests\EditUserRequest $request)
	{
		$user->update($request->all());
        return redirect()->route('webpanel.users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  StoreUser $user
	 * @return Response
	 */
	public function destroy($user, Requests\DeleteUserRequest $request)
	{
		$user->delete();
        return redirect()->route('webpanel.users.index');
	}

}
