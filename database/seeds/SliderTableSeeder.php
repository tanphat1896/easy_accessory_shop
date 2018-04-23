<?php

use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            ['hinh_anh' => '/assets/images/default-slider/slide1.png'],
            ['hinh_anh' => '/assets/images/default-slider/slide2.png'],
            ['hinh_anh' => '/assets/images/default-slider/slide3.jpg'],
        ]);
    }
}
