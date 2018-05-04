<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuaHang extends Model
{
    public static function useWideMenu() {
        return self::first()->wide_menu;
    }

    public static function baokimEmail() {
        return self::first()->baokim_email ?: config('payment.info.receiver');
    }

    public static function nganluongEmail() {
        return self::first()->nganluong_email ?: config('payment.info.receiver');
    }

    public function useFbChat() {
        return $this->chat_plugin == 'fb';
    }

    public function useTawktoChat() {
        return $this->chat_plugin == 'tawkto';
    }

    public function fbScript() {
        return $this->link_fb;
    }

    public function tawktoScript() {
        return $this->link_tawkto;
    }
}
