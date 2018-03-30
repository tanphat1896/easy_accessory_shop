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
        DB::table('loai_san_phams')->insert([
            ['ten_loai' => 'SSD MLC', 'slug' => 'ssd-mlc'],
            ['ten_loai' => 'HDD', 'slug' => 'hdd'],
            ['ten_loai' => 'Keyboard', 'slug' => 'keyboard']
        ]);
         $this->call([LoaiTKSeeder::class,SanPhamTableSeeder::class, ThongSoKyThuatSeeder::class]);
    }
}
