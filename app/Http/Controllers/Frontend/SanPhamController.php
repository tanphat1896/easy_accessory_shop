<?php

namespace App\Http\Controllers\Frontend;

use App\Acme\Behavior\GetProduct;
use App\DanhGia;
use App\Helper\AuthHelper;
use App\LoaiSanPham;
use App\SanPham;
use Hamcrest\Thingy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SanPhamController extends Controller
{
    use GetProduct;

    private $special = [
        'sale' => 'saleProductsData',
        'new' => 'newProductsData'
    ];

    public function showGroup($slug, $filter = '') {
        $productType = LoaiSanPham::whereSlug($slug)->firstOrFail();

        $totalPerPage = 12;

        $products = empty($filter)
            ? $this->getProducts($productType->id, $totalPerPage)
            : $this->getProductsWithFilter($productType->id, $filter, $totalPerPage);

        return view('frontend.product_category.index', compact('products', 'productType'));
    }

    public function show($slug) {
        $product = $this->getProduct($slug);

        $myStar = DanhGia::where([
            ['customer_id', AuthHelper::userId()],
            ['san_pham_id', $product->id]
        ])->first();

        $relatedProducts = $this->getRelatedProducts($product);

        return view('frontend.product_viewer.index', compact('product', 'myStar', 'relatedProducts'));
    }

    public function showSpecial($type) {
        if (!in_array($type, array_keys($this->special)))
            return back();

        $method = $this->special[$type];
        $data = $this->{$method}();

        return view('frontend.special_products.index', $data);
    }

    private function saleProductsData() {
        $products = $this->getSaleProducts(null, 24);
        $name = 'Sản phẩm đang giảm giá';
        return compact('products', 'name');
    }

    private function newProductsData() {
        $products = $this->getNewProducts(null, 24);
        $name = 'Sản phẩm mới';
        return compact('products', 'name');
    }
}
