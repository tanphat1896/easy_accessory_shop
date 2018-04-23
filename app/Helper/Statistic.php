<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/19/18
 * Time: 10:03 PM
 */

namespace App\Helper;

use App\BinhLuan;
use App\DonHang;
use App\SanPham;
use App\ThuongHieu;

class Statistic {
    const reflectClass = [
        'product' => 'SanPham',
        'brand' => 'ThuongHieu',
        'comment' => 'BinhLuan',
        'ptype' => 'LoaiSanPham'
    ];

    public static function totalProduct() {
        return SanPham::all()->count();
    }

    public static function totalCommentNotApproved() {
        return BinhLuan::where([
            ['approved', 0],
            ['parent_id', null]
        ])->get()->count();
    }

    public static function totalOrder($type = null) {
        if (empty($type))
            return DonHang::all()->count();

        return self::totalOrderByType($type);
    }

    private static function totalOrderByType($type) {
        $types = [
            'check' => 1,
            'uncheck' => 0,
            'cancel' => -1
        ];

        return DonHang::where('tinh_trang', $types[$type])->get()->count();
    }
}