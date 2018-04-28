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

    const ERROR_TEXT = [
        'NOT_ENOUGH' => 'Không đủ số lượng',
        'BLOCKED' => 'Giỏ hàng đã khóa để thanh toán',
        'NOT_EXIST' => 'Không có sản phẩm này'
    ];

    const NO_ERROR = false;

    abstract public function getProducts();

    abstract public function addProduct($product, $amount);

    abstract public function removeProduct($productSlug);

    abstract public function updateAmount($productSlug, $amount);

    abstract public function block();

    abstract public function blocked();

    abstract public function cleanCart();
}