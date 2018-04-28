<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    public function products() {
        return $this->belongsToMany(
            SanPham::class,
            'chi_tiet_gio_hangs')->withPivot('so_luong');
    }

    public function block() {
        $this->blocked = true;
        $this->save();
    }

    public function blocked() {
        return $this->blocked > 0;
    }
}
