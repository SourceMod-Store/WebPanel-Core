<?php

namespace App\Http\Controllers\UserPanel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex(Request $request)
    {
        return view('templates.' . \Config::get('userpanel.template') . 'userpanel.empty');
        //TODO: ADD Oviewview of the userprofile (owned credits, number of owned items, ...)
        //TODO: ADD Option to refresh steam picture
    }

}
