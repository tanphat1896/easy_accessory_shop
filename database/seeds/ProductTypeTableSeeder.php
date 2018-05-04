<?php

use Illuminate\Database\Seeder;

class ProductTypeTableSeeder extends Seeder
{
    const TYPES = ["SSD", "USB", "Headphone", "Chuột", "Bàn phím", "Tai nghe", "RAM", "Đế tản nhiệt"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [];
        foreach (self::TYPES as $idx => $type) {
            $rows[] = [
                'id' => $idx + 1,
                'ten_loai' => $type,
                'slug' => \App\Helper\StringHelper::toSlug($type)
            ];
        }
        DB::table('loai_san_phams')->insert($rows);
    }
}
