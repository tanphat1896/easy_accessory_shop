<?php

namespace App\Http\Controllers\Frontend;

use App\Acme\Behavior\ProcessOnlinePayment;
use App\Acme\Behavior\ProcessOrder;
use App\Acme\Behavior\ProcessResultPayment;
use App\Acme\Behavior\ProductAvailable;
use App\Acme\Payment\NganluongPayment;
use App\Acme\Repository\Cart\CartRepository;
use App\Acme\Repository\Cart\TempCart;
use App\DonHang;
use App\Helper\AuthHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    use ProcessOrder;
    use ProductAvailable;
    use ProcessOnlinePayment;
    use ProcessResultPayment;

    private $cartRepository;

    public function __construct(CartRepository $cartRepository) {
        $this->cartRepository = $cartRepository;

        // từ lar5.3 không cho dùng session trong constructor,
        // nên phải thông qua middleware
        $this->middleware(function ($request, $next) {
            $this->cartRepository->injectCart(AuthHelper::userLogged());
            return $next($request);
        });
    }

    public function index() {

        $products = $this->cartRepository->getProducts();

        if (empty($products))
            return back()->with('message', 'Giỏ hàng rỗng');

        $totalCost = 0;
        $totalAmount = 0;
        foreach ($products as $product) {
            $totalCost += $product['cost'];
            $totalAmount += $product['amount'];
        }
        return view('frontend.cart.checkout', compact('totalCost', 'products', 'totalAmount'));
    }

    public function store(Request $request) {
        $data = $this->neededData($request);

        $this->checkIfCanCheckout($data);

        if ($this->notCashPayment($data['hinh_thuc_thanh_toan']))
            return $this->processOnlinePayment($data);

        $order = $this->saveOrder($data);

        if (!empty($order))
            $this->cleanCart();

        return redirect()->route('checkout.result')
            ->with([
                'orderCode' => $order->ma_don_hang,
                'name' => $order->ten_nguoi_nhan
            ]);
    }

    private function neededData(Request $request) {
        $cartProducts = $this->cartRepository->cartProductsForSync();
        $orderDate = date('Y-m-d H:i:s');
        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $note = $request->get('note');
        $totalCost = $request->get('total-cost');
        $typeCheckout = $request->get('type-checkout');

        return [
            'ten_nguoi_nhan' => $name,
            'email_nguoi_nhan' => $email,
            'sdt_nguoi_nhan' => $phone,
            'tong_tien' => $totalCost,
            'dia_chi' => $address,
            'ghi_chu' => $note,
            'tinh_trang' => 0,
            'ngay_dat_hang' => $orderDate,
            'hinh_thuc_thanh_toan' => $typeCheckout,
            'syncingProducts' => $cartProducts
        ];
    }

    private function checkIfCanCheckout(array $data) {
        $canCheckout = $this->availabelSyncingProducts($data['syncingProducts']);

        if (!$canCheckout)
            return back()->with('error', 'Số lượng không đủ để đặt hàng ');
    }

    private function cleanCart() {
        $this->cartRepository->cleanCart();
    }

    public function checkoutOnlineResult(Request $request) {
        $order = $this->processCheckoutOnlineResult($request);

        if (!empty($order))
            $this->cleanCart();

        return redirect()->route('checkout.result')
            ->with([
                'orderCode' => $order->ma_don_hang,
                'name' => $order->ten_nguoi_nhan
            ]);
    }
}
