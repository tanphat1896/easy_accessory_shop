<?php

namespace App\Http\Controllers\Admin;

use App\Acme\Behavior\AccountStatistic;
use App\Acme\Behavior\OrderStatistic;
use App\Helper\AuthHelper;
use App\Helper\Statistic;
use App\NhanVien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    use AccountStatistic;
    use OrderStatistic;
    public function account() {

        return view('admin.dashboard.account.index');
    }

    public function order() {
        return view('admin.dashboard.order.index');
    }
}
