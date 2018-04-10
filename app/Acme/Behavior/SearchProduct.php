<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 07/04/2018
 * Time: 13:00
 */

namespace App\Acme\Behavior;


use App\Helper\StringHelper;
use App\SanPham;
use Illuminate\Support\Facades\DB;

trait SearchProduct {
    public function searchByName($keyword, $limit) {
        $slug = StringHelper::toSlug($keyword);

        $products = DB::table('san_phams')
            ->select(['ten_san_pham', 'slug', 'anh_dai_dien', 'gia'])
            ->where('slug', 'like', "%$keyword%")
            ->limit($limit)
            ->join(
                'gia_san_phams',
                'gia_san_phams.id',
                '=',
                'san_phams.id')
            ->orderBy('gia_san_phams.id','desc')
            ->get();

        return $products;
    }
}