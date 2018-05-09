<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuNhap extends Model
{
    //
    protected $table = 'phieu_nhaps';

    public function nhaCungCap() {
        return $this->belongsTo(NhaCungCap::class);
    }

    public function admin() {
        return $this->belongsTo(Admin::class);
    }

    public function phieuNhaps()
    {
        return $this->hasMany(PhieuNhap::class, 'phieu_nhap_id', 'id');
    }

    public function chiTietPhieuNhaps()
    {
        return $this->hasMany(
            ChiTietPhieuNhap::class,
            'phieu_nhap_id',
            'id');
    }

    public function isEmpty()
    {
        return ($this->so_san_pham == 0) && ($this->da_cap_nhat == 1);
    }

    public function tenNhanVien()
    {
        return (empty($this->admin_id) ?
            ($this->ten_nhan_vien) :
            ($this->admin->name));
    }

    public function getChild()
    {
        return $this->phieuNhaps;
    }

    public function soNCC()
    {
        return PhieuNhap::where('phieu_nhap_id', $this->id)->count();
    }

    public function matchedNCC($ncc_id)
    {
        $phieuNhaps = PhieuNhap::where('phieu_nhap_id', $this->id)->get();
        foreach ($phieuNhaps as $phieuNhap)
        {
            if ($phieuNhap->nha_cung_cap_id == $ncc_id)
            {
                return true;
            }
        }
        return false;
    }

    public function daCapNhat()
    {
        $count = PhieuNhap::where('phieu_nhap_id', $this->id)
            ->where('da_cap_nhat', false)->count();

        return $count == 0;
    }
}
