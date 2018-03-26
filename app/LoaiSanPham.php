<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    protected $fillable = ['ten_loai', 'slug'];

    public function sanPhams() {
        return $this->hasMany(SanPham::class);
    }

    public static function daTonTai($slug) {
        return !self::whereSlug($slug)->get()->isEmpty();
    }

    public function khongCoSanPham() {
        return $this->sanPhams->isEmpty();
    }
}
