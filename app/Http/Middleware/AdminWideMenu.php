<?php

namespace App\Http\Middleware;

use Closure;

class AdminWideMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $wideMenu = \App\CuaHang::useWideMenu();
        view()->share('wideMenu', $wideMenu);

        return $next($request);
    }
}
