<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $fillable = [
        'ma_don_hang',
        'ten_nguoi_nhan',
        'email_nguoi_nhan',
        'sdt_nguoi_nhan',
        'tong_tien',
        'ghi_chu',
        'tinh_trang',
        'ngay_dat_hang',
        'hinh_thuc_thanh_toan',
    ];

    public function products() {
        return $this->belongsToMany(
            SanPham::class,
            'chi_tiet_don_hangs')->withPivot('so_luong');
    }
}
