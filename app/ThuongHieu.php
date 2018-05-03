<?php

namespace App;

use App\Acme\Contract\CommonFunction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ThuongHieu extends Model implements CommonFunction
{
    protected $fillable = ['ten_thuong_hieu', 'slug'];

    public $timestamps = [];

    public function sanPhams() {
        return $this->hasMany(SanPham::class);
    }

    public function khongCoSanPham() {
        return $this->sanPhams->isEmpty();
    }

    public static function daTonTai($slug) {
        return !self::whereSlug($slug)->get()->isEmpty();
    }

    public function getName() {
        return $this->ten_thuong_hieu;
    }

    public function matchedId($id) {
        return $id == $this->id;
    }

    public static function getByProductType($slug) {
        $brands = DB::table('san_phams as s')
            ->join('loai_san_phams as l', 'l.id', '=', 's.loai_san_pham_id')
            ->join('thuong_hieus as t', 't.id', '=', 's.thuong_hieu_id')
            ->select(DB::raw("distinct t.ten_thuong_hieu, t.slug"))
            ->where('l.slug', $slug);

        return $brands->get();
    }
}
