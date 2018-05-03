<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('menus')->insert([
            ['name' => '', 'link' => '/', 'icon' => 'home', 'loai_san_pham_id' => null],
            ['name' => 'SSD', 'link' => '/san-pham/ssd', 'icon' => 'hdd', 'loai_san_pham_id' => SanPhamTableSeeder::PRODUCT_TYPE_IDS['ssd']],
            ['name' => 'USB', 'link' => '/san-pham/usb', 'icon' => 'usb', 'loai_san_pham_id' => SanPhamTableSeeder::PRODUCT_TYPE_IDS['usb']],
            ['name' => 'Headphone', 'link' => '/san-pham/headphone', 'icon' => 'headphones', 'loai_san_pham_id' => SanPhamTableSeeder::PRODUCT_TYPE_IDS['headphone']],
            ['name' => 'Bàn phím', 'link' => '/san-pham/ban-phim', 'icon' => 'keyboard', 'loai_san_pham_id' => SanPhamTableSeeder::PRODUCT_TYPE_IDS['keyboard']],
            ['name' => 'Tai nghe', 'link' => '/san-pham/tai-nghe', 'icon' => 'headphones', 'loai_san_pham_id' => SanPhamTableSeeder::PRODUCT_TYPE_IDS['phone']],
            ['name' => 'RAM', 'link' => '/san-pham/ram', 'icon' => 'microchip', 'loai_san_pham_id' =>SanPhamTableSeeder::PRODUCT_TYPE_IDS['ram']],
            ['name' => 'Chuột', 'link' => '/san-pham/chuot', 'icon' => 'headphones', 'loai_san_pham_id' => SanPhamTableSeeder::PRODUCT_TYPE_IDS['mouse']],
        ]);
    }
}
