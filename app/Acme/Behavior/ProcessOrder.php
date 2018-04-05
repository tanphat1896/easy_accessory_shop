<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/5/18
 * Time: 4:05 PM
 */

namespace App\Acme\Behavior;


use App\DonHang;

trait ProcessOrder {
    private $typeCheckout = ['cash', 'baokim', 'nganluong'];

    public function saveOrder(array $data) {
        if ($this->notValidPayment($data['hinh_thuc_thanh_toan']))
            return false;

        $order = new DonHang($data);

        $order->ma_don_hang = 'DH' . time();

        $order->save();

        $order->products()->sync($data['products']);

        return $order->ma_don_hang;
    }

    private function notValidPayment($payment) {
        return !in_array($payment, $this->typeCheckout);
    }
}