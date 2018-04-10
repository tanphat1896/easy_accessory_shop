<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/5/18
 * Time: 4:05 PM
 */

namespace App\Acme\Behavior;


use App\DonHang;
use App\Helper\AuthHelper;

trait ProcessOrder {
    private $typeCheckout = ['cash', 'baokim', 'nganluong'];

    public function saveOrder(array $data) {
        if ($this->notValidPayment($data['hinh_thuc_thanh_toan']))
            return false;

        $order = new DonHang($data);

        $order->ma_don_hang = uniqid('DH_');

        $order = $this->bindCustomerIdIfLogged($order);

        $order->save();

        $order->products()->sync($data['syncingProducts']);

        return $order->ma_don_hang;
    }

    private function notValidPayment($payment) {
        return !in_array($payment, $this->typeCheckout);
    }

    private function bindCustomerIdIfLogged($order) {
        if (AuthHelper::userLogged())
            $order->customer_id = AuthHelper::userId();

        return $order;
    }
}