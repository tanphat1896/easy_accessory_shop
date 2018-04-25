<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/24/18
 * Time: 8:07 PM
 */

namespace App\Acme\Template;


abstract class OnlinePayment {
    protected $url = null;
    protected $merchant_id = null;
    protected $secure_pass = null;

    abstract public function init($paymentGate);

    abstract public function buildUrl($data);

    abstract public function verify($data);
}