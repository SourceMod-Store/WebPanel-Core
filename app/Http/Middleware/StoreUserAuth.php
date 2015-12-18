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
use App\Models\StoreUser;

class StoreUserAuth
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
     * The user can have the set store_user_id session variable set
     * OR
     * be an admin with the proper permissions
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

        $store_user_id = $request->session()->get('store_user_id','not-set');

        //Check if the store_user_id session variable is set
        if($store_user_id != "not-set") //Session var set --> Authorized
        {
            $user = StoreUser::find($store_user_id);
            //Check if the store_user_id is valid
            if($user == null)
            {
                return redirect()->route('userpanel.auth.index')->withErrors(['You need to login to be able to use this application']);
            }

            return $next($request);
        }

        //TODO: Implement a way for a admin to impersonate a store user
//        //Check if the user is logged into the webpanel
//        if ($this->auth->check()) {
//            //Get the name of the route and the permission required for the route
//            $routeName = $request->route()->getName();
//            $routePermission = config('route_perms.' . $routeName);
//
//            //Check if the permissions is set
//            //if ($routePermission == "" || $routePermission == NULL) {
//            //    return $next($request);
//            //}
//
//            //If the permission is set, check if the user has got the permission
//            if (!$this->auth->user()->can($routePermission)) {
//                //TODO: Change the URL
//                return redirect()->route('userpanel.auth.index')->withErrors(['You do not have the permission that is required to perform this action']);
//            }
//        }

        return redirect()->route('userpanel.auth.index')->withErrors(['You need to login to be able to use this application']);
    }
}
