<?php

namespace App\Http\Controllers\Frontend;

use App\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index() {
        if (Auth::guest())
            return $this->indexGuestCart();

        return $this->indexMemberCart();
    }

    public function indexGuestCart() {
        $products = session('cart') ?: [];

        return view('frontend.cart.index', compact('products'));
    }

    private function indexMemberCart() {
    }

    public function addProductToCart(Request $request, $productSlug) {
        $product = SanPham::getFromSlug($productSlug);
        $amount = $request->get('amount');

        if (empty($product) || empty($amount))
            return back();

        if (Auth::guest())
            return $this->guestAddProductToCart($product, $amount);

        return $this->memberAddProductToCart($product, $amount);
    }

    private function guestAddProductToCart($product, $amount) {
        $products = session('cart');

        $amount = $this->increaseAmountIfProductExist($products, $product, $amount);

        $cost = $this->calcCostOfEachProduct($product, $amount);

        $products[$product->slug] = compact('product', 'amount' ,'cost');

        session(['cart' => $products]);

        return back();
    }

    private function increaseAmountIfProductExist($products, $product, $amount) {
        if (!empty($products[$product->slug]))
            $amount = $amount + $products[$product->slug]["amount"];

        return $amount;
    }

    private function calcCostOfEachProduct($product, $amount) {
        return $amount * $product->giaMoiNhat();
    }

    private function memberAddProductToCart($product, $amount) {
        return back();
    }

    public function removeProduct($slug) {
        $products = session('cart');

        unset($products[$slug]);

        session(['cart' => $products]);

        return back();
    }

    public function updateAmount(Request $request, $slug) {
        $products = session('cart');

        if (empty($products[$slug]))
            return back();

        if (empty($request->get('amount')))
            return back();

        $amount = (int)$request->get('amount');

        $productBunch = $products[$slug];

        $productBunch['amount'] = $amount;
        $productBunch['cost'] = $this->calcCostOfEachProduct($productBunch['product'], $amount);
        $products[$slug] = $productBunch;

        session(['cart' => $products]);

        return back();
    }
}
