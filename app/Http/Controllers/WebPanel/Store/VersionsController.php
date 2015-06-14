<?php namespace App\Http\Controllers\WebPanel\Store;

use App\Models\StoreVersion;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class VersionsController extends Controller
{

    /**
     * Gives an Overview of the installed module Versions
     *
     * @return Response
     */
    public function index()
    {
        $versions = StoreVersion::all();

        return view('templates.' . \Config::get('webpanel.template') . 'webpanel.store.versions.index', compact('versions'));
    }

    /**
     * Shows details about the Selected Version
     *
     * @param StoreVersion $version
     */
    public function show($version)
    {
        dd($version);
    }
}
