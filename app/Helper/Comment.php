<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/19/18
 * Time: 11:32 PM
 */

namespace App\Helper;


use Illuminate\Support\Facades\DB;

class Comment {

    public static function getUnapprovedComments() {
        $comments = DB::table('binh_luans')
            ->where([
                ['approved', 0],
            ])
            ->join('san_phams', 'binh_luans.san_pham_id', '=', 'san_phams.id')
            ->get();

        return $comments;
    }
}