<?php

use Illuminate\Database\Seeder;

class NhapHangSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
//        DB::table('phieu_nhaps')->insert([
//            'ngay_nhap' => '2018-04-03',
//            'admin_id' => 1,
//            'nha_cung_cap_id' => 1
//        ]);
//        DB::table('phieu_nhaps')->insert([
//            'ngay_nhap' => '2018-04-03',
//            'admin_id' => 1,
//            'nha_cung_cap_id' => 2
//        ]);

        $rows = [];
        for ($i = 0; $i < 57; $i++)
            $rows[] = $this->getRow();

        $rows = array_sort($rows, function ($row) {
            return $row['ngay_nhap'];
        });

        DB::table('phieu_nhaps')->insert($rows);
    }


    function getRow() {
        $date = OrderTableSeeder::getValidDate();
        return [
            'ngay_nhap' => $date,
            'admin_id' => random_int(1, 2),
            'so_san_pham' => 3,
            'nha_cung_cap_id' => random_int(1, 2)
        ];
    }
}
