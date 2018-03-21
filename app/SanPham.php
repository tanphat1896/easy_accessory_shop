<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    public function gia() {
        return $this->hasMany(GiaSanPham::class);
    }
}
