<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CardController extends Controller
{
    public function addProductToCart($productId) {
        $products = session('products');

        $products[] = "blabla1";

        session(['products' => $products]);

        return back();
    }
}
