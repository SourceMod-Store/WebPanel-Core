<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class InstallerController extends Controller
{

    public function showWelcome()
    {
        return view('templates.installer.welcome');
    }

    public function postWelcome()
    {

    }

    public function showSettings()
    {
        return view('templates.installer.settings');
    }

    public function postSettings()
    {

    }

    public function showUsers()
    {
        return view('templates.installer.user');
    }

    public function postUsers()
    {

    }

    public function showFinish()
    {
        return view('templates.installer.finish');
    }

}
