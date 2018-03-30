<?php

namespace App;

use App\Acme\Contract\CommonFunction;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model implements CommonFunction
{
    protected $fillable = ['ten_loai', 'slug'];

    public function sanPhams() {
        return $this->hasMany(SanPham::class);
    }

    public function thongSos() {
        return $this->belongsToMany(
            ThongSoKyThuat::class,
            'loai_s_p_thong_sos',
            'loai_sp_id',
            'thong_so_id');
    }

    public function thongSoIds() {
        return array_column($this->thongSos->toArray(), 'id');
    }

    public static function daTonTai($slug) {
        return !self::whereSlug($slug)->get()->isEmpty();
    }

    public function khongCoSanPham() {
        return $this->sanPhams->isEmpty();
    }

    public function deleteWithAllAssociate() {
        $this->thongSos()->detach();

        return $this->delete();
    }

    public function getName() {
        return $this->ten_loai;
    }

    public function matchedId($id) {
        return $id == $this->id;
    }
}
