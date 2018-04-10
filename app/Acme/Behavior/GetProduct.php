<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/5/18
 * Time: 9:50 AM
 */

namespace App\Acme\Behavior;


use App\LoaiSanPham;
use App\SanPham;
use Illuminate\Support\Facades\DB;

trait GetProduct {
    private $table = 'san_phams';

    public function getProducts($productTypeId, $perPage) {
        $products = DB::table($this->table)
            ->where('loai_san_pham_id', '=', $productTypeId)
            ->join('gia_san_phams', "{$this->table}.id", '=', 'gia_san_phams.san_pham_id')
            ->orderBy('gia_san_phams.id', 'desc');
        return $products->paginate($perPage);
    }

    public function getProduct($slug) {
        $product = SanPham::whereSlug($slug)->firstOrFail();

        return $product;
    }
}