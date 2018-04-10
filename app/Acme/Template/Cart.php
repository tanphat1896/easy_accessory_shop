<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 07/04/2018
 * Time: 15:51
 */

namespace App\Acme\Template;


abstract class Cart {

    protected $products = [];

    abstract public function getProducts();

    abstract public function addProduct($product, $amount);

    abstract public function removeProduct($productSlug);

    abstract public function updateAmount($productSlug, $amount);

    abstract public function cleanCart();
}