<?php

namespace App;

use App\Acme\Contract\CommonFunction;
use App\Acme\Behavior\CommonBehavior;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model implements CommonFunction
{
    use CommonBehavior;

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

    public function hinhAnhs() {
        return $this->hasMany(HinhAnh::class);
    }

    public function tinhTrang() {
        return $this->tinh_trang === 1 ? 'Đang bán': 'Ngừng bán';
    }

    public function getName() {
        return $this->ten_san_pham;
    }

    public function matchedId($id) {
        return $id == $this->id;
    }
}
