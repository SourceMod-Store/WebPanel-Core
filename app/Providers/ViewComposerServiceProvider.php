<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\StoreUser;
use App\Models\StoreItem;
use App\Models\StoreCategory;
use App\Models\StoreServer;
use App\User;
use App\Role;
use App\Permission;

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

    public function ComposeUserPanelSidebar()
    {
        view()->composer('templates.' . \Config::get('webpanel.template') . 'userpanel.includes.sidebar', function ($view) {
            $view->with('storeItemCount', StoreItem::all()->count()); //Not used
        });
    }

    /**
     * Passes the required variables to the sidebar
     */
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

            $view->with('latest_items',$latest_items);
            $view->with('username', Session("store_user_name"));
            $view->with('credits',$credits);
            $view->with('owned_item_count',$owned_item_count);
        });
    }
}
