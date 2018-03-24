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
            'ten_thuong_hieu' => 'Samsung',
            'slug' => 'samsung'
        ]);
        DB::table('loai_san_phams')->insert([
            ['ten_loai' => 'SSD'],
            ['ten_loai' => 'Keyboard']
        ]);
         $this->call(SanPhamTableSeeder::class);
    }
}
