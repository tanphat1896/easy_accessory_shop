<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/2/18
 * Time: 10:56 PM
 */

namespace App\Acme\Repository\Cart;


use App\Acme\Behavior\ProductAvailable;
use App\Acme\Template\Cart;
use App\Helper\AuthHelper;
use App\SanPham;
use Illuminate\Http\Request;

class CartRepository {
    use ProductAvailable;

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

        return $this->cart->addProduct($product, $amount);
    }

    public function removeProduct($productSlug) {
        return $this->cart->removeProduct($productSlug);
    }

    public function updateAmount(Request $request, $productSlug) {
        if (empty($request->get('amount')))
            return false;

        $amount = (int)$request->get('amount');

        return $this->cart->updateAmount($productSlug, $amount);
    }

    public function cleanCart() {
        $this->cart->cleanCart();

        return true;
    }

    public function cartProductsForSync($cart = null) {
        if (empty($cart))
            $cart = $this->getProducts();
        $products = [];

        foreach ($cart as $bunch){
            $productId = $bunch['product']->id;

            $products[$productId] = [
                'so_luong' => $bunch['amount'],
                'don_gia' => $bunch['product']->giaMoiNhat(),
                'giam_gia' => $bunch['product']->salePercent()
            ];
        }

        return $products;
    }

    public function cloneToTempCart() {
        $cart = $this->cart->getProducts();

        $tmpCartId = TempCart::cloneCart($cart);

        return $tmpCartId;
    }
}