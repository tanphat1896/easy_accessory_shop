<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/2/18
 * Time: 10:56 PM
 */

namespace App\Acme\Repository\Cart;


use App\Acme\Template\Cart;
use App\Helper\AuthHelper;
use App\SanPham;
use Illuminate\Http\Request;

class CartRepository {
    private $cart;

    public function injectCart($customerLogged) {
        $this->cart = $customerLogged ? new MemberCart(): new GuestCart();
    }

    public function storeGuestCartToMemberCart() {
        if (! AuthHelper::userLogged())
            return false;

        $products = session('cart') ?: [];
        session(['cart' => []]);

        foreach ($products as $product)
            $this->cart->addProduct($product['product'], $product['amount']);

        return true;
    }

    public function getProducts() {
        return $this->cart->getProducts();
    }

    public function addProduct(Request $request, $productSlug) {
        $product = SanPham::getFromSlug($productSlug);
        $amount = $request->get('amount');

        if (empty($product) || empty($amount))
            return false;

        $this->cart->addProduct($product, $amount);

        return true;
    }

    public function removeProduct($productSlug) {
        $this->cart->removeProduct($productSlug);

        return true;
    }

    public function updateAmount(Request $request, $productSlug) {
        if (empty($request->get('amount')))
            return false;

        $amount = (int)$request->get('amount');

        $this->cart->updateAmount($productSlug, $amount);

        return true;
    }

    public function cleanCart() {
        $this->cart->cleanCart();

        return true;
    }
}