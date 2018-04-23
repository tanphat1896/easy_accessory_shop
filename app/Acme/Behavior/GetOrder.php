<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 09/04/2018
 * Time: 17:31
 */

namespace App\Acme\Behavior;


use App\DonHang;
use Illuminate\Support\Facades\DB;

trait GetOrder {
    public function getOrders($customerId) {
        $orders = DonHang::where('customer_id', $customerId)
            ->orderBy('ngay_dat_hang', 'desc')->get();

        return $orders;
    }

    public function getOrder($orderCode) {
        return DonHang::where('ma_don_hang', $orderCode)->firstOrFail();
    }

    public function getOrderDetail($orderId) {
        return DB::table('chi_tiet_don_hangs')
            ->select(['chi_tiet_don_hangs.*', 'ten_san_pham', 'anh_dai_dien'])
            ->where('don_hang_id', $orderId)
            ->join('san_phams', 'san_phams.id', '=', 'chi_tiet_don_hangs.san_pham_id')
            ->get();
    }
}