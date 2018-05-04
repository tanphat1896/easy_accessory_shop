<?php

namespace App\Http\Controllers\Frontend;

use App\Acme\Repository\Cart\CartRepository;
use App\Helper\AuthHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CartController extends Controller
{
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

        if (AuthHelper::userLogged())
            $this->cartRepository->storeGuestCartToMemberCart();

        $products = $this->cartRepository->getProducts();

        return view('frontend.cart.index', compact('products'));
    }

    public function addProduct(Request $request, $productSlug) {
        $errorText = $this->cartRepository->addProduct($request, $productSlug);

        return empty($errorText)
            ? back()
            : back()->with('error', $errorText);
    }

    public function removeProduct($productSlug) {
        $errorText = $this->cartRepository->removeProduct($productSlug);

        return empty($errorText)
            ? back()
            : back()->with('error', $errorText);
    }

    public function updateAmount(Request $request, $productSlug) {
        $errorText = $this->cartRepository->updateAmount($request, $productSlug);

        return empty($errorText)
            ? back()
            : back()->with('error', $errorText);
    }
}
