<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 07/04/2018
 * Time: 13:06
 */

namespace App\Helper;

use Auth;

class AuthHelper {

	public static function userLogged() {
	    return self::userGuard()->check();
    }

    public static function userId() {
	    return self::userGuard()->id();
    }

    public static function userEmail() {
	    return self::user()->email;
    }

    public static function userName() {
        return self::user()->name;
    }

    public static function userPhone() {
        return self::user()->phone;
    }

    public static function userAddress() {
        return self::user()->address;
    }

    public static function user() {
        return self::userGuard()->user();
    }

    private static function userGuard() {
	    $guard = Auth::guard('customer');
	    return $guard;
    }

    public static function adminLogged() {
	    return self::adminGuard()->check();
    }

    public static function adminId() {
        return self::adminGuard()->id();
    }

    public static function adminEmail() {
        return self::admin()->email;
    }

    public static function adminName() {
        return self::admin()->name;
    }

    public static function adminPhone() {
	    return self::admin()->phone;
    }

    public static function admin() {
	    return self::adminGuard()->user();
    }

    private static function adminGuard() {
	    $guard = Auth::guard('admin');
	    return $guard;
    }
}