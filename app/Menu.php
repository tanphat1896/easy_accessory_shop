<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function productTypeName() {
        $productType = LoaiSanPham::find($this->loai_san_pham_id);

        return empty($productType) ? 'Không có': $productType->getName();
    }
}
