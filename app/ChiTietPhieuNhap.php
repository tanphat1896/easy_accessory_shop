<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuNhap extends Model
{
    //
    protected $table='chi_tiet_phieu_nhaps';

    public function phieuNhaps() {
        return $this->belongsTo(PhieuNhap::class);
    }

    public function sanPham() {
        return $this->belongsTo(SanPham::class);
//        return $this->belongsToMany(SanPham::class,'sanPhams_phieuNhaps',
//            'phieu_nhap_id','san_pham_id');
    }
}
