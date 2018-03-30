<?php

namespace App;

use App\Acme\Behavior\CommonBehavior;
use App\Helper\StringHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class GiaSanPham extends Model
{
    use CommonBehavior;

    protected $fillable = ['ngay_cap_nhat', 'gia', 'san_pham_id'];

    public static function giaThayDoi($gia) {
        $giaMoiNhat = self::orderBy('ngay_cap_nhat', 'desc')->first()->gia;
        $gia = StringHelper::getNumberFromCurrency($gia);

        return floor($gia - $giaMoiNhat) != 0;
    }

    public static function fromCurrency($gia) {
        $gia = StringHelper::getNumberFromCurrency($gia);

        return new self(['ngay_cap_nhat' => date('Y-m-d H:i:s'), 'gia' => $gia]);
    }
}
