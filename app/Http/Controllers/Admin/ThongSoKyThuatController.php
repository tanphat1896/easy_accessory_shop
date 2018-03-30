<?php

namespace App\Http\Controllers\Admin;

use App\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThongSoKyThuatController extends Controller
{
    public function update(Request $request, $sanPhamId) {
        $sanPham = SanPham::findOrFail($sanPhamId);

        foreach ($request->except('_token') as $id => $value) {
            $sanPham->thongSos()->updateExistingPivot($id, ['gia_tri' => $request->get($id)]);
        }

        return back()->with('success', 'Cập nhật thành công');
    }
}
