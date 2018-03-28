<?php
/**
 * Created by PhpStorm.
 * User: TanPhat
 * Date: 27/03/2018
 * Time: 11:49 PM
 */

namespace App\Acme\Contract;


interface CommonFunction {
    public function getName();

    public function matchedId($id);
}