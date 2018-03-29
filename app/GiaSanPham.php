<?php

namespace App;

use App\Acme\Behavior\CommonBehavior;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class GiaSanPham extends Model
{
    use CommonBehavior;

    protected $fillable = ['ngay_cap_nhat', 'gia'];

    public static function fromCurrency($gia) {
        $gia = preg_replace('/[.,\sđ]/', '', $gia);

        return new self(['ngay_cap_nhat' => date('Y-m-d H:i:s'), 'gia' => $gia]);
    }
}
