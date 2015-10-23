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

    Route::get('',function(){
        return redirect()->route('userpanel.dashboard');
    });

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

        //User Items
        //Shows the items the user owns (inventory) and allows him to buy / sell new items
        Route::group(['prefix' => 'useritems'],function(){
            Route::get('', ['as' => 'userpanel.useritems.index', 'uses' => 'UserPanel\UserItemsController@getIndex']);
            Route::get('buyoverview', ['as' => 'userpanel.useritems.buyoverview', 'uses' => 'UserPanel\UserItemsController@getBuyOverview']); //Shows the buy overview page
            Route::get('buy/{item_id}', ['as' => 'userpanel.useritems.buyconf', 'uses' => 'UserPanel\UserItemsController@getBuy']); //Shows the buy details page
            Route::post('buy/{item_id}', ['as' => 'userpanel.useritems.buyproc', 'uses' => 'UserPanel\UserItemsController@postBuy']); // Processes the Puchase
            Route::post('sell/{item_id}', ['as' => 'userpanel.useritems.sell', 'uses' => 'UserPanel\UserItemsController@postSell']); //Sells the item --> Add a confirm page
            Route::get('userdata', ['as' => 'userpanel.useritems.userdata', 'uses' => 'UserPanel\UserItemsController@getUserData']);
            Route::get('itemdata', ['as' => 'userpanel.useritems.itemdata', 'uses' => 'UserPanel\UserItemsController@getItemData']);
        });

        //Loadouts - Controller
        // Allows to user to Create View Edit and Delete Loadouts (Only the Creator of a Loadout can Edit and Delete it)
        // Also Links to the loadout items controller
        // Also shows the items that belong to a specific loadout
        Route::group(['prefix' => 'loadouts'],function(){
            Route::get('', ['as' => 'userpanel.loadouts.index', 'uses' => 'UserPanel\LoadoutController@getIndex']); //Get the overview of all available loadouts. Display tags for the loadouts (owned, subscribe) and display a subscribe and maybe a clone button on
            Route::get('create',['as' => 'userpanel.loadouts.create', 'uses' => 'UserPanel\LoadoutController@getCreate']); //Shows the create loadout page
            Route::post('create',['as' => 'userpanel.loadouts.create', 'uses' => 'UserPanel\LoadoutController@postCreate']); //Creates the loadout
            Route::get('loadoutdata', ['as' => 'userpanel.loadouts.loadoutdata', 'uses' => 'UserPanel\LoadoutController@getLoadoutData']); //Gets the datatables data for all available loadouts

            Route::get('{loadout}', ['as' => 'userpanel.loadouts.view', 'uses' => 'UserPanel\LoadoutController@getLoadout']); //Shows a overview of the loadout with the associated items
            Route::post('{loadout}/select',['as' => 'userpanel.loadouts.select', 'uses' => 'UserPanel\LoadoutController@postSelect']); //Selects the loadout as main loadout
            Route::get('{loadout}/subscribe',['as' => 'userpanel.loadouts.subscribe', 'uses' => 'UserPanel\LoadoutController@getSubscribe']); //Subscribes the user to the selected loadout
            Route::get('{loadout}/unsubscribe',['as' => 'userpanel.loadouts.unsubscribe', 'uses' => 'UserPanel\LoadoutController@getUnsubscribe']); //Unsubscribes the user from the selected loadout
            Route::get('{loadout}/clone',['as' => 'userpanel.loadouts.clone', 'uses' => 'UserPanel\LoadoutController@getClone']); //Clones the selected loadout
            Route::get('{loadout}/delete',['as' => 'userpanel.loadouts.delete', 'uses' => 'UserPanel\LoadoutController@getDelete']); //Deletes the selected loadout
            Route::get('{loadout}/items',['as' => 'userpanel.loadouts.items', 'uses' => 'UserPanel\LoadoutController@getLoadoutItems']); // Show the add items page
            Route::any('{loadout}/items/{item_id}/add',['as' => 'userpanel.loadouts.items.add', 'uses' => 'UserPanel\LoadoutController@postLoadoutItemsAdd']); //Processes the item add
            Route::any('{loadout}/items/{item_id}/remove',['as' => 'userpanel.loadouts.items.remove', 'uses' => 'UserPanel\LoadoutController@postLoadoutItemsRemove']); //Processes the item add
            Route::get('{loadout}/edit',['as' => 'userpanel.loadouts.edit', 'uses' => 'UserPanel\LoadoutController@getLoadoutEdit']); //Shows the page to edit the selected loadout
            Route::post('{loadout}/edit',['as' => 'userpanel.loadouts.edit', 'uses' => 'UserPanel\LoadoutController@postLoadoutEdit']); //Processes edit to the selected loadout
            Route::get('{loadout}/subscribers', ['as' => 'userpanel.loadouts.subscribers','uses' => 'UserPanel\LoadoutController@getLoadoutSubscribers']); //Shows who subscribed to the loadout
            Route::get('{loadout}/itemdata', ['as' => 'userpanel.loadouts.itemdata', 'uses' => 'UserPanel\LoadoutController@getItemDataForLoadout']); //Get the datatables data of the items associated to the loadout
            Route::get('{loadout}/subscriberdata', ['as' => 'userpanel.loadouts.subscriberdata', 'uses' => 'UserPanel\LoadoutController@getSubscriberDataForLoadout']); //Get the datatables data of the subsscribers associated with the loadout
        });
    });

    //Helper Functions
    Route::get('steamimage', ['as' => 'userpanel.steamimage.current', 'uses' => 'UserPanel\SteamImageController@getUserImageForCurrent']);
    Route::get('steamimage/refresh', ['as' => 'userpanel.steamimage.auth', 'uses' => 'UserPanel\SteamImageController@refreshUserImage']);
    Route::get('steamimage/{auth}', ['as' => 'userpanel.steamimage.auth', 'uses' => 'UserPanel\SteamImageController@getUserImageForAuth']);
});