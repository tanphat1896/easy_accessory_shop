<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    protected $table = 'nha_cung_caps';
    public function phieuNhaps() {
        return $this->hasMany(PhieuNhap::class);
    }
    public function khongCoPhieuNhap() {
        return $this->phieuNhaps->isEmpty();
    }

    public function matchedID($id) {
        return $id == $this->id;
    }
}
