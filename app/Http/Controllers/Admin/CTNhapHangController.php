<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CTNhapHangController extends Controller
{
    public function update(Request $request, $id)
    {
        $chiTietPhieuNhap = PhieuNhap::findOrFail($id);
        $chiTietPhieuNhap->san_pham_id = $request->get('ten-san-pham');
        $chiTietPhieuNhap->so_luong = $request->get('so-luong');
        $chiTietPhieuNhap->don_gia = $request->get('don-gia');
        $chiTietPhieuNhap->update();

        return back()->with('success', 'Cập nhật thành công');
    }

    public function destroy(Request $request)
    {
        $ids = $request->get('phieu-nhap-id');
        PhieuNhap::destroy($ids);

        return back()->with('success', 'Xóa thành công');
    }
}
