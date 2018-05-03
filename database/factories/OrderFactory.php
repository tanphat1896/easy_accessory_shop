<?php

use Faker\Generator as Faker;

$factory->define(\App\DonHang::class, function (Faker $faker) {
    $date = getValidDate();
    return [
        'ma_don_hang' => strtoupper(uniqid('DH_')),
        'ten_nguoi_nhan' => $faker->name,
        'email_nguoi_nhan' => $faker->safeEmail,
        'sdt_nguoi_nhan' => substr($faker->phoneNumber, 0, 11),
        'dia_chi' => $faker->address,
        'tong_tien' => $faker->numberBetween(25000, 10000000),
        'ngay_dat_hang' => $date['order'],
        'ngay_duyet_don' => $date['check'],
        'hinh_thuc_thanh_toan' => 'cash',
        'ghi_chu' => $faker->sentence,
        'tinh_trang' => random_int(1, 100)%3,
        'created_at' => $date['order'],
        'updated_at' => $date['check']
    ];
});


function getValidDate() {
    $d = 0;
    $m = 0;
    $y = 0;
    while (! checkdate($m, $d, $y)) {
        $d = random_int(1, 31);
        $m = random_int(1, 12);
        $y = random_int(2013, 2017);
    }
    $d2 = 0;
    while (! checkdate($m, $d2, $y)) {
        $d2 = $d + random_int(1, 31);
    }
    return [
        'order' => "$y-$m-$d " . date('H:i:s'),
        'check' => "$y-$m-$d2 " . " " . date('H:i:s'),
    ];
}