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
        $data = $this->sanPhamRepository->getSanPham($request);

        return view('admin.san_pham.index', $data);
    }

}
