<?php

namespace App\Http\Controllers\Admin;

use App\Acme\Repository\SanPhamRepository;
use App\LoaiSanPham;
use App\SanPham;
use App\ThuongHieu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SanPhamController extends Controller {
    private $sanPhamRepository;

    public function __construct(SanPhamRepository $sanPhamRepository) {
        $this->sanPhamRepository = $sanPhamRepository;
    }

    public function index(Request $request) {
        $data = $this->sanPhamRepository->getSanPhams($request);

        return view('admin.san_pham.index.index', $data);
    }

    public function  show($id) {
        $neededData = $this->sanPhamRepository->getSanPham($id);

        return view('admin.san_pham.show.index', $neededData);
    }

    public function  edit($id) {
        $neededData = $this->sanPhamRepository->getSanPham($id);

        return view('admin.san_pham.edit.index', $neededData);
    }

    public function update(Request $request, $id) {
        $anhDaiDien = $request->file('anh-dai-dien');
        $success = $this->sanPhamRepository->updateSanPham($id, $request->all(), $anhDaiDien);

        if (!$success)
            return back()->with('errors', ["Có lỗi, hãy thử lại sau"]);

        return back()->with('success', 'Cập nhật thành công');
    }
}
