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

Route::get('/',     'WelcomeController@index');
Route::get('home',  'HomeController@index');

//Installer Routes
Route::group(['prefix'=>'installer'],function(){
    Route::get('',          ['as' => 'installer.welcome.show',  'uses' => 'InstallerController@showWelcome']);
    Route::post('',         ['as' => 'installer.welcome.post',  'uses' => 'InstallerController@postWelcome']);
    Route::get('settings',  ['as' => 'installer.settings.show', 'uses' => 'InstallerController@showSettings']);
    Route::post('settings', ['as' => 'installer.settings.post', 'uses' => 'InstallerController@postSettings']);
    Route::get('users',     ['as' => 'installer.users.show',    'uses' => 'InstallerController@showUsers']);
    Route::post('users',    ['as' => 'installer.users.post',    'uses' => 'InstallerController@postUsers']);
    Route::get('finish',    ['as' => 'installer.finish.show',   'uses' => 'InstallerController@showFinish']);
});

//WebPanel Routes
Route::group(['middleware' => ['auth','authorize'], 'prefix'=>'webpanel'],function(){

    Route::get('', ['as' => 'webpanel.dashboard', 'uses' => 'WebPanel\Store\DashboardController@showDashboard']);

    // Store Routes --> Features Relating to the Store Plugin
    Route::group(['prefix' => 'store'],function(){
        Route::resource('items',        'WebPanel\Store\ItemsController');
        Route::resource('categories',   'WebPanel\Store\CategoriesController');
        Route::resource('users',        'WebPanel\Store\UsersController');
        Route::resource('servers',      'WebPanel\Store\ServersController');

        Route::group(['prefix' => 'versions'],function(){
            Route::get('', ['as' => 'webpanel.store.versions.index','uses' => 'WebPanel\Store\VersionsController@index']);
            Route::get('/{versions}', ['as' => 'webpanel.store.versions.show', 'uses' => 'WebPanel\Store\VersionsController@show']);
        });

        Route::group(['prefix' => 'tools'],function(){
            Route::get('index',         ['as' => 'webpanel.store.tools.index', 'uses' => 'WebPanel\Store\ToolsController@index']);
            Route::post('json_shrinker', ['as' => 'webpanel.store.tools.json_shrinker','uses' => 'WebPanel\Store\ToolsController@JsonShrinker']);
            Route::post('json_checker',  ['as' => 'webpanel.store.tools.json_checker', 'uses' => 'WebPanel\Store\ToolsController@JsonChecker']);
            Route::post('import',       ['as' => 'webpanel.store.tools.import', 'uses' => 'WebPanel\Store\ToolsController@Import']);
            Route::post('export',       ['as' => 'webpanel.store.tools.export', 'uses' => 'WebPanel\Store\ToolsController@Export']);
        });
    });

    // Panel Routes --> Features Relating to the WebPanel itself
    Route::group(['prefix' => 'panel'],function(){

    });
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