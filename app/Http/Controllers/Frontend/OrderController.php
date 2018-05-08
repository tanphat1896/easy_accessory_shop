<?php

namespace App\Http\Controllers\Frontend;

use App\Acme\Behavior\GetOrder;
use App\ChiTietDonHang;
use App\DonHang;
use App\SanPham;
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

    public function huyDon($id)
    {
        $donHang = DonHang::findOrFail($id);

        $chiTietDonHangs = ChiTietDonHang::where('don_hang_id', $id)->get();
        foreach ($chiTietDonHangs as $key => $chiTietDonHang) {
            $sanPham = SanPham::findOrFail($chiTietDonHang->san_pham_id);
            $sanPham->so_luong += $chiTietDonHang->so_luong;
            $sanPham->update();
        }

        $donHang->tinh_trang = 3;
        $donHang->update();
        return back()->with('success', 'Hủy đơn hàng thành công');
    }
}
