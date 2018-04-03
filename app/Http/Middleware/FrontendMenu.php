<?php

namespace App\Http\Middleware;

use App\Menu;
use Closure;

class FrontendMenu
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
        $menuItems = Menu::all();
        view()->share('menuItems', $menuItems);
        return $next($request);
    }
}
