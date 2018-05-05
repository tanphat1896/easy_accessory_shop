<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 07/04/2018
 * Time: 14:57
 */

namespace App\Helper;


use App\History;

class Logging {
    public static function console($msg) {
        echo "<script>console.log('$msg')</script>";
    }

    public static function saveActivity($msg) {
        History::create([
            'admin_id' => AuthHelper::adminId(),
            'name' => AuthHelper::adminName(),
            'description' => $msg,
            'time' => date('Y-m-d H:i:s')
        ]);
    }
}