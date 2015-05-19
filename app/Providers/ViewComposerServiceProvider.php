<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\StoreUser;
use App\Models\StoreItem;
use App\Models\StoreCategory;
use App\Models\StoreServer;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->ComposeSidebar();
        $this->ComposeForms();
        $this->ComposeHeader();
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
    public function ComposeSidebar()
    {
        view()->composer('templates.' . \Config::get('webpanel.template') . 'webpanel.includes.sidebar', function ($view) {
            $view->with('itemCount', StoreItem::all()->count());
            $view->with('categoryCount', StoreCategory::all()->count());
            $view->with('userCount', StoreUser::all()->count());
        });
    }

    /**
     * Passes the required variables to the sidebar
     */
    public function ComposeForms()
    {
        view()->composer('templates.' . \Config::get('webpanel.template') . 'webpanel.items._form', function ($view) {
            $view->with('categories', StoreCategory::lists('display_name', 'id'));
            $view->with('servers', StoreServer::lists('display_name', 'id'));
        });

        view()->composer('templates.' . \Config::get('webpanel.template') . 'webpanel.categories._form', function ($view) {
            $view->with('servers', StoreServer::lists('display_name', 'id'));
        });
    }


    /**
     * Passes the required variables to the header
     */
    public function ComposeHeader()
    {
        view()->composer('templates.' . \Config::get('webpanel.template') . 'webpanel.includes.header', function ($view) {
            $view->with('username', Auth::user()->name);
        });
    }
}
