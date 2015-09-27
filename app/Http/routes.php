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

//Installer Routes
//Route::group(['prefix' => 'installer'], function () {
//    Route::get('', ['as' => 'installer.welcome.show', 'uses' => 'InstallerController@showWelcome']);
//    Route::post('', ['as' => 'installer.welcome.post', 'uses' => 'InstallerController@postWelcome']);
//    Route::get('settings', ['as' => 'installer.settings.show', 'uses' => 'InstallerController@showSettings']);
//    Route::post('settings', ['as' => 'installer.settings.post', 'uses' => 'InstallerController@postSettings']);
//    Route::get('users', ['as' => 'installer.users.show', 'uses' => 'InstallerController@showUsers']);
//    Route::post('users', ['as' => 'installer.users.post', 'uses' => 'InstallerController@postUsers']);
//    Route::get('finish', ['as' => 'installer.finish.show', 'uses' => 'InstallerController@showFinish']);
//});

//WebPanel Routes
Route::group(['middleware' => ['auth', 'authorize'], 'prefix' => 'webpanel'], function () {

    Route::get('', ['as' => 'webpanel.dashboard', 'uses' => 'WebPanel\DashboardController@showDashboard']);

    // Store Routes --> Features Relating to the Store Plugin
    Route::group(['prefix' => 'store'], function () {
        Route::get('items/data', ['as' => 'webpanel.store.items.data', 'uses' => 'WebPanel\Store\ItemsController@getData']);
        Route::resource('items', 'WebPanel\Store\ItemsController');

        Route::get('categories/data', ['as' => 'webpanel.store.categories.data', 'uses' => 'WebPanel\Store\CategoriesController@getData']);
        Route::resource('categories', 'WebPanel\Store\CategoriesController');

        Route::get('users/data', ['as' => 'webpanel.store.users.data', 'uses' => 'WebPanel\Store\UsersController@getData']);
        Route::resource('users', 'WebPanel\Store\UsersController', ['wildcards' => ['users' => 'store_user']]);

        Route::resource('servers', 'WebPanel\Store\ServersController');

        Route::group(['prefix' => 'versions'], function () {
            Route::get('', ['as' => 'webpanel.store.versions.index', 'uses' => 'WebPanel\Store\VersionsController@index']);
            Route::get('/{versions}', ['as' => 'webpanel.store.versions.show', 'uses' => 'WebPanel\Store\VersionsController@show']);
        });

        Route::group(['prefix' => 'tools'], function () {
            Route::get('', ['as' => 'webpanel.store.tools.index', 'uses' => 'WebPanel\Store\ToolsController@index']);
            Route::post('json_shrinker', ['as' => 'webpanel.store.tools.json_shrinker', 'uses' => 'WebPanel\Store\ToolsController@JsonShrinker']);
            Route::post('json_checker', ['as' => 'webpanel.store.tools.json_checker', 'uses' => 'WebPanel\Store\ToolsController@JsonChecker']);
            Route::post('import', ['as' => 'webpanel.store.tools.import', 'uses' => 'WebPanel\Store\ToolsController@VerifyImport']);
            Route::post('export', ['as' => 'webpanel.store.tools.export', 'uses' => 'WebPanel\Store\ToolsController@VerifyExport']);
            Route::post('do_import', ['as' => 'webpanel.store.tools.do_import', 'uses' => 'WebPanel\Store\ToolsController@PerformImport']);
        });
    });

    // Panel Routes --> Features Relating to the WebPanel itself
    Route::group(['prefix' => 'panel'], function () {
        Route::resource('permissions', 'WebPanel\Panel\PermissionsController');
        Route::resource('roles', 'WebPanel\Panel\RolesController');
        Route::resource('users', 'WebPanel\Panel\UsersController', ['wildcards' => ['users' => 'panel_user']]);
    });
});

//WebPanel Auth Routes
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


//Store UserPanel Routes
Route::group(['prefix' => 'userpanel'], function () {

    //Auth
    //Authenticates the User if not authenticated
    Route::group(['prefix' => 'auth'],function(){
        Route::get('', ['as' => 'userpanel.auth.index', 'uses' => 'UserPanel\AuthController@getIndex']);
        Route::any('serverlogin',['as' => 'userpanel.auth.serverlogin', 'uses' => 'UserPanel\AuthController@serverlogin']);
        Route::get('steamlogin',['as' => 'userpanel.auth.steamlogin', 'uses' => 'UserPanel\AuthController@steamlogin']);
        Route::get('logout', ['as' => 'userpanel.auth.logout', 'uses' => 'UserPanel\AuthController@logout']);
    });


    Route::group(['middleware' => 'storeuserauth'],function(){
        //Dashboard
        // Will show an overview of the users items, his credits, recent transactions, ...
        Route::get('dashboard', ['as' => 'userpanel.dashboard', 'uses' => 'UserPanel\DashboardController@getIndex']);

        //User Items - Controller ?
        //Shows the items the user owns (inventory) and allows him to buy / sell new items
        Route::resource('useritems', 'UserPanel\UserItemsController');

        //Loadouts - Controller
        // Allows to user to Create View Edit and Delete Loadouts (Only the Creator of a Loadout can Edit and Delete it)
        // Also Links to the loadout items controller
        // Also shows the items that belong to a specific loadout
        Route::resource('loadouts', 'UserPanel\LoadoutController');

        //Loadout Items - Controller ?
        // Allows the owner of a loadout to edit the items that are assigned to that loadout
        // (Allows the owner to assign any item in the whole shop to the loadout because the store plugin checks if the user owns the item before its equipped
        Route::resource('loadoutitems', 'UserPanel\LoadoutItemsController');
    });
});