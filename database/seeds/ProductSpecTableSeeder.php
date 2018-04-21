<?php

use Illuminate\Database\Seeder;

class ProductSpecTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ssds = DB::table('san_phams')->where('loai_san_pham_id', 1)->select('id', 'ten_san_pham')->get();

        $models = ['SDSSDA-960G-G26', 'SM961 ( OEM )', 'MZ-M5E250BW', 'AS340'];
        $specs = [1, 2, 3, 4, 5, 6, 9];
        $allRows = [];
        foreach ($ssds as $ssd) {
            $matches = null;
            preg_match('/.*\s([0-9]{3}GB).*/', $ssd->ten_san_pham, $matches);
            $vals = [
                1 => $models[random_int(1, 100)%4],
                2 => '550 MB/s',
                3 => '500 MB/s',
                4 => '2.5"',
                5 => 'Sata 3 6Gb/s',
                6 => empty($matches[1]) ? '120GB': $matches[1],
                9 => random_int(80, 250) . " TB"
            ];
            foreach ($specs as $spec) {
                $allRows[] =  [
                    'san_pham_id' => $ssd->id,
                    'thong_so_id' => $spec,
                    'gia_tri' => $vals[$spec]
                ];
            }
        }
        DB::table('san_pham_thong_sos')->insert($allRows);
    }
}
