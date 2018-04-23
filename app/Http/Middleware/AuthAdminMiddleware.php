<?php

namespace App\Http\Middleware;

use App\Helper\AuthHelper;
use Closure;

class AuthAdminMiddleware
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
        if (! AuthHelper::adminLogged())
            return redirect()->route('admin.login');

        return $next($request);
    }
}
