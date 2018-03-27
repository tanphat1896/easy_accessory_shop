<?php

namespace App\Http\Controllers\Admin;

use App\Helper\StringHelper;
use App\LoaiSanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoaiSanPhamController extends Controller
{
    public function index() {
        $loaiSanPhams = LoaiSanPham::all();

        return view('admin.loai_sp.index', compact('loaiSanPhams'));
    }

    public function store(Request $request) {
        $ten_loai = $request->get('ten-loai');
        $slug = StringHelper::toSlug($ten_loai);

        if (LoaiSanPham::daTonTai($slug))
            return back()->with('errors', ["$ten_loai đã tồn tại"]);

        $loaiSanPham = new LoaiSanPham();
        $loaiSanPham->ten_loai = $ten_loai;
        $loaiSanPham->slug = $slug;

        $loaiSanPham->save();

        return back()->with('success', "Thêm $ten_loai thành công");
    }

    public function update(Request $request, $id) {
        $loaiSanPham = LoaiSanPham::findOrFail($id);

        $loaiSanPham->ten_loai = $request->get('ten-loai');
        $loaiSanPham->slug = StringHelper::toSlug($loaiSanPham->ten_loai);

        $loaiSanPham->update();

        return back()->with('success', 'Cập nhật thành công');
    }

    public function destroy(Request $request) {
        $ids = $request->get('loai-sp-id');

        if (empty($ids))
            return back();

        $errors = $this->canDelete($ids);

        if (!empty($errors))
            return back()->with('errors', $errors);

        LoaiSanPham::destroy($ids);

        return back()->with('success', 'Xóa thành công');
    }

    private function canDelete($ids) {
        $errors = [];

        foreach ($ids as $id) {
            $loaiSanPham = LoaiSanPham::findOrFail($id);

            if ($loaiSanPham->khongCoSanPham())
                continue;

            $errors[] = "Loại sản phẩm " . $loaiSanPham->ten_loai . " còn sản phẩm";
        }

        return $errors;
    }
}
