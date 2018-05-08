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
        $data = json_decode(Info::INFO, true);

        $rows = [];
        for ($i = 0; $i < 497; $i++)
            $rows[] = $this->getRow($i, $data);

        $rows = array_sort($rows, function($row) {
            return $row['ngay_dat_hang'];
        });

        DB::table('don_hangs')->insert($rows);
    }


    function getRow($i, $data) {
        $faker = Faker\Factory::create('vi_VN');
        $date = self::getValidDate();
        $status = array("cash", "baokim", "nganluong");
        $receiver = $data[$i];
        $admin = $data[998-$i];
        return [
            'ma_don_hang' => strtoupper(uniqid('DH_')),
            'ten_nguoi_nhan' => $receiver['name'],
            'email_nguoi_nhan' =>strtolower( $receiver['email']),
            'sdt_nguoi_nhan' => preg_replace('/(\s|\(|\))/i', '', $receiver['phone']),
            'dia_chi' => $receiver['address'],
            'tong_tien' => 0,//$faker->numberBetween(25000, 10000000),
            'phi_van_chuyen' => 10,
            'ngay_dat_hang' => $date,
            'ngay_duyet_don' => $date,
            'admin_id' => rand(1, 2),
            'nguoi_duyet' => $admin['name'],
            'hinh_thuc_thanh_toan' => $status[rand(0, 2)],
            'ghi_chu' => $faker->sentence,
            'tinh_trang' => strtotime($date) < strtotime("2018-1-1 00:00:01") ? 2: rand(0, 2),
//            'tinh_trang' => $date < '2018-1-1' ? '2' : random_int(1, 100)%3,
            'payment_type' => rand(1, 2),
            'payment_id' => "fsdfwe123123",
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
