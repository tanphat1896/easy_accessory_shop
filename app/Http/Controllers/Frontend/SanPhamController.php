<?php

namespace App\Http\Controllers\Frontend;

use App\Acme\Behavior\GetProduct;
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
        $product = SanPham::whereSlug($slug)->firstOrFail();

        return view('frontend.product_viewer.index', compact('product'));
    }
}
