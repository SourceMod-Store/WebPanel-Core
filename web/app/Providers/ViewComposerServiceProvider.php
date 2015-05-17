<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\StoreUser;
use App\StoreItem;
use App\StoreCategory;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->ComposeSidebar();
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

    public function ComposeSidebar()
    {
        view()->composer('templates.' . \Config::get('webpanel.template') . 'webpanel.includes.sidebar', function ($view) {
            $view->with('itemCount', StoreItem::all()->count());
            $view->with('categoryCount', StoreCategory::all()->count());
            $view->with('userCount', StoreUser::all()->count());
        });
    }

}
