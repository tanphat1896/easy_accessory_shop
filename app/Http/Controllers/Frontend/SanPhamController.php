<?php

namespace App\Http\Controllers\Frontend;

use App\LoaiSanPham;
use App\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SanPhamController extends Controller
{
    public function showGroup($slug) {
        $productType = LoaiSanPham::whereSlug($slug)->firstOrFail();
        $products = $productType->sanPhams()->with('sales')->paginate(12);
//        dd($products);
        $products->load('sales');

        return view('frontend.product_category.index', compact('products', 'productType'));
    }

    public function show($slug) {
        $product = SanPham::whereSlug($slug)->firstOrFail();

        return view('frontend.product_viewer.index', compact('product'));
    }
}
