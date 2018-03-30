<?php

use Illuminate\Database\Seeder;

class NhaCungCapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('nha_cung_caps')->insert([
            'ten_ncc' => 'Samsung',
            'dia_chi' => 'Số 2, Trần Văn Hoài, TP HCM',
            'so_dien_thoai' => '0410111213'
        ]);
        DB::table('nha_cung_caps')->insert([
            'ten_ncc' => 'Mobiistar',
            'dia_chi' => 'Lầu 3, tòa nhà số 4, đường số 5, quận 6, TP HCM',
            'so_dien_thoai' => '0910819253'
        ]);
    }
}
