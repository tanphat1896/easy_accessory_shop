<?php

use Illuminate\Database\Seeder;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tai_khoans')->insert([
            'ten' => 'Nguyễn Đình Trọng',
            'email' => 'nguyentrongcp@gmail.com',
            'so_dien_thoai' => '01639883047',
            'ten_dang_nhap' => 'nguyentrong',
            'mat_khau' => 'kjsfikhiuhskdhrusihfhkq',
            'loai_tk_id' => 1
        ]);
        DB::table('tai_khoans')->insert([
            'ten' => 'Nguyễn Tấn Phát',
            'email' => 'tanphatct@gmail.com',
            'so_dien_thoai' => '01642745101',
            'ten_dang_nhap' => 'tanphatct',
            'mat_khau' => 'kjsfikhiuhskdhrusihfhkq',
            'loai_tk_id' => 2
        ]);
        DB::table('tai_khoans')->insert([
            'ten' => 'Nguyễn Văn Lộc',
            'email' => 'vanloccm@gmail.com',
            'so_dien_thoai' => '01628446973',
            'ten_dang_nhap' => 'vanloccm',
            'mat_khau' => 'kjsfikhiuhskdhrusihfhkq',
            'loai_tk_id' => 3
        ]);
    }
}
