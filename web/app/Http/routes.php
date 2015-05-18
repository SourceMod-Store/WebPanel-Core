<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Generic Requests

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');


//WebPanel Routes
Route::group(['middleware' => ['auth','authorize'], 'prefix'=>'webpanel'],function(){
    Route::get('',['as' => 'webpanel.dashboard', 'uses' => 'DashboardController@showDashboard']);
    Route::resource('items', 'ItemsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('users', 'UsersController');
    Route::resource('servers', 'ServersController');
    Route::resource('versions', 'VersionsController');
});


//Auth Routes

Route::get('/logout',['as'=>'logout','uses' => 'Auth\AuthController@getLogout']);
Route::get('/login', ['as'=>'login' ,'uses' => 'Auth\AuthController@getLogin']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



// Test Routes

Route::get('testpromote',function()
{
	$owner = new App\Role();
	$owner->name         = 'owner';
	$owner->display_name = 'Project Owner'; // optional
	$owner->description  = 'User is the owner of a given project'; // optional
	$owner->save();

	$admin = new App\Role();
	$admin->name         = 'admin';
	$admin->display_name = 'User Administrator'; // optional
	$admin->description  = 'User is allowed to manage and edit other users'; // optional
	$admin->save();

	return "done";
});

Route::get('testadminlte',['as' => 'temp', function()
{
    return View::make('templates.adminlte205.webpanel.empty');
}]);