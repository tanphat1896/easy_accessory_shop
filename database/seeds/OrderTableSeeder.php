<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [];
        for ($i = 0; $i < 200; $i++)
            $rows[] = $this->getRow();

        $rows = array_sort($rows, function($row) {
            return $row['ngay_dat_hang'];
        });

        DB::table('don_hangs')->insert($rows);
    }


    function getRow() {
        $faker = Faker\Factory::create();
        $date = self::getValidDate();
        return [
            'ma_don_hang' => strtoupper(uniqid('DH_')),
            'ten_nguoi_nhan' => $faker->name,
            'email_nguoi_nhan' => $faker->safeEmail,
            'sdt_nguoi_nhan' => substr($faker->phoneNumber, 0, 11),
            'dia_chi' => $faker->address,
            'tong_tien' => 0,//$faker->numberBetween(25000, 10000000),
            'ngay_dat_hang' => $date,
            'ngay_duyet_don' => $date,
            'hinh_thuc_thanh_toan' => 'cash',
            'ghi_chu' => $faker->sentence,
            'tinh_trang' => $date < '2018-1-1' ? '2' : random_int(1, 100)%3,
            'created_at' => $date,
            'updated_at' => $date
        ];
    }


    public static function getValidDate() {
        $time = mt_rand(1388509200, 1525107600);
        $date = date('Y-m-d H:i:s', $time);
        return $date;
    }
}
