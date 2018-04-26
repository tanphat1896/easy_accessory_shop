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

    public function init($paymentGate){
        $env = config('payment.env');

        $this->url = config("payment.url.$paymentGate.$env");
        $this->merchant_id = config("payment.type.$paymentGate.$env.id");
        $this->secure_pass = config("payment.type.$paymentGate.$env.password");
    }

    abstract public function buildUrl($data);

    abstract public function verify($data);
}