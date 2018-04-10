<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 07/04/2018
 * Time: 14:57
 */

namespace App\Helper;


class Logging {
    public static function console($msg) {
        echo "<script>console.log('$msg')</script>";
    }
}