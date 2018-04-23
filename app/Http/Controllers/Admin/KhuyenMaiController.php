<?php

namespace App\Http\Controllers\Admin;

use App\KhuyenMai;
use App\LoaiSanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KhuyenMaiController extends Controller
{
    public function index(){
        $sales = KhuyenMai::all();

        return view('admin.khuyen_mai.index.index', compact('sales'));
    }

    public function show($id) {
        $sale = KhuyenMai::findOrFail($id);
        $sale->load('products');
        $productTypes = LoaiSanPham::all();

        return view('admin.khuyen_mai.show.index', compact('sale', 'productTypes'));
    }

    public function store(Request $request) {
        $sale = KhuyenMai::createFrom($request->all());

        if ($sale)
            return back()->with('success', 'Thêm khuyến mãi thành công');

        return back()->with('errors', ['Thêm thất bại, hãy thử lại sau!']);
    }

    public function update(Request $request, $id) {
        $success = KhuyenMai::updateFrom($id, $request->all());

        if ($success)
            return back()->with('success', 'Cập nhật khuyến mãi thành công');

        return back()->with('errors', ['Thêm thất bại, hãy thử lại sau!']);
    }
}
