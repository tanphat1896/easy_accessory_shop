<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{

    public function products() {
        return $this->belongsToMany(
            SanPham::class,
            'chi_tiet_khuyen_mais',
            'khuyen_mai_id',
            'san_pham_id');
    }

    public static function createFrom(array $data) {
        $sale = new self;

        $sale->gia_tri_km = (float)$data['gia-tri']/100;
        $sale->ngay_bat_dau = $data['ngay-bat-dau'];
        $sale->ngay_ket_thuc = $data['ngay-ket-thuc'];

        return $sale->save();
    }

    public function start() {
        return Carbon::parse($this->ngay_bat_dau)->format('d-m-Y');
    }

    public function end() {
        return Carbon::parse($this->ngay_ket_thuc)->format('d-m-Y');
    }

    public function percent() {
        return $this->gia_tri_km * 100;
    }
}
