<?php namespace App\Http\Controllers\WebPanel\Panel;

use App\Permission;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PermissionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.panel.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.panel.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\PanelPermissionRequest $request
     * @return Response
     */
    public function store(Requests\PanelPermissionRequest $request)
    {
        $input = $request->all();

        Permission::create($input);

        return redirect()->route('webpanel.panel.permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Permission $permission
     * @return Response
     */
    public function show($permission)
    {
        return redirect()->route('webpanel.panel.permissions.edit', $permission->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Permission $permission
     * @return Response
     */
    public function edit($permission)
    {
        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.panel.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Requests\PanelPermissionRequest $request
     * @param  App\Permission $permission
     * @return Response
     */
    public function update($permission, Requests\PanelPermissionRequest $request)
    {
        $permission->update($request->all());
        return redirect()->route('webpanel.store.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Permission $permission
     * @return Response
     */
    public function destroy($permission)
    {
        $permission->delete();
        return redirect()->route('webpanel.store.permissions.index');
    }

}
