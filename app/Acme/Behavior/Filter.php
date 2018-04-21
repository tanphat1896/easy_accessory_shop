<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/19/18
 * Time: 4:34 PM
 */

namespace App\Acme\Behavior;


trait Filter {
    private $reflectKey = [
        'price' => 'gia',
        'br' => 'thuong_hieu',
    ];

    public function extractFilter($filter) {
        $output = [];
        $criteria = explode(';', $filter);

        foreach ($criteria as $criterion) {
            if (!preg_match('/^(.+)=(.+)$/', $criterion))
                continue;
            $key = explode('=', $criterion)[0];
            $val = explode('=', $criterion)[1];

            $output[$this->reflectKey[$key]] = $val;
        }

        return $output;
    }
}