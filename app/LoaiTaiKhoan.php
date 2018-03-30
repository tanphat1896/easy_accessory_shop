<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTaiKhoan extends Model
{
    //
    public function taiKhoans(){
        return $this->hasMany(TaiKhoan::class);
    }
}
