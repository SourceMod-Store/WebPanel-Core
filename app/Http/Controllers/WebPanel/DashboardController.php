<?php namespace App\Http\Controllers\Webpanel;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showDashboard()
	{
        return view('templates.adminlte205.webpanel.empty');
	}
}
