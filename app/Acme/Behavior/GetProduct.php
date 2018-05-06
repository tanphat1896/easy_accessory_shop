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

trait GetProduct {
    use Filter;

    private $table = 'san_phams';

    public function getProducts($productTypeId, $perPage) {
        $tbPrice = 'gia_san_phams';
        $tbSale = 'khuyen_mais';
        $tbProdSale = 'chi_tiet_khuyen_mais';
        $pid = 'san_pham_id';

        $products = DB::table($this->table)
            ->join($tbPrice, "{$this->table}.id", '=', "$tbPrice.$pid")
            ->leftJoin($tbProdSale, "{$this->table}.id", '=', "$tbProdSale.$pid")
            ->leftJoin($tbSale, "$tbProdSale.khuyen_mai_id", '=', "$tbSale.id")
            ->where([
                ['gia_san_phams.active', 1],
                ['loai_san_pham_id', $productTypeId],
                ['ngay_ket_thuc', '>=', date('Y-m-d')]
            ])
            ->orWhere([
                ['gia_san_phams.active', 1],
                ['loai_san_pham_id', $productTypeId],
                ['ngay_ket_thuc', null]
            ])
            ->orderBy('san_phams.id', 'asc');

        return $products->paginate($perPage);
    }

    public function getProductsWithFilter($productTypeId, $criteria, $needPaging = false) {
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

    public function getProduct($slug) {
        $product = SanPham::whereSlug($slug)->firstOrFail();

        return $product;
    }

    public function getSaleProducts($limit = 6, $perPage = 0) {
        $tbPrice = 'gia_san_phams';
        $tbSale = 'khuyen_mais';
        $tbProdSale = 'chi_tiet_khuyen_mais';
        $pid = 'san_pham_id';

        $products = DB::table($this->table)
            ->join($tbPrice, "{$this->table}.id", '=', "$tbPrice.$pid")
            ->join($tbProdSale, "{$this->table}.id", '=', "$tbProdSale.$pid")
            ->join($tbSale, "$tbProdSale.khuyen_mai_id", '=', "$tbSale.id")
            ->where([
                ['gia_san_phams.active', 1],
                ['so_luong', '>', 0],
                ['ngay_ket_thuc', '>=', date('Y-m-d')]
            ])
            ->orderBy('gia_tri_km', 'desc');

        if (!empty($limit))
            $products = $products->limit($limit);

        return empty($perPage) ? $products->get() : $products->paginate($perPage);
    }

    public function getNewProducts($limit = 6, $perPage = 0) {
        $tbPrice = 'gia_san_phams';
        $tbSale = 'khuyen_mais';
        $tbProdSale = 'chi_tiet_khuyen_mais';
        $pid = 'san_pham_id';

        $products = DB::table($this->table)
            ->join($tbPrice, "{$this->table}.id", '=', "$tbPrice.$pid")
            ->leftJoin($tbProdSale, "{$this->table}.id", '=', "$tbProdSale.$pid")
            ->leftJoin($tbSale, "$tbProdSale.khuyen_mai_id", '=', "$tbSale.id")
            ->where([
                ['gia_san_phams.active', 1],
                ['ngay_ket_thuc', '>=', date('Y-m-d')],
                ['so_luong', '>', 8]
            ])
            ->orWhere([
                ['gia_san_phams.active', 1],
                ['ngay_ket_thuc', null],
                ['so_luong', '>', 8]
            ]);

        if (!empty($limit))
            $products = $products->limit($limit);

        return empty($perPage) ? $products->get() : $products->paginate($perPage);
    }

    public function getRelatedProducts($product) {
        $capacity = $this->getCapacityFrom($product->ten_san_pham);

        $condition = [
            ['loai_san_pham_id', $product->loai_san_pham_id],
            ['id', '<>', $product->id],
        ];

        if (!empty($capacity))
            $condition[] = ['ten_san_pham', 'like', "%$capacity%"];


        $products = SanPham::where($condition)
            ->limit(5)->get();

        if ($products->count() > 0)
            return $products;

        unset($condition[2]);

        $products = SanPham::where($condition)
            ->limit(5)->get();

        return $products;    
    }

    private function getCapacityFrom($productName) {
        $matches = null;
        $pattern = '/.*\s?([0-9]{1,3}GB).*/';
        preg_match($pattern, $productName, $matches);

        $capacity = empty($matches[1]) ? 0 : $matches[1];

        return $capacity;
    }

    public function getStopBusinessProducts() {
        $products = DB::table('san_phams')
            ->where('tinh_trang', 0)
            ->get();

        return $products;
    }

    public function getOutOfStockProducts() {
        $products = DB::table('san_phams')
            ->where('so_luong', 0)
            ->get();

        return $products;
    }

    public function getHotOrUnsoldProducts(Request $request) {
        $methods = ['hot' => 'getHotProducts', 'unsold' => 'getUnsoldProducts'];
        $type = $request->get('type') ?: 'hot';
        $totalMonth = $request->get('m') ?: 3;
        $limit = $request->get('lim') ?: 10;

        return $this->{$methods[$type]}($totalMonth, $limit);
    }

    public function getHotProducts($totalMonth, $limit = 10) {
        $date = date('Y-m-d', strtotime("-$totalMonth months")) . " 00:00:00";

        $builder = DB::table('chi_tiet_don_hangs as c')
            ->join('don_hangs as d', 'c.don_hang_id', '=', 'd.id')
            ->join('san_phams as s', 's.id', '=', 'c.san_pham_id')
            ->selectRaw('s.*, san_pham_id, sum(c.so_luong) as total')
            ->where('ngay_dat_hang', '>=', $date)
            ->groupBy('san_pham_id')
            ->orderBy('total', 'desc')
            ->limit($limit);

        return $builder->get();
    }
}