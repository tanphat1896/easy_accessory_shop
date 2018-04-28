<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/27/18
 * Time: 1:07 AM
 */

namespace App\Acme\Behavior;


use App\Acme\Payment\NganluongPayment;
use App\Acme\Template\OnlinePayment;
use App\DonHang;
use Illuminate\Http\Request;

trait ProcessResultPayment {
    use GetOrder;

    private $info = [
        'nganluong' => 'transaction_info'
    ];

    public function processCheckoutOnlineResult(Request $request) {
        $gate = $this->findGate($request);

        return $this->processResult($gate, $request);
    }

    private function findGate(Request $request) {
        return $request->has('transaction_info') ? 'nganluong' : 'baokim';
    }

    private function processResult($gate, Request $request) {
        $payment = OnlinePayment::getPayment($gate);

        $valid = $payment->verify($request);

        $order = false;
        if ($valid)
            $order = $this->savePaymentSuccessOrder($gate, $request);

        return $order;
    }

    private function savePaymentSuccessOrder($gate, Request $request) {
        $data = $this->buildSavingData($gate, $request);

        return $this->saveOrder($data);
    }

    private function buildSavingData($gate, Request $request) {
        $info = json_decode($request->get('transaction_info'), true);

        $orderCode = $request->get('order_code');
        $orderDate = $info['order_date'];
        $name = $info['name'];
        $email = $info['email'];
        $phone = $info['phone'];
        $address = $info['addr'];
        $note = $info['note'];
        $totalCost = $request->get('price');
        $typeCheckout = $gate;
        $paymentType = $request->get('payment_type');
        $paymentId = $request->get('payment_id');

        $cartProducts = $this->cartRepository->cartProductsForSync();

        return [
            'ma_don_hang' => $orderCode,
            'ten_nguoi_nhan' => $name,
            'email_nguoi_nhan' => $email,
            'sdt_nguoi_nhan' => $phone,
            'tong_tien' => $totalCost,
            'dia_chi' => $address,
            'ghi_chu' => $note,
            'tinh_trang' => 0,
            'ngay_dat_hang' => $orderDate,
            'hinh_thuc_thanh_toan' => $typeCheckout,
            'syncingProducts' => $cartProducts,
            'payment_type' => $paymentType,
            'payment_id' => $paymentId
        ];
    }

    public function checkoutOnlineCancel(Request $request) {
        dd($request);
    }
}