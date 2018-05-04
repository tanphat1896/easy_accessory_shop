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

    public function soLuongSanPham()
    {
        return SanPham::find($this->san_pham_id)->so_luong;
    }

    public function tenSanPham()
    {
        return SanPham::find($this->san_pham_id)->ten_san_pham;
    }

    public function isDelete()
    {
        return ($this->da_xoa);
    }
}
