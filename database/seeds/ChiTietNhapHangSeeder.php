<?php

use Illuminate\Database\Seeder;

class ChiTietNhapHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chi_tiet_phieu_nhaps')->insert([
           'phieu_nhap_id' => 1,
            'san_pham_id' => 1,
            'so_luong' => 10,
            'don_gia' => 50000
        ]);
        DB::table('chi_tiet_phieu_nhaps')->insert([
            'phieu_nhap_id' => 1,
            'san_pham_id' => 4,
            'so_luong' => 4,
            'don_gia' => 30000
        ]);
        DB::table('chi_tiet_phieu_nhaps')->insert([
            'phieu_nhap_id' => 1,
            'san_pham_id' => 6,
            'so_luong' => 13,
            'don_gia' => 60000
        ]);
        DB::table('chi_tiet_phieu_nhaps')->insert([
            'phieu_nhap_id' => 1,
            'san_pham_id' => 3,
            'so_luong' => 20,
            'don_gia' => 90000
        ]);
    }
}
