<?php

namespace App\Http\Controllers\Frontend;

use App\Acme\Behavior\GetOrder;
use App\Customer;
use App\DonHang;
use App\Helper\AuthHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    use GetOrder;

    public function history() {
        $orders = $this->getOrders(AuthHelper::userId());

        return view('frontend.customer.order_history', compact('orders'));
    }

    public function getOrderDetailTable($orderCode = '') {
        if (empty($orderCode) ||
            $this->orderNotBelongToLoggedCustomer($orderCode))
            return response()->json(false);

        $products = $this->getOrderDetail($this->getOrder($orderCode)->id);

        return view('frontend.order.order_detail_table', compact('products'));
    }

    private function orderNotBelongToLoggedCustomer($orderCode) {
        $order = $this->getOrder($orderCode);

        if (empty($order))
            return true;

        return $order->customer_id != AuthHelper::userId();
    }

    public function changeInfo(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->get('customer-name');
        $customer->phone = $request->get('customer-phone');
        $customer->address = $request->get('customer-address');
        $customer->update();

        return back()->with('success', 'Cập nhật thông tin thành công');
    }

    public function changePass(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $oldPassword = $request->get('oldPassword');
        if (!password_verify($oldPassword, $customer->password))
        {
            return back()->with('error', "Mật khẩu cũ không chính xác");
        }
        $password = $request->get('password');
        $customer->password = bcrypt($password);
        $customer->update();

        return back()->with('success', 'Thay đổi mật khẩu thành công');
    }
}
