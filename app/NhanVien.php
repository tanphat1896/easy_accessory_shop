<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = 'admins';

    public static function daTonTai($email)
    {
        return (NhanVien::where('email', $email)->count() > 0);
    }
}
