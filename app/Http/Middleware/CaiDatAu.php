<?php

namespace App\Http\Middleware;

use App\Helper\AuthHelper;
use App\NhanVien;
use Closure;

class CaiDatAu
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
        if (NhanVien::find(AuthHelper::adminId())->isAdmin())
        {
            return $next($request);
        }
        else
        {
            return redirect('/admin/error');
        }
    }
}
