<?php

namespace App\Http\Controllers\Admin;

use App\Acme\Behavior\AccountStatistic;
use App\Acme\Behavior\GetProduct;
use App\Acme\Behavior\OrderStatistic;
use App\Acme\Behavior\ProductStatistic;
use App\Helper\AuthHelper;
use App\Helper\Statistic;
use App\NhanVien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    use GetProduct;
    use AccountStatistic;
    use OrderStatistic;
    use ProductStatistic;
    public function account() {
        return view('admin.dashboard.account.index');
    }

    public function order() {
        return view('admin.dashboard.order.index');
    }

    public function product(Request $request) {
        $data = $this->getProductAmountByStatus();
        $data['productTypes'] = $this->getProductAmountByType();
        $data['hotProducts'] = $this->getHotOrUnsoldProducts($request);
        $data['stopProducts'] = $this->getStopBusinessProducts();
        $data['outProducts'] = $this->getOutOfStockProducts();
        return view('admin.dashboard.product.index', $data);
    }
}
