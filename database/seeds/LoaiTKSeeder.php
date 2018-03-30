<?php

use Illuminate\Database\Seeder;

class LoaiTKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loai_tai_khoans')->insert([
            'id'=>1,
            'ten_loai_tk'=>'Khách hàng',
        ]);
        DB::table('loai_tai_khoans')->insert([
            'id'=>2,
            'ten_loai_tk'=>'Nhân viên',
        ]);
        DB::table('loai_tai_khoans')->insert([
            'id'=>3,
            'ten_loai_tk'=>'Quản trị viên',
        ]);
    }
}
