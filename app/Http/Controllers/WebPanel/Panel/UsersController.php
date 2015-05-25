<?php namespace App\Http\Controllers\WebPanel\Panel;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = User::all();

        return view('templates.'.\Config::get('webpanel.template').'webpanel.panel.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('templates.'.\Config::get('webpanel.template').'webpanel.panel.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
     * @param Requests\PanelUserRequest $request
	 * @return Response
	 */
	public function store(Requests\PanelUserRequest $request)
	{
        $input = $request->all();

        $user = User::create($input);
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $this->SyncRoles($user, $request->input('role_list'));

        return redirect()->route('webpanel.panel.users.index');
	}

	/**
	 * Display the specified resource.
	 *
     * @param User $panel_user
	 * @return Response
	 */
	public function show(User $panel_user)
	{
        return redirect()->route('webpanel.panel.users.edit',$panel_user->id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  User $panel_user
	 * @return Response
	 */
	public function edit(User $panel_user)
	{
        return view('templates.'.\Config::get('webpanel.template').'webpanel.panel.users.edit',compact('panel_user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  User  $panel_user
     * @param  Requests\PanelUserRequest $request
	 * @return Response
	 */
	public function update(User $panel_user, Requests\PanelUserRequest $request)
	{
        $panel_user->update($request->all());

        if($panel_user->password != $request->input('password'))
        {
            $panel_user->password = bcrypt($request->input('password'));
            $panel_user->save();
        }

        $this->SyncRoles($panel_user, $request->input('role_list'));
        return redirect()->route('webpanel.panel.users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  User $panel_user
	 * @return Response
	 */
	public function destroy(User $panel_user)
	{
        $user = User::find($panel_user);

        $user->delete();
        return redirect()->route('webpanel.panel.users.index');
	}


    /**
     * Sync the Server List
     *
     * @param User $user
     * @param array $roles
     */
    private function SyncRoles(User $user, $roles = array())
    {
        if($roles == null) $roles = array();

        $user->roles()->sync($roles);
    }

}
