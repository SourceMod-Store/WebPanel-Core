<?php namespace App\Http\Controllers\WebPanel\Store;

use App\Models\StoreServer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ServersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $servers = StoreServer::all();

        return view('templates.'.\Config::get('webpanel.template').'webpanel.store.servers.index', compact('servers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('templates.'.\Config::get('webpanel.template').'webpanel.store.servers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
     * @param Requests\ServerRequest $request
     *
	 * @return Response
	 */
	public function store(Requests\ServerRequest $request)
	{
        $input = $request->all();

        StoreServer::create($input);

        return redirect()->route('webpanel.store.servers.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  App\Models\StoreServer  $server
     *
	 * @return Response
	 */
	public function show($server)
	{
        return redirect()->route(['webpanel.store.servers.edit',$server->id]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  App\Models\StoreServer $server
     *
	 * @return Response
	 */
	public function edit($server)
	{
        return view('templates.'.\Config::get('webpanel.template').'webpanel.store.servers.edit',compact('server'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  App\Models\StoreServer $server
     * @param  Requests\ServerRequest $request
     *
	 * @return Response
	 */
	public function update($server, Requests\ServerRequest $request)
	{
        $server->update($request->all());
        return redirect()->route('webpanel.store.servers.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  App\Models\StoreServer $server
	 * @return Response
	 */
	public function destroy($server)
	{
        $server->delete();
        return redirect()->route('webpanel.store.servers.index');
	}

}
