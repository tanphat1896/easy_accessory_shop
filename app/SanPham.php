<?php

namespace App;

use App\Acme\Contract\CommonFunction;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model implements CommonFunction
{
    public function giaMoiNhat() {
        return $this->gia()->first()->gia;
    }

    public function gia() {
        return $this->hasMany(GiaSanPham::class)->orderBy('ngay_cap_nhat', 'desc');
    }

    public function loaiSanPham() {
        return $this->belongsTo(LoaiSanPham::class);
    }

    public function thuongHieu() {
        return $this->belongsTo(ThuongHieu::class);
    }

    public function getName() {
        return $this->ten_san_pham;
    }

    public function matchedId($id) {
        return $id == $this->id;
    }
}
