<?php

use Illuminate\Database\Seeder;

class ShopInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('cua_hangs')->insert([
            'ten_cua_hang' => 'Easy Accessory shop',
            'email' => 'ezshop@gmail.com',
            'so_dien_thoai' => '01234569871',
            'dia_chi' => 'Ninh Kiều, Cần Thơ',
            'logo' => '/assets/images/favicon.png',
            'baokim_email' => 'entipi18@gmail.com',
            'nganluong_email' => 'entipi18@gmail.com',
            'wide_menu' => 1]);
    }
}
