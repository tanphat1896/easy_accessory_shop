<?php

namespace App\Http\Controllers\Frontend;

use App\Acme\Behavior\ProcessOrder;
use App\DonHang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    use ProcessOrder;

    public function index() {
        $products = session('cart');
        $totalCost = 0;
        $totalAmount = 0;
        foreach ($products as $product) {
            $totalCost += $product['cost'];
            $totalAmount += $product['amount'];
        }
        return view('frontend.cart.checkout', compact('totalCost', 'products', 'totalAmount'));
    }

    public function store(Request $request) {
        $data = $this->neededData($request);

        $orderCode = $this->saveOrder($data);

        $this->cleanCart();

        return redirect()->route('checkout.result')->with('orderCode', $orderCode);
    }

    private function neededData(Request $request) {
        $cartProducts = $this->cartProducts();
        $orderDate = date('Y-m-d H:i:s');
        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $totalCost = $request->get('total-cost');
        $typeCheckout = $request->get('type-checkout');

        return [
            'ten_nguoi_nhan' => $name,
            'email_nguoi_nhan' => $email,
            'sdt_nguoi_nhan' => $phone,
            'tong_tien' => $totalCost,
            'ghi_chu' => '',
            'tinh_trang' => 0,
            'ngay_dat_hang' => $orderDate,
            'hinh_thuc_thanh_toan' => $typeCheckout,
            'products' => $cartProducts
        ];
    }

    private function cartProducts() {
        $cart = session('cart') ?: [];
        $products = [];

        foreach ($cart as $bunch){
            $productId = $bunch['product']->id;

            $products[$productId] = [
                'so_luong' => $bunch['amount'],
                'don_gia' => 1
            ];
        }

        return $products;
    }

    private function cleanCart() {
        session(['cart' => []]);
    }
}
