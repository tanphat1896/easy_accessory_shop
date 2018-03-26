<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    public function phieuNhaps() {
        return $this->hasMany(PhieuNhap::class);
    }
    public function khongCoPhieuNhap() {
        return $this->phieuNhaps->isEmpty();
    }
}
