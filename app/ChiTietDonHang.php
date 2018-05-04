<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    public function tenSanPham()
    {
        return SanPham::find($this->san_pham_id)->ten_san_pham;
    }

    public function tongTien()
    {
        return $this->so_luong * $this->don_gia;
    }
}
