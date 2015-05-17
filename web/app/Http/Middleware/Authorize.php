<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authorize {

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

	/**
	 * Checks if the user is authorized to access this resource
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        //
        if(config('webpanel.ignore_permissions'))
        {
            return $next($request);
        }

        $routeName = $request->route()->getName();
        $routePermission = config('route_perms.' . $routeName);

        if($routePermission == "" || $routePermission == NULL)
        {
            return $next($request);
        }

        if(!$this->auth->user()->can($routePermission))
        {
            return redirect()->route('webpanel.dashboard')->withErrors(['You do not have the permission '.$routePermission.' that is required to perform this action']);
        }

		return $next($request);
	}

}
