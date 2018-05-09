<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/5/18
 * Time: 9:50 AM
 */

namespace App\Acme\Behavior;


use App\DonHang;
use App\Helper\PagingHelper;
use App\LoaiSanPham;
use App\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait getOrderFilter {
    public function getOrdersWithFilter($productTypeId, $criteria, $needPaging = false) {
        $products = DB::table($this->table)
            ->join('gia_san_phams', "{$this->table}.id", '=', 'gia_san_phams.san_pham_id')
            ->where('gia_san_phams.active', 1);

        $products = $this->whereProductTypeId($products, $productTypeId);

        $products = $this->bindFilterToBuilder($products, $criteria);


        $products = $needPaging
            ? $products->paginate(PagingHelper::PER_PAGE)
            : $products->get();

        $criteria = $this->translatedFilters;

        return compact('products', 'criteria');
    }
}