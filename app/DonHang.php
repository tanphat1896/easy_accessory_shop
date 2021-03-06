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

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function products() {
        return $this->belongsToMany(
            SanPham::class,
            'chi_tiet_don_hangs')->withPivot('so_luong');
    }

    public function statusHtml() {
        $statusText = [
            3 => '<i class="close red icon"></i> Đã hủy',
            0 => '<i class="spinner blue icon"></i> Chưa duyệt',
            1 => '<i class="teal shipping fast icon"></i> Đang vận chuyển',
            2 => '<i class="green check icon"></i> Đã giao hàng'
        ];

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

    public function daHuy() {
        return $this->tinh_trang == 3;
    }

    public function daDuyet() {
        return ($this->tinh_trang == 1) || ($this->tinh_trang == 2);
    }

    public function chuaDuyet() {
        return $this->tinh_trang == 0;
    }

    public function nguoiDuyet()
    {
        return (empty($this->admin_id)?($this->nguoi_duyet):($this->admin->name));
    }
}
