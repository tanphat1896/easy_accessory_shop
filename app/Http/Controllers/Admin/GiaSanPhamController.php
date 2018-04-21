<?php

namespace App\Http\Controllers\Admin;

use App\GiaSanPham;
use App\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GiaSanPhamController extends Controller
{
    public function store(Request $request, $sanPhamId) {
        SanPham::findOrFail($sanPhamId);

        $this->inactivateAllPrice($sanPhamId);

        $gia = GiaSanPham::fromCurrency($request->get('gia'));
        $gia->san_pham_id = $sanPhamId;

        $gia->save();

        return back()->with('success', 'Cập nhật giá mới thành công');
    }

    private function inactivateAllPrice($sanPhamId) {
        DB::table('gia_san_phams')
            ->where('san_pham_id', $sanPhamId)
            ->update(['active' => false]);
    }
}
