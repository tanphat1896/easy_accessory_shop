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

    public function admin() {
        return $this->belongsTo(Admin::class);
    }

    public function chiTietPhieuNhaps()
    {
        return $this->hasMany(
            ChiTietPhieuNhap::class,
            'phieu_nhap_id',
            'id');
    }

    public function isEmpty()
    {
        return ($this->so_san_pham == 0);
    }
}
