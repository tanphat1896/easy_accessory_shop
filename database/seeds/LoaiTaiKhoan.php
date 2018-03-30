<?php

use Illuminate\Database\Seeder;

class LoaiTaiKhoan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('loai_tai_khoans')->insert([
            'id'=>1,
            'ten_loai_tk'=>'Khách hàng'
        ]);
    }
}
