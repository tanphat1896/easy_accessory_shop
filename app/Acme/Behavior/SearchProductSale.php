<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/24/18
 * Time: 12:12 PM
 */

namespace App\Acme\Behavior;


use App\KhuyenMai;
use App\LoaiSanPham;
use App\SanPham;
use Hamcrest\Thingy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait SearchProductSale {

    private $builder = null;
    private $products;


    public function searchProductSale(Request $request) {
        $this->buildBuilderFromQueries($request);

        if (empty($this->builder))
            return response()->json([]);

        $this->exceptSalingProduct();

        $this->products = $this->builder
            ->select(['san_phams.id', 'ten_san_pham as name'])
            ->get();

        return response()->json($this->products);
    }

    private function buildBuilderFromQueries(Request $request) {
        $queries = $request->query();

        $builder = null;

        if (!empty($queries['pt']))
            $this->builder = LoaiSanPham::find($queries['pt'])->sanPhams();

        if (!empty($queries['n']))
            $this->getBuilderFormProductName($queries['n']);
    }

    private function getBuilderFormProductName($name) {
        $condition = [['ten_san_pham', 'like', "%$name%"]];

        $this->builder = empty($this->builder)
            ? SanPham::where($condition)
            : $this->builder->where($condition);
    }

    private function exceptSalingProduct() {
        $salingProductIds = $this->getProductIdsOnSale();

        $this->builder = $this->builder->whereNotIn('san_phams.id', $salingProductIds);
    }

    public function getProductIdsOnSale() {
        $currentlyOnSaleCondition = [
            ['ngay_ket_thuc', '>=', date('Y-m-d')]
        ];

        $productIds = DB::table('khuyen_mais as k')
            ->join('chi_tiet_khuyen_mais as c', 'k.id', '=', 'c.khuyen_mai_id')
            ->where($currentlyOnSaleCondition)
            ->pluck('san_pham_id');

        return $productIds->toArray();
    }
}