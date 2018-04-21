<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuaHang extends Model
{
    public static function useWideMenu() {
        return self::first()->wide_menu;
    }
}
