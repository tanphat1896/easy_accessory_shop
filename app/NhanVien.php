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

    public function quyenHans() {
        return $this->belongsToMany(
            PhanQuyen::class,
            'quyen_nhan_viens',
            'admin_id',
            'phan_quyen_id');
    }

    public function checkQuyen($id)
    {
        if ($this->vai_tro == 0)
        {
            return true;
        }

        $quyens = $this->quyenHans->toArray();

        foreach ($quyens as $quyen)
        {
            if ($quyen['id'] == $id)
            return true;
        }

        return false;
    }

    public function isAdmin()
    {
        return $this->vai_tro == 0;
    }

    public function matchedIds($id) {
        return $id == $this->id;
    }
}
