<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuNhap extends Model
{
    //
    protected $table = 'phieu_nhaps';

    public function nhaCungCap() {
        return $this->belongsTo(NhaCungCap::class);
    }

    public function taiKhoan() {
        return $this->belongsTo(TaiKhoan::class);
    }
}
