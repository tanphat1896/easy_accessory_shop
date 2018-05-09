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
        for ($i = 0; $i < 20; $i++)
            $rows[] = $this->getRowParent();

        $rows = array_sort($rows, function ($row) {
            return $row['ngay_nhap'];
        });

        DB::table('phieu_nhaps')->insert($rows);

        $rows = [];
        for ($i = 0; $i < 100; $i++)
            $rows[] = $this->getRowChild();

        $rows = array_sort($rows, function ($row) {
            return $row['ngay_nhap'];
        });

        DB::table('phieu_nhaps')->insert($rows);
    }

    function getRowParent() {
        $date = OrderTableSeeder::getValidDate();
        $id = random_int(1, 10);
        return [
            'ngay_nhap' => $date,
            'admin_id' => $id,
            'ten_nhan_vien' => \App\Admin::find($id)->name
        ];
    }

    function getRowChild() {
        $id = random_int(1, 20);
        $date = \App\PhieuNhap::find($id)->ngay_nhap;
        return [
            'phieu_nhap_id' => $id,
            'so_san_pham' => 3,
            'ngay_nhap' => $date,
            'nha_cung_cap_id' => random_int(1, 9)
        ];
    }
}
