<?php namespace App\Http\Controllers\Webpanel;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ToolsController extends Controller {

    /**
     * Returns the Import / Export View
     */
    public function index()
    {
        return view('templates.'.\Config::get('webpanel.template').'webpanel.store.tools.index');
    }

    /**
     * Returns the Check JSON View
     */
    public function JsonChecker()
    {

    }

    /** Returns the Shrink JSON View
     *
     */
    public function JsonShrinker()
    {

    }
}
