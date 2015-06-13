<?php namespace App\Http\Controllers\WebPanel\Store;

use App\Models\StoreUser;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = StoreUser::all();

        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.users.create');
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
     * @param  StoreUser $store_user
     * @return Response
     */
    public function show(StoreUser $store_user)
    {
        return redirect()->route(['webpanel.store.users.edit', $store_user->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StoreUser $store_user
     * @return Response
     */
    public function edit(StoreUser $store_user)
    {
        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.users.edit', compact('store_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreUser $store_user
     * @param  Requests\StoreUserRequest $request
     * @return Response
     */
    public function update(StoreUser $store_user, Requests\StoreUserRequest $request)
    {
        $store_user->update($request->all());
        return redirect()->route('webpanel.store.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  StoreUser $store_user
     * @return Response
     */
    public function destroy(StoreUser $store_user)
    {
        $store_user->delete();
        return redirect()->route('webpanel.store.users.index');
    }

}
