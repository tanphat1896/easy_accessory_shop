<?php

namespace App;

use App\Acme\Contract\CommonGetter;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model implements CommonGetter
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

    public function getName() {
        return $this->ten_loai;
    }
}
