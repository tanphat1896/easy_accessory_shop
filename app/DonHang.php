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

    function vn_to_en ($str){

        $unicode = array(

            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

            'd'=>'đ',

            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

            'i'=>'í|ì|ỉ|ĩ|ị',

            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',

            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

            'D'=>'Đ',

            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',

            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

        );

        foreach($unicode as $nonUnicode=>$uni){

            $str = preg_replace("/($uni)/i", $nonUnicode, $str);

        }

        return $str;

    }
}
