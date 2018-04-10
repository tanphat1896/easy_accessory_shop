<?php

namespace App\Http\Controllers\Frontend;

use App\Acme\Behavior\ProcessOrder;
use App\Acme\Repository\Cart\CartRepository;
use App\DonHang;
use App\Helper\AuthHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    use ProcessOrder;

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

        $orderCode = $this->saveOrder($data);

        if (!empty($orderCode))
            $this->cleanCart();

        return redirect()->route('checkout.result')
            ->with([
                'orderCode' => $orderCode,
                'name' => $data['ten_nguoi_nhan']
            ]);
    }

    private function neededData(Request $request) {
        $cartProducts = $this->cartProductsForSync();
        $orderDate = date('Y-m-d H:i:s');
        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $totalCost = $request->get('total-cost');
        $typeCheckout = $request->get('type-checkout');

        return [
            'ten_nguoi_nhan' => $name,
            'email_nguoi_nhan' => $email,
            'sdt_nguoi_nhan' => $phone,
            'tong_tien' => $totalCost,
            'ghi_chu' => '',
            'tinh_trang' => 0,
            'ngay_dat_hang' => $orderDate,
            'hinh_thuc_thanh_toan' => $typeCheckout,
            'syncingProducts' => $cartProducts
        ];
    }

    private function cartProductsForSync() {
        $cart = $this->cartRepository->getProducts();
        $products = [];

        foreach ($cart as $bunch){
            $productId = $bunch['product']->id;

            $products[$productId] = [
                'so_luong' => $bunch['amount'],
                'don_gia' => $bunch['product']->giaMoiNhat()
            ];
        }

        return $products;
    }

    private function cleanCart() {
        $this->cartRepository->cleanCart();
    }
}
