<?php

namespace App\Http\Controllers\Admin;

use App\KhuyenMai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChiTietKMController extends Controller
{
    public function store(Request $request) {
        $saleId = (int)$request->get('sale-id');

        $sale = KhuyenMai::findOrFail($saleId);

        $productIds = $request->get('product-id');

        $sale->products()->attach($productIds);

        return back()->with('success', 'Thêm sản phẩm thành công');
    }
}
