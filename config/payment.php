<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/24/18
 * Time: 3:49 PM
 */

return [
    'env' => 'sandbox',
    'type' => [
        'baokim' => [
            'live' => [],
            'sandbox' => [
                'password' => '5025cd22f0f1f211',
                'id' => '33427'
            ],
            'local' => [
                'password' => '0797ee26269fcccd',
                'id' => '33425'
            ]
        ],
        'nganluong' => [
            'live' => [],
            'sandbox' => [
                'password' => '82252071d363080ad239707e569fcabd',
                'id' => '45950'
            ]
        ]
    ],
    'url' => [
        'nganluong' => [
            'live' => '',
            'sandbox' => 'https://sandbox.nganluong.vn:8088/nl30/checkout.php'
        ],
        'baokim' => [
            'live' => 'https://www.baokim.vn/payment/order/version11',
            'sandbox' => 'https://www.baokim.vn/payment/order/version11'
        ],
        'base_url' => 'http://127.0.0.1:8000',
        'return_url' => 'http://127.0.0.1:8000/payment-result',
        'cancel_url' => 'http://127.0.0.1:8000/payment-cancel'
    ],
    'info' => [
        'receiver' => 'entipi18@gmail.com',
    ]
];