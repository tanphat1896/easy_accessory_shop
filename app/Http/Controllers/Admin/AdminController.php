<?php

namespace App\Http\Controllers\Admin;
use App\Acme\Behavior\AccountStatistic;
use App\Acme\Behavior\Statistic;
use App\ThuongHieu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{
    use Statistic;
    use AccountStatistic;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brandingProducts = $this->getProductAmountByBranding();
        $ptypeProducts = $this->getProductAmountByType();
        $orders = $this->getOrdersStatus();
        return view('admin', compact('brandingProducts', 'ptypeProducts', 'orders', 'revenues'));
    }
}