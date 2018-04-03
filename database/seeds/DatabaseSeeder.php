<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thuong_hieus')->insert([
            ['ten_thuong_hieu' => 'Samsung','slug' => 'samsung'],
            ['ten_thuong_hieu' => 'Sandisk','slug' => 'sandisk'],
            ['ten_thuong_hieu' => 'Transcend','slug' => 'transcend'],
        ]);
        DB::table('cua_hangs')->insert([
            'ten_cua_hang' => 'Easy Accessory shop',
            'email' => 'ezshop@gmail.com',
            'so_dien_thoai' => '0123456987',
            'dia_chi' => 'Ninh Kiều, Cần Thơ',
            'logo' => '/',
            'wide_menu' => 1]);
        DB::table('loai_san_phams')->insert([
            ['ten_loai' => 'SSD', 'slug' => 'ssd'],
            ['ten_loai' => 'HDD', 'slug' => 'hdd'],
            ['ten_loai' => 'Keyboard', 'slug' => 'keyboard'],
            ['ten_loai' => 'USB', 'slug' => 'usb'],
            ['ten_loai' => 'Headphone', 'slug' => 'headphone'],
        ]);
        DB::table('menus')->insert([
            ['name' => 'Home', 'link' => '/', 'icon' => 'home', 'loai_san_pham_id' => null],
            ['name' => 'SSD', 'link' => '/san-pham/ssd', 'icon' => 'hdd', 'loai_san_pham_id' => 1],
            ['name' => 'USB', 'link' => '/san-pham/usb', 'icon' => 'usb', 'loai_san_pham_id' => 4],
            ['name' => 'Headphone', 'link' => '/san-pham/headphone', 'icon' => 'headphones', 'loai_san_pham_id' => 5],
        ]);
         $this->call([
             LoaiTKSeeder::class,
             SanPhamTableSeeder::class,
             ThongSoKyThuatSeeder::class,
             TaiKhoanSeeder::class,
             NhaCungCapSeeder::class
         ]);
    }
}
