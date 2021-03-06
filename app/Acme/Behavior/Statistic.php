<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/19/18
 * Time: 9:14 PM
 */

namespace App\Acme\Behavior;


use App\DonHang;
use Illuminate\Support\Facades\DB;

trait Statistic {
    public function getProductAmountByBranding() {
        $brandingProducts = DB::table('thuong_hieus')
            ->join('san_phams', 'thuong_hieus.id', '=', 'san_phams.thuong_hieu_id')
            ->select(['thuong_hieus.id', 'thuong_hieus.ten_thuong_hieu', DB::raw('count(*) as total')])
            ->groupBy('thuong_hieus.id')->get();

        return $brandingProducts;
    }

    public function getProductAmountByType() {
        $ptypeProducts = DB::table('loai_san_phams')
            ->join('san_phams', 'loai_san_phams.id', '=', 'san_phams.loai_san_pham_id')
            ->select(['loai_san_phams.id', 'loai_san_phams.ten_loai', DB::raw('count(*) as total')])
            ->groupBy('loai_san_phams.id')->get();

        return $ptypeProducts;
    }

    public function getOrdersStatus() {
        $status = [
            1 => 'Đã duyệt',
            0 => 'Chưa duyệt',
            2 => 'Đã giao hàng',
            3 => 'Đã hủy'
        ];
        $orders = DB::table('don_hangs')
            ->selectRaw("tinh_trang as label, count(*) as total")
            ->groupBy('tinh_trang')->get();
        foreach ($orders as &$order) {
            $order->label = $status[$order->label];
        }

        return $orders;
    }
}