<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/24/18
 * Time: 8:07 PM
 */

namespace App\Acme\Template;


use App\Acme\Payment\BaokimPayment;
use App\Acme\Payment\NganluongPayment;
use Illuminate\Http\Request;

abstract class OnlinePayment {
    protected $gate = null;

    protected $url = null;
    protected $merchant_id = null;
    protected $secure_pass = null;

    protected $sendingFillable = [];

    public static function getPayment($paymentGate) {
        switch ($paymentGate) {
            case 'nganluong': return new NganluongPayment($paymentGate);
            case 'baokim': return new BaokimPayment($paymentGate);
            default: return null;
        }
    }

    public function init(){
        $env = config('payment.env');
        $gate = $this->gate;

        $this->url = config("payment.url.$gate.$env");
        $this->merchant_id = config("payment.type.$gate.$env.id");
        $this->secure_pass = config("payment.type.$gate.$env.password");
    }

    abstract public function buildUrl($data);

    public function validDataSending($data) {
        $keys = array_keys($data);
        foreach ($this->sendingFillable as $key) {
            if (!in_array($key, $keys))
                return false;
        }

        return true;
    }

    abstract public function verify(Request $request);
}