<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 08/04/2018
 * Time: 14:00
 */

namespace App\Helper;


use App\Acme\Repository\Cart\CartRepository;
use Illuminate\Support\Facades\DB;

class FrontendHelper {

    public static function migrateToMemberCart() {
        if (! AuthHelper::userLogged())
            return;

        $cart = new CartRepository();

        $cart->injectCart(true);

        $cart->storeGuestCartToMemberCart();
    }

    public static function totalProductsInCart() {
        if (! AuthHelper::userLogged())
            return self::guestCartCounting();

        return self::memberCartCounting();
    }

    private static function guestCartCounting() {
        return empty(session('cart')) ? 0: count(session('cart'));
    }

    private static function memberCartCounting() {
        $cart = AuthHelper::user()->activeCart();

        return empty($cart) ? 0 : $cart->products->count();
    }

    public static function getStar($customerId, $productId) {
        $rating = DB::table('danh_gias')
            ->where([
                ['customer_id', $customerId],
                ['san_pham_id', $productId]
            ])->first();
        return $rating ? $rating->diem_danh_gia: 0;
    }
}