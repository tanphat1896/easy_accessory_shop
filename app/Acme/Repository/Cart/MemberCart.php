<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 07/04/2018
 * Time: 15:49
 */

namespace App\Acme\Repository\Cart;


use App\Acme\Template\Cart;
use App\Helper\AuthHelper;
use App\SanPham;

class MemberCart extends Cart {
    private $member;
    private $activeCart;

    public function __construct() {
        $this->member = AuthHelper::user();
        $this->createCartIfNotExist();
    }

    private function createCartIfNotExist() {
        $this->activeCart = $this->member->activeCart();

        if (empty($this->activeCart))
            $this->activeCart = $this->member->carts()->create();
    }

    public function getProducts() {
        $productCollection = $this->activeCart->products;

        return $this->buildCartProducts($productCollection);
    }

    private function buildCartProducts($productCollection) {
        $this->products = [];

        foreach ($productCollection as $product) {
            $amount = $product->pivot->so_luong;
            $this->products[$product->slug] = [
                'product' => $product,
                'amount' => $amount,
                'cost' => $product->giaMoiNhat() * $amount
            ];
        }

        return $this->products;
    }

    public function addProduct($product, $amount) {
        $oldAmount = $this->getAmountIfCartHas($product);

        if ($oldAmount > 0){
            $amount += $oldAmount;
            $this->updateAmountExistProduct($product, $amount);
            return;
        }

        $this->activeCart->products()->attach([$product->id => ['so_luong' => $amount]]);
    }

    private function getAmountIfCartHas($product) {
        $cartProduct = $this->activeCart->products()
            ->where('san_phams.id', $product->id)
            ->first();

        return empty($cartProduct) ? 0 : $cartProduct->pivot->so_luong;
    }

    private function updateAmountExistProduct($product, $amount) {
        $this->activeCart->products()->updateExistingPivot($product->id, ['so_luong' => $amount]);
    }

    public function removeProduct($productSlug) {
        $product = SanPham::whereSlug($productSlug)->first();

        $this->activeCart->products()->detach($product->id);
    }

    public function updateAmount($productSlug, $amount) {
        $product = SanPham::whereSlug($productSlug)->first();

        $this->updateAmountExistProduct($product, $amount);
    }

    public function cleanCart() {
        $this->activeCart->was_checkout = 1;
        $this->activeCart->save();
    }
}