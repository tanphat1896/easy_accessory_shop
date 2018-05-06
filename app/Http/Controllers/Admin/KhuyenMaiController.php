<?php

namespace App\Http\Controllers\Admin;

use App\KhuyenMai;
use App\LoaiSanPham;
use App\Model\ChiTietKhuyenMai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KhuyenMaiController extends Controller
{
    public function index(){
        $sales = KhuyenMai::where('parent_id', null)
            ->orderBy('ngay_ket_thuc', 'desc')->paginate(10);

        return view('admin.khuyen_mai.parent_sale.index', compact('sales'));
    }

    public function show($id) {
        $sale = KhuyenMai::findOrFail($id);

        if (empty($sale->parent_id))
            return $this->indexChild($sale);

        $products = $sale->products()->paginate(10);

        $productTypes = LoaiSanPham::all();

        return view('admin.khuyen_mai.show.index', compact('sale', 'productTypes', 'products'));
    }

    private function indexChild($parentSale) {
        return view('admin.khuyen_mai.child_sale.index', compact('parentSale'));
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

    public function destroy(Request $request) {
        KhuyenMai::destroy($request->get('khuyen-mai-id'));

        if ($request->has('sale-id'))
            $this->destroySaleDetail($request);

        return back()->with('success', 'Xóa thành công');
    }

    private function destroySaleDetail(Request $request) {
        $sale = KhuyenMai::findOrFail($request->get('sale-id'));

        $productIds = $request->get('product-id') ?: [];

        $sale->products()->detach($productIds);
    }
}
