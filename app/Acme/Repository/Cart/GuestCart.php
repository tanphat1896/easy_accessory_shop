<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 07/04/2018
 * Time: 15:49
 */

namespace App\Acme\Repository\Cart;


use App\Acme\Behavior\ProductAvailable;
use App\Acme\Template\Cart;
use App\SanPham;

class GuestCart extends Cart {
    use ProductAvailable;

    public function getProducts() {
        $this->updateCartToNewestPrice();
        return session('cart') ?: [];
    }

    private function updateCartToNewestPrice() {
        $this->products = session('cart') ?: [];
        foreach ($this->products as $slug => $product) {
            $product['product'] = SanPham::whereSlug($slug)->first();
            $product['cost'] = $product['product']->priceSale() * $product['amount'];

            $this->products[$slug] = $product;
        }

        session(['cart' => $this->products]);
    }

    public function addProduct($product, $amount) {
        $this->products = session('cart');

        $amount = $this->increaseAmountIfProductExist($product, $amount);
        $cost = $amount * $product->priceSale();

        $this->products[$product->slug] = compact('product', 'amount' ,'cost');

        session(['cart' => $this->products]);

        return true;
    }

    private function increaseAmountIfProductExist($product, $amount) {
        if (!empty($this->products[$product->slug]))
            $amount = $amount + $this->products[$product->slug]["amount"];

        return $amount;
    }

    public function removeProduct($productSlug) {
        $this->products = session('cart');

        unset($this->products[$productSlug]);

        session(['cart' => $this->products]);
    }

    public function updateAmount($productSlug, $amount) {
        $this->products = session('cart');

        if (empty($this->products[$productSlug]))
            return false;

        if (!$this->availableAmount($productSlug, $amount))
            return false;

        $productBunch = $this->products[$productSlug];

        $productBunch['amount'] = $amount;
        $productBunch['cost'] = $productBunch['product']->priceSale() * $amount;
        $this->products[$productSlug] = $productBunch;

        session(['cart' => $this->products]);

        return true;
    }

    public function cleanCart() {
        session(['cart' => []]);
    }
}