<?php

namespace App;

use App\Acme\Behavior\CommonBehavior;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use CommonBehavior;

    protected $fillable = [
        'ma_don_hang',
        'ten_nguoi_nhan',
        'email_nguoi_nhan',
        'sdt_nguoi_nhan',
        'tong_tien',
        'dia_chi',
        'ghi_chu',
        'tinh_trang',
        'ngay_dat_hang',
        'hinh_thuc_thanh_toan',
        'payment_id',
        'payment_type'
    ];

    public function chiTietDonHangs()
    {
        return $this->hasMany(
            ChiTietDonHang::class,
            'don_hang_id',
            'id');
    }

    public function products() {
        return $this->belongsToMany(
            SanPham::class,
            'chi_tiet_don_hangs')->withPivot('so_luong');
    }

    public function statusHtml() {
        $statusText = [
            -1 => '<i class="close red icon"></i> Đã hủy',
            0 => '<i class="spinner blue icon"></i> Chưa duyệt',
            1 => '<i class="green check icon"></i> Đã duyệt'];

        return $statusText[$this->tinh_trang];
    }

    public function paymentType() {
        $payment = [
            'cash' => 'Tiền mặt',
            'nganluong' => 'Cổng Ngân Lượng',
            'baokim' => 'Cổng Bảo Kim'
        ];
        return $payment[$this->hinh_thuc_thanh_toan];
    }

    public function tinhTrangThanhToan()
    {
        if ($this->hinh_thuc_thanh_toan != "cash")
        {
            $paymentType = array("", "(Thanh toán trực tiếp)", "(Thanh toán tạm giữ)");
            return $paymentType[$this->payment_type];
        }
    }

    public function hinhThucThanhToan() {
        $payment = [
            'cash' => 'Tien mat',
            'nganluong' => 'Cong ngan luong',
            'baokim' => 'Cong bao kim'
        ];
        return $payment[$this->hinh_thuc_thanh_toan];
    }
}
