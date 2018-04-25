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

trait ProcessOnlinePayment {

    private $payment = null;
    private $paymentClass = ['baokim' => 'BaokimPayment', 'nganluong' => 'NganluongPayment'];
    private $paymentMethod = ['baokim' => 'processBaokimPayment', 'nganluong' => 'processNganLuongPayment'];

    public function processOnlinePayment($order) {
        $method = $this->paymentMethod[$order->hinh_thuc_thanh_toan];

        $this->$method($order);
    }

    private function processBaokimPayment($order) {
        $this->payment = new BaokimPayment();
        $url = $this->payment->createRequestUrl(
            $order->ma_don_hang,
            'entipi18@gmail.com',
            $order->tong_tien
        );

        echo $url;
    }

    private function processNganluongPayment($order) {
        $this->payment = new NganluongPayment();
        $this->payment->init('nganluong');
        $url = $this->payment->buildCheckoutUrl(
            config('payment.url.return_url'),
            'entipi18@gmail.com',
            'ntp',
            $order->ma_don_hang,
            $order->tong_tien
        );

        echo $url;
    }
}