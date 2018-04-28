<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/24/18
 * Time: 4:23 PM
 */

namespace App\Acme\Behavior;


use App\Acme\Payment\BaokimPayment;
use App\Acme\Payment\NganluongPayment;
use App\Acme\Template\OnlinePayment;

trait ProcessOnlinePayment {

    private $payment = null;
    private $paymentMethod = ['baokim' => 'processBaokimPayment', 'nganluong' => 'processNganLuongPayment'];

    public function processOnlinePayment($data) {
        $gate = $data['hinh_thuc_thanh_toan'];
        $this->payment = OnlinePayment::getPayment($gate);

        $errors = [];
        if (empty($this->payment))
            $errors = ['Cổng thanh toán không hợp lệ'];

        $method = $this->paymentMethod[$gate];

        $orderCode = strtoupper(uniqid('DH_'));

        $info = $this->neededSendingInfo($data);

        $url = $this->$method($orderCode, $data['tong_tien'], $info);

        if (empty($url))
            $errors[] = 'Xin lỗi, không thể kết nối tới cổng thanh toán';

        return view('frontend.cart.checkout_online', compact('url', 'errors'));
    }

    private function neededSendingInfo(array $data) {
        return [
            'name' => $data['ten_nguoi_nhan'],
            'phone' => $data['sdt_nguoi_nhan'],
            'email' => $data['email_nguoi_nhan'],
            'addr' => $data['dia_chi'],
            'note' => $data['ghi_chu'],
            'order_date' => $data['ngay_dat_hang']
        ];
    }

    private function processBaokimPayment($orderCode, $totalCost, $info) {
        $url = $this->payment->createRequestUrl(
            $orderCode,
            'entipi18@gmail.com',
            $totalCost
        );

        return $url;
    }

    private function processNganluongPayment($orderCode, $totalCost, $info) {
        $url = $this->payment->buildUrl([
            "return_url" => config('payment.url.return_url'),
            "receiver" => 'entipi18@gmail.com',
            "transaction_info" => json_encode($info),
            "order_code" => $orderCode,
            "price" => $totalCost
        ]);

        return $url;
    }
}