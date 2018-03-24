<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThuongHieu extends Model
{
    protected $fillable = ['ten_thuong_hieu', 'logo'];

    public $timestamps = [];

    public function sanPhams() {
        return $this->hasMany(SanPham::class);
    }

    public function khongCoSanPham() {
        return $this->sanPhams->isEmpty();
    }
}
