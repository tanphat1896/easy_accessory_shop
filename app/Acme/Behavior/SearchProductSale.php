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
use Illuminate\Support\Facades\DB;

trait SearchProductSale {
    private $products;

    public function searchProductSale($queryString = 'product-type=1;name=Sam', $endDate = null) {
        $builder = $this->buildBuilderFromQueries($queryString);
        dd($builder->get());
    }

    private function buildBuilderFromQueries($queryString) {
        $queries = $this->extractQuery($queryString);

        $builder = null;

        if (!empty($queries['product-type']))
            $builder = LoaiSanPham::find($queries['product-type'])->sanPhams();

        if (!empty($queries['name']))
            $builder = $this->getBuilderFormProductName($builder, $queries['name']);

        return $builder;
    }

    private function extractQuery($queryString) {
        $parts = explode(';', $queryString);
        $queries = [];
        foreach ($parts as $part) {
            if (!preg_match('/.+(=).+/', $part))
                continue;
            $bunch = explode('=', $part);
            $queries[$bunch[0]] = $bunch[1];
        }
        return $queries;
    }

    private function getBuilderFormProductName($builder, $name) {
        $condition = [['ten_san_pham', 'like', "%$name%"]];
        if (empty($builder))
            return SanPham::where($condition);

        return $builder->where($condition);
    }

    public function getProductIdsOnSale($endDate = null) {
        $currentlyOnSaleCondition = [
            ['ngay_ket_thuc', '>=', date('Y-m-d')]
        ];
        $sales = DB::table('khuyen_mais as k')
            ->join('chi_tiet_khuyen_mais as c', 'k.id', '=', 'c.khuyen_mai_id')
            ->where($currentlyOnSaleCondition)
            ->get();

        $output = array_map(function($sale) {
            return $sale->san_pham_id;
        }, $sales->toArray());

        return $output;
    }
}