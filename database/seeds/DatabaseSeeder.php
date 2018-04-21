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
            ['ten_thuong_hieu' => 'Western Digital','slug' => 'wd'],
            ['ten_thuong_hieu' => 'Sony','slug' => 'sony'],
        ]);
        DB::table('cua_hangs')->insert([
            'ten_cua_hang' => 'Easy Accessory shop',
            'email' => 'ezshop@gmail.com',
            'so_dien_thoai' => '01234569871',
            'dia_chi' => 'Ninh Kiều, Cần Thơ',
            'logo' => '/assets/images/favicon.png',
            'wide_menu' => 1]);
        DB::table('loai_san_phams')->insert([
            ['ten_loai' => 'SSD', 'slug' => 'ssd'],
            ['ten_loai' => 'HDD', 'slug' => 'hdd'],
            ['ten_loai' => 'Bàn phím', 'slug' => 'ban-phim'],
            ['ten_loai' => 'USB', 'slug' => 'usb'],
            ['ten_loai' => 'Headphone', 'slug' => 'headphone'],
            ['ten_loai' => 'Tai nghe', 'slug' => 'tai-nghe'],
        ]);
        DB::table('menus')->insert([
            ['name' => '', 'link' => '/', 'icon' => 'home', 'loai_san_pham_id' => null],
            ['name' => 'SSD', 'link' => '/san-pham/ssd', 'icon' => 'hdd', 'loai_san_pham_id' => 1],
            ['name' => 'USB', 'link' => '/san-pham/usb', 'icon' => 'usb', 'loai_san_pham_id' => 4],
            ['name' => 'Headphone', 'link' => '/san-pham/headphone', 'icon' => 'headphones', 'loai_san_pham_id' => 5],
            ['name' => 'Bàn phím', 'link' => '/san-pham/ban-phim', 'icon' => 'keyboard', 'loai_san_pham_id' => 3],
            ['name' => 'Tai nghe', 'link' => '/san-pham/tai-nghe', 'icon' => 'headphones', 'loai_san_pham_id' => 6],
        ]);
         $this->call([
             LoaiTKSeeder::class,
             SanPhamTableSeeder::class,
             ThongSoKyThuatSeeder::class,
             TaiKhoanSeeder::class,
             NhaCungCapSeeder::class,
             NhapHangSeeder::class,
             ChiTietNhapHangSeeder::class,
             AdminSeeder::class,
             CustomerSeeder::class,
             TinTucTableSeeder::class,
             SliderTableSeeder::class,
             ProductSpecTableSeeder::class,
         ]);
    }
}
