<?php

namespace App\Http\Middleware;

use App\Helper\AuthHelper;
use Closure;

class AuthCustomerMiddleware
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
        if (! AuthHelper::userLogged())
            return redirect('/')->with('message', 'Bạn chưa đăng nhập!');

        return $next($request);
    }
}
