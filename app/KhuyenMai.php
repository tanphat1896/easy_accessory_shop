<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    public function children() {
        return $this->hasMany(KhuyenMai::class, 'parent_id', 'id');
    }

    public function products() {
        return $this->belongsToMany(
            SanPham::class,
            'chi_tiet_khuyen_mais',
            'khuyen_mai_id',
            'san_pham_id');
    }

    public static function createFrom(array $data) {
        $sale = new self;

        $sale = $sale->assignData($data);

        return $sale->save();
    }

    public static function updateFrom($id, array $data) {
        $sale = KhuyenMai::findOrFail($id);

        $sale = $sale->assignData($data);

        $sale->children()->update([
            'ngay_bat_dau' => $sale->ngay_bat_dau,
            'ngay_ket_thuc' => $sale->ngay_ket_thuc
        ]);

        return $sale->update();
    }

    private function assignData(array $data) {
        $this->ten_km = empty($data['name']) ? '': $data['name'];
        $this->gia_tri_km = empty($data['gia-tri']) ? 0: (int)$data['gia-tri'];
        $this->parent_id = empty($data['parent_id']) ? null : (int)$data['parent_id'];
        $this->ngay_bat_dau = $data['ngay-bat-dau'];
        $this->ngay_ket_thuc = $data['ngay-ket-thuc'];

        return $this;
    }

    public function start() {
        return Carbon::parse($this->ngay_bat_dau)->format('d-m-Y');
    }

    public function end() {
        return Carbon::parse($this->ngay_ket_thuc)->format('d-m-Y');
    }

    public function percent() {
        return $this->gia_tri_km;
    }

    public function overdue() {
        return $this->ngay_ket_thuc <= date('Y-m-d');
    }
}
