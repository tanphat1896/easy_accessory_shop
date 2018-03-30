<?php

namespace App\Http\Controllers\Admin;

use App\GiaSanPham;
use App\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GiaSanPhamController extends Controller
{
    public function store(Request $request, $sanPhamId) {
        SanPham::findOrFail($sanPhamId);

        $gia = GiaSanPham::fromCurrency($request->get('gia'));
        $gia->san_pham_id = $sanPhamId;

        $gia->save();

        return back()->with('success', 'Cập nhật giá mới thành công');
    }
}
