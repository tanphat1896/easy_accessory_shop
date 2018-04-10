<?php

namespace App\Http\Controllers\Frontend;

use App\Acme\Behavior\GetProduct;
use App\DanhGia;
use App\Helper\AuthHelper;
use App\LoaiSanPham;
use App\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SanPhamController extends Controller
{
    use GetProduct;

    public function showGroup($slug) {
        $productType = LoaiSanPham::whereSlug($slug)->firstOrFail();

        $products = $this->getProducts($productType->id, 12);

        return view('frontend.product_category.index', compact('products', 'productType'));
    }

    public function show($slug) {
        $product = $this->getProduct($slug);

        $myStar = DanhGia::where([
            ['customer_id', AuthHelper::userId()],
            ['san_pham_id', $product->id]
        ])->first();

        return view('frontend.product_viewer.index', compact('product', 'myStar'));
    }
}
