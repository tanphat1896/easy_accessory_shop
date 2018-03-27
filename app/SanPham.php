<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    public function gia() {
        return $this->hasMany(GiaSanPham::class)->orderBy('ngay_cap_nhat', 'desc');
    }

    public function loaiSanPham() {
        return $this->belongsTo(LoaiSanPham::class);
    }

    public function thuongHieu() {
        return $this->belongsTo(ThuongHieu::class);
    }
}
