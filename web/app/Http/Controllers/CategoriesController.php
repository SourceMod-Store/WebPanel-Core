<?php namespace App\Http\Controllers;

use App\StoreCategory;
use App\StoreServer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $categories= StoreCategory::all();

        return view('templates.'.\Config::get('webpanel.template').'webpanel.categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('templates.'.\Config::get('webpanel.template').'webpanel.categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
     * @param Requests\CategoryRequest $request
	 * @return Response
	 */
	public function store(Requests\CategoryRequest $request)
	{
        $input = $request->all();

        $category = StoreCategory::create($input);

        $this->SyncServers($category, $request->input('server_list'));

        return redirect()->route('webpanel.categories.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  StoreCategory  $category
	 * @return Response
	 */
	public function show($category)
	{
        return redirect()->route(['webpanel.categories.edit',$category->id]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  StoreCategory  $category
	 * @return Response
	 */
	public function edit($category)
	{
        return view('templates.'.\Config::get('webpanel.template').'webpanel.categories.edit',compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  StoreCategory  $category
     * @param  Requests\CategoryRequest $request
	 * @return Response
	 */
	public function update($category, Requests\CategoryRequest $request)
	{
        $category->update($request->all());

        $this->SyncServers($category, $request->input('server_list'));

        return redirect()->route('webpanel.categories.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  StoreCategory  $category
	 * @return Response
	 */
	public function destroy($category)
	{
        $category->delete();
        return redirect()->route('webpanel.categories.index');
	}



    /**
     * Sync the Server List
     *
     * @param StoreCategory $category
     * @param array $servers
     */
    private function SyncServers(StoreCategory $category, array $servers)
    {
        $category->servers()->sync($servers);
    }

}
