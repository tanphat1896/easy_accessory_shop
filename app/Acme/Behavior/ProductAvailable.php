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
    public $errorText = '';

    public function availableAmount($idOrSlug, $neededAmount) {
        $product = is_int($idOrSlug) ? SanPham::find($idOrSlug) : SanPham::whereSlug($idOrSlug)->first();

        if (empty($product)){
            $this->errorText = 'Sản phẩm không tồn tại!';
            return false;
        }

        if ((int)$product->so_luong < $neededAmount) {
            $this->errorText = 'Sản phẩm ' . $product->ten_san_pham . ' không đủ số lượng!';
            return false;
        }

        return true;
    }

    public function availabelSyncingProducts($syncingProducts) {
        foreach ($syncingProducts as $id => $syncingProduct) {
            if (!$this->availableAmount($id, $syncingProduct['so_luong']))
                return false;
        }

        return true;
    }
}