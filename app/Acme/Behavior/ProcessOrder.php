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
use App\SanPham;
use Illuminate\Support\Facades\DB;

trait ProcessOrder {
    private $typeCheckout = ['cash', 'baokim', 'nganluong'];
    private $order;

    public function saveOrder(array $data) {
        if ($this->notValidPayment($data['hinh_thuc_thanh_toan']))
            return false;

        $this->order = new DonHang($data);
        $this->order->ma_don_hang = strtoupper(uniqid('DH_'));

        $this->bindCustomerIdIfLogged();

        $success = $this->storeOrderToDB($data);

        return $success ? $this->order->ma_don_hang: false;
    }

    private function notValidPayment($payment) {
        return !in_array($payment, $this->typeCheckout);
    }

    private function bindCustomerIdIfLogged() {
        if (AuthHelper::userLogged())
            $this->order->customer_id = AuthHelper::userId();
    }

    private function storeOrderToDB(array $data) {
        $success = true;

        DB::beginTransaction();
        try {
            $this->order->save();

            $this->decreaseAmountOfEachSyncingProducts($data['syncingProducts']);

            $this->order->products()->sync($data['syncingProducts']);
            DB::commit();
        } catch (\Exception $e) {
            $success = false;
            DB::rollBack();
        }

        return $success;
    }

    private function decreaseAmountOfEachSyncingProducts($syncingProducts) {
        foreach ($syncingProducts as $id => $syncingProduct) {
            $product = SanPham::find($id);
            if (empty($product))
                continue;

            $product->so_luong -= $syncingProduct['so_luong'];
            $product->save();
        }
    }
}