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

    public function create() {
        $thuongHieus = ThuongHieu::all();

        $loaiSanPhams = LoaiSanPham::all();

        return view('admin.san_pham.create.index', compact('sanPham', 'thuongHieus', 'loaiSanPhams'));
    }

    public function store(Request $request) {
        $id = $this->sanPhamRepository->themSanPham(
            $request->all(),
            $request->file('anh-dai-dien'),
            $request->file('anh-chi-tiet'));

        if (empty($id))
            return back()->with('errors', ['Thêm thất bại, hãy thử lại sau']);

        return redirect()->route('san_pham.show', [$id]);
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

    public function destroy($id) {
        $sanPham = SanPham::findOrFail($id);

        $sanPham->tinh_trang = 0;
        $sanPham->update();

        return response()->json(['success' => true]);
    }

    public function resume($id) {
        $sanPham = SanPham::findOrFail($id);

        $sanPham->tinh_trang = 1;
        $sanPham->update();

        return response()->json(['success' => true]);
    }

    public function search($query) {
        $products = $this->sanPhamRepository->search($query);

        return $products;
    }
}
