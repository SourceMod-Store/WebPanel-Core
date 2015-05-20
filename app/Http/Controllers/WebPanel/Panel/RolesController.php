<?php namespace App\Http\Controllers\WebPanel\Panel;

use App\Role;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $roles = Role::all();

        return view('templates.'.\Config::get('webpanel.template').'webpanel.panel.roles.index', compact('roles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('templates.'.\Config::get('webpanel.template').'webpanel.panel.roles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
     * @param Requests\PanelRoleRequest $request
	 * @return Response
	 */
	public function store(Requests\PanelRoleRequest $request)
	{
        $input = $request->all();

        Role::create($input);

        return redirect()->route('webpanel.panel.roles.index');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  App\Role $role
	 * @return Response
	 */
	public function show($role)
	{
        return redirect()->route('webpanel.panel.roles.edit',$role->id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  App\Role  $role
	 * @return Response
	 */
	public function edit($role)
	{
        return view('templates.'.\Config::get('webpanel.template').'webpanel.panel.roles.edit',compact('role'));
	}

	/**
	 * Update the specified resource in storage.
	 *
     * Requests\PanelRoleRequest $request
	 * @param  App\Role  $role
	 * @return Response
	 */
	public function update($role, Requests\PanelRoleRequest $request)
	{
        $role->update($request->all());
        return redirect()->route('webpanel.store.roles.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  App\Role  $role
	 * @return Response
	 */
	public function destroy($role)
	{
        $role->delete();
        return redirect()->route('webpanel.store.roles.index');
	}

}
