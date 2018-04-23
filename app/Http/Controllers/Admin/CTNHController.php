<?php

namespace App\Http\Controllers\Admin;

use App\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ChiTietPhieuNhap;

class CTNHController extends Controller
{
    public function update(Request $request, $id)
    {
        $soLuongThayDoi = ChiTietPhieuNhap::find($id)->so_luong - $request->get('so-luong');

        $chiTietPhieuNhap = ChiTietPhieuNhap::findOrFail($id);
        $chiTietPhieuNhap->san_pham_id = $request->get('ten-san-pham');
        $chiTietPhieuNhap->so_luong = $request->get('so-luong');
        $chiTietPhieuNhap->don_gia = $request->get('don-gia');
        $chiTietPhieuNhap->update();

        $sanPham = SanPham::findOrFail($request->get('ten-san-pham'));
        $sanPham->so_luong -= $soLuongThayDoi;
        $sanPham->update();

        return back()->with('success', 'Cập nhật thành công');
    }

    public function destroy(Request $request)
    {
        $ids = $request->get('chi-tiet-phieu-nhap-id');
        ChiTietPhieuNhap::destroy($ids);

        return back()->with('success', 'Xóa thành công');
    }

    public function store(Request $request)
    {
        $chiTietPhieuNhap = new ChiTietPhieuNhap();
        $chiTietPhieuNhap->phieu_nhap_id = $request->get('phieu-nhap-id');
        $chiTietPhieuNhap->san_pham_id = $request->get('ten-san-pham');
        $chiTietPhieuNhap->so_luong = $request->get('so-luong');
        $chiTietPhieuNhap->don_gia = $request->get('don-gia');
        $chiTietPhieuNhap->save();
        $sanPham = SanPham::findOrFail($request->get('ten-san-pham'));
        $sanPham->so_luong += $request->get('so-luong');
        $sanPham->update();

        return back()->with('success', 'Thêm một sản phẩm mới thành công');
    }
}
