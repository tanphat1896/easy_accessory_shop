<?php

use Illuminate\Database\Seeder;

class NhapHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phieu_nhaps')->insert([
            'ngay_nhap' => '2018-04-03',
            'admin_id' => 1,
            'nha_cung_cap_id' => 1
        ]);
        DB::table('phieu_nhaps')->insert([
            'ngay_nhap' => '2018-04-03',
            'admin_id' => 1,
            'nha_cung_cap_id' => 2
        ]);
    }
}
