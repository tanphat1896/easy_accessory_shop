<?php

namespace App\Http\Controllers\Admin;

use App\PhieuNhap;
use App\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ChiTietPhieuNhap;

class CTNHController extends Controller
{
    public function update(Request $request, $id)
    {
        $soLuongThayDoi = $request->get('so-luong') - ChiTietPhieuNhap::find($id)->so_luong;

        $chiTietPhieuNhap = ChiTietPhieuNhap::findOrFail($id);
        $chiTietPhieuNhap->san_pham_id = $request->get('ten-san-pham');
        $chiTietPhieuNhap->so_luong = $request->get('so-luong');
        $chiTietPhieuNhap->so_luong_cap_nhat = $soLuongThayDoi;
        $chiTietPhieuNhap->don_gia = $request->get('don-gia');
        $chiTietPhieuNhap->update();


        $phieuNhap = \App\PhieuNhap::findOrFail($chiTietPhieuNhap->phieu_nhap_id);
        $phieuNhap->da_cap_nhat = false;
        $phieuNhap->update();

        return back()->with('success', 'Cập nhật thành công');
    }

    public function destroy(Request $request)
    {
        $ids = $request->get('chi-tiet-phieu-nhap-id');
        $chiTietPhieuNhaps = ChiTietPhieuNhap::find($ids);
        foreach ($chiTietPhieuNhaps as $key => $chiTietPhieuNhap) {
            $chiTietPhieuNhap->so_luong_cap_nhat -= $chiTietPhieuNhap->so_luong;
            $chiTietPhieuNhap->da_xoa = true;
            $chiTietPhieuNhap->update();
        }
//        ChiTietPhieuNhap::destroy($ids);

        $phieuNhap = \App\PhieuNhap::findOrFail($request->get('phieu-nhap-id'));
        $phieuNhap->da_cap_nhat = false;
        $phieuNhap->so_san_pham -= sizeof($ids);
        $phieuNhap->update();

        return back()->with('success', 'Xóa thành công');
    }

    public function store(Request $request)
    {
        $chiTietPhieuNhap = new ChiTietPhieuNhap();
        $chiTietPhieuNhap->phieu_nhap_id = $request->get('phieu-nhap-id');
        $chiTietPhieuNhap->san_pham_id = $request->get('ten-san-pham');
        $chiTietPhieuNhap->so_luong = $request->get('so-luong');
        $chiTietPhieuNhap->so_luong_cap_nhat = $request->get('so-luong');
        $chiTietPhieuNhap->don_gia = $request->get('don-gia');
        $chiTietPhieuNhap->save();


        $phieuNhap = \App\PhieuNhap::findOrFail($request->get('phieu-nhap-id'));
        $phieuNhap->da_cap_nhat = false;
        $phieuNhap->so_san_pham++;
        $phieuNhap->update();

        return back()->with('success', 'Thêm một sản phẩm mới thành công');
    }

    public function productUpdate($id) {
        $chiTietPhieuNhaps = ChiTietPhieuNhap::where('phieu_nhap_id', $id)->get();
        $ids = array();
        foreach ($chiTietPhieuNhaps as $key => $chiTietPhieuNhap) {
            $sanPham = SanPham::findOrFail($chiTietPhieuNhap->san_pham_id);
            $sanPham->so_luong += $chiTietPhieuNhap->so_luong_cap_nhat;
            if ($sanPham->so_luong < 0) {
                $sanPham->so_luong = 0;
            }
            $sanPham->update();
            if ($chiTietPhieuNhap->da_xoa) {
                $ids[] = $chiTietPhieuNhap->id;
            }
            else {
                $chiTietPhieuNhap->so_luong_cap_nhat = 0;
                $chiTietPhieuNhap->update();
            }
        }
        ChiTietPhieuNhap::destroy($ids);
        $phieuNhap = \App\PhieuNhap::findOrFail($id);
        $phieuNhap->da_cap_nhat = true;
        $phieuNhap->update();
        return back()->with('success', 'Cập nhật số lượng sản phẩm trong kho thành công');
    }
}
