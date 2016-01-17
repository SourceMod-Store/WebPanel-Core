<?php

namespace App\Http\Middleware;

use Closure;

class NotInstalled
{
    /**
     * Only allow Access if the application is NOT installed
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(file_exists("../INSTALLED"))
        {
            abort(403,'Application already installed');
            die();
        }

        return $next($request);
    }
}
