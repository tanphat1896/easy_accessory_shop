<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 5/6/18
 * Time: 4:41 PM
 */

namespace App\Acme\Behavior;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait ProductStatistic {
    private $typeProductMethod = [
        'brand' => 'getProductAmountByBrand',
        'ptype' => 'getProductAmountByType',
        'state' => 'getProductAmountByStatus'
    ];

    public function getProductStatistic(Request $request) {
        $type = $request->get('type') ?: '';

        if (empty($this->typeProductMethod[$type]))
            return response()->json(null);

        $method = $this->typeProductMethod[$type];

        $data = $this->$method($request);

        return response()->json($data);
    }

    private function getProductAmountByBrand() {
        $brandingProducts = DB::table('thuong_hieus')
            ->join('san_phams', 'thuong_hieus.id', '=', 'san_phams.thuong_hieu_id')
            ->selectRaw('ten_thuong_hieu, count(*) as total')
            ->groupBy('ten_thuong_hieu')
            ->get();

        return $brandingProducts;
    }



    public function getProductAmountByType() {
        $ptypeProducts = DB::table('loai_san_phams')
            ->join('san_phams', 'loai_san_phams.id', '=', 'san_phams.loai_san_pham_id')
            ->selectRaw('loai_san_phams.ten_loai as label, count(*) as value')
            ->groupBy('loai_san_phams.ten_loai')->get();

        return $ptypeProducts->toJson();
    }

    public function getProductAmountByStatus() {
        $total = DB::table('san_phams')->count();
        $outOfStock = DB::table('san_phams')->where('so_luong', 0)->count();
        $stopBusiness = DB::table('san_phams')->where('tinh_trang', 0)->count();
        $new = DB::table('san_phams')->where('so_luong', '>', 8)->count();
        $sale = $this->getProductAmountOnSale();

        return compact('total', 'new', 'outOfStock', 'sale', 'stopBusiness');
    }

    private function getProductAmountOnSale() {
        $total = DB::table('chi_tiet_khuyen_mais as c')
            ->join('khuyen_mais as k', 'k.id', '=', 'c.khuyen_mai_id')
            ->where('ngay_ket_thuc', '>=', date('Y-m-d'))
            ->count();

        return $total;
    }
}