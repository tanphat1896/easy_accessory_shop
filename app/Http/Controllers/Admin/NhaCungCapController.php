<?php

namespace App\Http\Controllers\Admin;

use App\Helper\StringHelper;
use App\NhaCungCap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NhaCungCapController extends Controller
{
    public function index() {
        $nhaCungCaps = NhaCungCap::paginate(5);

        return view('admin.nha_cung_cap.index', compact('nhaCungCaps'));
    }

    public function store(Request $request) {
        $nhaCungCap = new NhaCungCap();
        $nhaCungCap->ten_ncc = $request->get('ten-ncc');
        $nhaCungCap->dia_chi = $request->get('dia-chi');
        $nhaCungCap->so_dien_thoai = $request->get('so-dien-thoai');

        $nhaCungCap->save();

        return back()->with('success', "Thêm $nhaCungCap->ten_ncc thành công");
    }

    public function update(Request $request, $id) {
        $nhaCungCap = NhaCungCap::findOrFail($id);

        $nhaCungCap->ten_ncc = $request->get('ten-ncc');
        $nhaCungCap->dia_chi = $request->get('dia-chi');
        $nhaCungCap->so_dien_thoai = $request->get('so-dien-thoai');

        $nhaCungCap->update();

        return back()->with('success', 'Cập nhật thành công');
    }

    public function destroy(Request $request) {
        $ids = $request->get('nha-cung-cap-id');

        if (empty($ids))
            return back();

        $errors = $this->canDelete($ids);

        if (!empty($errors))
            return back()->with('errors', $errors);

        NhaCungCap::destroy($ids);

        return back()->with('success', 'Xóa thành công');
    }

    private function canDelete($ids) {
        $errors = [];

        foreach ($ids as $id) {
            $nhaCungCap = NhaCungCap::findOrFail($id);

            if ($nhaCungCap->khongCoPhieuNhap())
                continue;

            $errors[] = "Vẫn còn phiếu nhập của nhà cung cấp " . $nhaCungCap->ten_ncc;
        }

        return $errors;
    }
}
