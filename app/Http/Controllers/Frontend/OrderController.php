<?php

namespace App\Http\Controllers\Frontend;

use App\Acme\Behavior\GetOrder;
use App\DonHang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    use GetOrder;

    public function index() {

        return view('frontend.order.index');
    }

    public function show(Request $request) {
        $orderCode = $request->get('code') ?: '';

        $order = $this->getOrder($orderCode);

        $products = $this->getOrderDetail($order->id);

        return view('frontend.order.index', compact('order', 'products'));
    }
}
