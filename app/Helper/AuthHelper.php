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

    public static function user() {
        return self::userGuard()->user();
    }

    private static function userGuard() {
	    $guard = Auth::guard('customer');
	    return $guard;
    }
}