<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 3/29/18
 * Time: 6:21 PM
 */

namespace App\Acme\Behavior;


use Carbon\Carbon;

trait CommonBehavior {
    private $format = 'd/m/Y \l\ú\c H:i:s';

    public function formatDate($key) {
        return Carbon::parse($this->{$key})->format($this->format);
    }
}