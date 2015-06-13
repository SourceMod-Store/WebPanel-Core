<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
        $this->app->bind('Illuminate\Routing\ResourceRegistrar', 'App\ResourceRegistrar');

		parent::boot($router);

		$router->model('items','App\Models\StoreItem');
        $router->model('categories','App\Models\StoreCategory');
        $router->model('store_user','App\Models\StoreUser');
        $router->model('servers','App\Models\StoreServer');
        $router->model('versions','App\Models\StoreVersion');
        $router->model('roles','App\Role');
        $router->model('permissions','App\Permission');
        $router->model('panel_user','App\User');

	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
