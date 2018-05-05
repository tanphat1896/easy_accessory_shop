<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 5/4/18
 * Time: 2:51 PM
 */

namespace App\Helper;


use Illuminate\Pagination\LengthAwarePaginator;

class PagingHelper {
    const PER_PAGE = 10;

    public static function numberStart(LengthAwarePaginator $paginator) {
        return ($paginator->currentPage() - 1) * $paginator->perPage() + 1;
    }
}