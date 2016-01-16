<?php namespace App\Http\Middleware;

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

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authorize
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Checks if the user is authorized to access this resource
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if permissions should be ignored
        if (config('webpanel.ignore_permissions')) {
            return $next($request);
        }

        //Get the name of the route and the permission required for the route
        $routeName = $request->route()->getName();
        $routePermission = config('route_perms.' . $routeName);

        //Check if the permissions is set
        if ($routePermission == "" || $routePermission == NULL) {
            return $next($request);
        }

        //If the permission is set, check if the user has got the permission
        if (!$this->auth->user()->can($routePermission)) {
            return redirect()->route('webpanel.dashboard')->withErrors(['You do not have the permission ' . $routePermission . ' that is required to perform this action']);
        }

        return $next($request);
    }

}
