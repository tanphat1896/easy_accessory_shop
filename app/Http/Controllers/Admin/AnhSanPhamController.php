<?php

namespace App\Http\Controllers\Admin;

use App\Acme\Repository\ProductRepository;
use App\Helper\ImageHelper;
use App\HinhAnh;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnhSanPhamController extends Controller
{
    private $sanPhamRepository;

    public function __construct(ProductRepository $sanPhamRepository) {
        $this->sanPhamRepository = $sanPhamRepository;
    }

    public function store(Request $request)
    {
        if (!$request->has('sanpham-id'))
            return response()->json(false);

        if (!$request->has('file'))
            return response()->json(false);

        $success = $this->sanPhamRepository->luuAnhChiTietSanPham(
            $request->file('file'),
            $request->get('sanpham-id')
        );

        return response()->json($success);
    }

    public function destroy(Request $request)
    {
        $ids = $request->get('hinh-anh-id');

        if (empty($ids))
            return back();


        $deleted = ImageHelper::deleteAnhChiTietFromStorage($ids);

        if (!$deleted)
            return back()->with('errors', ["Hãy thử lại sau"]);

        HinhAnh::destroy($ids);

        return back()->with('success', 'Xóa thành công');
    }
}
