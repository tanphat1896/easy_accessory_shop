<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/29/18
 * Time: 11:42 AM
 */

namespace App\Acme\Repository\Cart;


class TempCart {
    const TEMP_CART_ID = 'tmp_cart';

    public static function cloneCart($cart) {
        $tmpCart = self::getTempCart();

        $id = uniqid(self::TEMP_CART_ID);

        $tmpCart[$id] = $cart;
        session([self::TEMP_CART_ID => $tmpCart]);

        return $id;
    }

    public static function getTempCart() {
        return session(self::TEMP_CART_ID);
    }

    public static function destroy($id) {
        $tmpCart = self::getTempCart();

        unset($tmpCart[$id]);
        session([self::TEMP_CART_ID => $tmpCart]);

        return $id;
    }

    public static function get($id) {
        $tmpCart = self::getTempCart();

        return $tmpCart[$id];
    }
}