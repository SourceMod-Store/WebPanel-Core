<?php namespace App\Providers;

//Copyright (c) 2015 "Werner Maisl"
//
//This file is part of the Store Webpanel V2.
//
//The Store Webpanel V2 is free software: you can redistribute it and/or modify
//it under the terms of the GNU Affero General Public License as
//published by the Free Software Foundation, either version 3 of the
//License, or (at your option) any later version.
//
//This program is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//GNU Affero General Public License for more details.
//
//You should have received a copy of the GNU Affero General Public License
//along with this program. If not, see <http://www.gnu.org/licenses/>.

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\StoreUser;
use App\Models\StoreItem;
use App\Models\StoreCategory;
use App\Models\StoreServer;
use App\User;
use App\Role;
use App\Permission;
use Session;

class ViewComposerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->ComposeWebPanelSidebar();
        $this->ComposeWebPanelForms();
        $this->ComposeWebPanelHeader();
        $this->ComposeUserPanelHeader();
        $this->ComposeUserPanelForms();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    /**
     * Passes the required variables to the sidebar
     */
    public function ComposeWebPanelSidebar()
    {
        view()->composer('templates.' . \Config::get('webpanel.template') . 'webpanel.includes.sidebar', function ($view) {
            $view->with('storeItemCount', StoreItem::all()->count());
            $view->with('storeCategoryCount', StoreCategory::all()->count());
            $view->with('storeUserCount', StoreUser::all()->count());
            $view->with('storeServerCount', StoreServer::all()->count());
            $view->with('panelUserCount', User::all()->count());
            $view->with('panelRoleCount', Role::all()->count());
            $view->with('panelPermissionCount', Permission::all()->count());
        });
    }

    /**
     * Passes the required variables to the sidebar
     */
    public function ComposeUserPanelSidebar()
    {
        view()->composer('templates.' . \Config::get('webpanel.template') . 'userpanel.includes.sidebar', function ($view) {
            $view->with('storeItemCount', StoreItem::all()->count()); //Not used
        });
    }


    public function ComposeWebPanelForms()
    {
        view()->composer('templates.' . \Config::get('webpanel.template') . 'webpanel.store.items._form', function ($view) {
            $view->with('categories', StoreCategory::lists('display_name', 'id'));
            $view->with('servers', StoreServer::lists('display_name', 'id'));
        });

        view()->composer('templates.' . \Config::get('webpanel.template') . 'webpanel.store.categories._form', function ($view) {
            $view->with('servers', StoreServer::lists('display_name', 'id'));
        });

        view()->composer('templates.' . \Config::get('webpanel.template') . 'webpanel.panel.users._form', function ($view) {
            $view->with('roles', Role::lists('display_name', 'id'));
        });

        view()->composer('templates.' . \Config::get('webpanel.template') . 'webpanel.panel.roles._form', function ($view) {
            $view->with('permissions', Permission::lists('display_name', 'id'));
        });

        view()->composer('templates.' . \Config::get('webpanel.template') . 'webpanel.panel.permissions._form', function ($view) {
            $view->with('roles', Role::lists('display_name', 'id'));
        });
    }

    public function ComposeUserPanelForms()
    {
        view()->composer('templates.' . \Config::get('userpanel.template') . 'userpanel.loadouts._overviewactions', function ($view) {
            $view->with('user_id', Session::get('store_user_id',0));
        });
        view()->composer('templates.' . \Config::get('userpanel.template') . 'userpanel.loadouts._form', function ($view) {
            $view->with('user_id', Session::get('store_user_id',0));
        });
        view()->composer('templates.' . \Config::get('userpanel.template') . 'userpanel.loadouts._additemactions', function ($view) {
            $view->with('user_id', Session::get('store_user_id',0));
            $view->with('loadout_id',Session::get('loadout_id',0));
        });
    }


    /**
     * Passes the required variables to the header
     */
    public function ComposeWebPanelHeader()
    {
        view()->composer('templates.' . \Config::get('webpanel.template') . 'webpanel.includes.header', function ($view) {
            $view->with('username', Auth::user()->name);
        });
    }

    public function ComposeUserPanelHeader()
    {
        view()->composer('templates.' . \Config::get('webpanel.template') . 'userpanel.includes.header', function ($view) {
            $store_user = StoreUser::find(Session("store_user_id"));
            $credits = $store_user->credits;
            $owned_item_count = $store_user->items()->count();
            $latest_items = $store_user->items()->orderBy('acquire_date','desc')->take(5)->get();
            $owned_loadout_count = $store_user->owned_loadouts()->count();
            $subscribed_loadout_count = $store_user->subscribed_loadouts()->count();
            if ( $equipped_loadout = $store_user->equipped_loadout != NULL ){
                $equipped_loadout = $store_user->equipped_loadout->display_name;
            }else{
                $equipped_loadout = NULL;
            }


            $view->with('latest_items',$latest_items);
            $view->with('username', Session("store_user_name"));
            $view->with('credits',$credits);
            $view->with('owned_item_count',$owned_item_count);
            $view->with('owned_loadout_count',$owned_loadout_count);
            $view->with('subscribed_loadout_count',$subscribed_loadout_count);
            $view->with('equipped_loadout_name',$equipped_loadout);
        });
    }
}
