<?php

namespace App\Http\Controllers\Admin;

use App\Acme\Behavior\AccountStatistic;
use App\Helper\AuthHelper;
use App\Helper\Statistic;
use App\NhanVien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    use AccountStatistic;
    public function account() {

        return view('admin.dashboard.account.index');
    }
}
