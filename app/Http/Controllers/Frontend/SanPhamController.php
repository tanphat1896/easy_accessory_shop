<?php

namespace App\Http\Controllers\Frontend;

use App\LoaiSanPham;
use App\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SanPhamController extends Controller
{
    public function showSsd() {
        $productType = LoaiSanPham::whereSlug('ssd-mlc')->firstOrFail();
        $products = $productType->sanPhams;

        return view('frontend.product_category.index', compact('products'));
    }

    public function show($slug) {
        $product = SanPham::whereSlug($slug)->firstOrFail();

        return view('frontend.product_viewer.index', compact('product'));
    }
}
