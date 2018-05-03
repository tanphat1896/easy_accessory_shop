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
         $this->call([
             ProductTypeTableSeeder::class,
             BrandSeeder::class,
             MenuSeeder::class,
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
             ShopInfoTableSeeder::class,
             ProductSpecTableSeeder::class,
             OrderTableSeeder::class,
             OrderDetailTableSeeder::class,
         ]);
    }
}
