<?php

namespace App;

use App\Acme\Contract\CommonFunction;
use App\Acme\Behavior\CommonBehavior;
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
        return (int)$this->tinh_trang === 1 ? 'Đang bán': 'Ngừng bán';
    }

    public function getName() {
        return $this->ten_san_pham;
    }

    public function matchedId($id) {
        return $id == $this->id;
    }

    public function chiTietPhieuNhaps() {
        return $this->belongsToMany(ChiTietPhieuNhap::class);
    }
}
