<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/19/18
 * Time: 11:46 AM
 */

namespace App\Acme\Behavior;


use App\SanPham;

trait ProductAvailable {
    public function availableAmount($idOrSlug, $neededAmount) {
        $product = is_int($idOrSlug) ? SanPham::find($idOrSlug) : SanPham::whereSlug($idOrSlug)->first();

        return empty($product) ? false: (int)$product->so_luong >= $neededAmount;
    }

    public function availabelSyncingProducts($syncingProducts) {
        foreach ($syncingProducts as $id => $syncingProduct) {
            if (!$this->availableAmount($id, $syncingProduct['so_luong']))
                return false;
        }

        return true;
    }
}