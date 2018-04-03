<?php

namespace App;

use App\Acme\Contract\CommonFunction;
use App\Acme\Behavior\CommonBehavior;
use App\Helper\StringHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model implements CommonFunction
{
    use CommonBehavior;

    public static function taoMoiThongTin(array $data) {
        $sanPham = new self();

        $sanPham->ma_san_pham = $data['ma-san-pham'];
        $sanPham->ten_san_pham = $data['ten-san-pham'];
        $sanPham->thuong_hieu_id = $data['thuong-hieu'];
        $sanPham->loai_san_pham_id = $data['loai-san-pham'];
        $sanPham->ngay_tao = date('Y-m-d H:i:s');
        $sanPham->ngay_cap_nhat = date('Y-m-d H:i:s');
        $sanPham->slug = StringHelper::toSlug($sanPham->ten_san_pham) . (SanPham::all()->count() + 1);

        return $sanPham;

    }

    public static function capNhatThongTin($id, array $data) {
        $sanPham = SanPham::findOrFail($id);

        $sanPham->ma_san_pham = $data['ma-san-pham'];
        $sanPham->ten_san_pham = $data['ten-san-pham'];
        $sanPham->loai_san_pham_id = $data['loai-san-pham'];
        $sanPham->thuong_hieu_id = $data['thuong-hieu'];
        $sanPham->tinh_trang = $data['tinh-trang']%2;
        $sanPham->ngay_cap_nhat = date('Y-m-d H:i:s');
        $sanPham->slug = StringHelper::toSlug($sanPham->ten_san_pham) . "-$id";

        return $sanPham;
    }

    public function giaMoiNhat() {
        return $this->gia()->first()->gia;
    }

    public function gia() {
        return $this->hasMany(GiaSanPham::class)->orderBy('ngay_cap_nhat', 'desc');
    }

    public function loaiSanPham() {
        return $this->belongsTo(LoaiSanPham::class);
    }

    public function thuongHieu() {
        return $this->belongsTo(ThuongHieu::class);
    }

    public function hinhAnhs() {
        return $this->hasMany(HinhAnh::class);
    }

    public function thongSos() {
        return $this->belongsToMany(
            ThongSoKyThuat::class,
            'san_pham_thong_sos',
            'san_pham_id',
            'thong_so_id'
        )->withPivot('gia_tri');
    }

    public function tinhTrang() {
        return (int)$this->tinh_trang === 1 ? 'Kinh doanh': 'Ngừng k.doanh';
    }

    public static function getFromSlug($slug) {
        return self::whereSlug($slug)->first();
    }

    public function getName() {
        return $this->ten_san_pham;
    }

    public function matchedId($id) {
        return $id == $this->id;
    }
}
