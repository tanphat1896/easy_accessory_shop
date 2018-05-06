<?php

namespace App\Http\Middleware;

use Closure;
use App\Helper\AuthHelper;
use App\NhanVien;

class ThuongHieuAu
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
        if (NhanVien::find(AuthHelper::adminId())->checkQuyen(2))
        {
            return $next($request);
        }
        else
        {
            return redirect('/admin/error');
        }
    }
}
