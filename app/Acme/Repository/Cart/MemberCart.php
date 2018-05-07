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
use App\Helper\AuthHelper;
use App\SanPham;

class MemberCart extends Cart {
    use ProductAvailable;

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
                'cost' => $product->priceSale() * $amount
            ];
        }

        return $this->products;
    }

    public function addProduct($product, $amount) {

        if (! $this->availableAmount($product->slug, $amount))
            return $this->errorText;

        $oldAmount = $this->getAmountIfCartHas($product);

        if ($oldAmount > 0){
            $amount += $oldAmount;

            if ($this->availableAmount($product->id, $amount))
                $this->updateAmountExistProduct($product, $amount);

            return self::NO_ERROR;
        }

        $this->activeCart->products()->attach([$product->id => ['so_luong' => $amount]]);

        return self::NO_ERROR;
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

        return self::NO_ERROR;
    }

    public function updateAmount($productSlug, $amount) {
        $product = SanPham::whereSlug($productSlug)->first();

        if (! $this->availableAmount($product->id, $amount))
            return $this->errorText;

        $this->updateAmountExistProduct($product, $amount);

        return self::NO_ERROR;
    }

    public function cleanCart() {
        $this->activeCart->was_checkout = 1;
        $this->activeCart->save();
    }
}