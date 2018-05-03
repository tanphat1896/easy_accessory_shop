<?php

use Illuminate\Database\Seeder;

class OrderDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalOrder = DB::table('don_hangs')->count();
        for ($i = 1; $i <= $totalOrder; $i++) {
            $totalProduct = random_int(1, 3);
            $totalCost = 0;
            $ids = [];
            for($j = 0; $j < $totalProduct; $j++) {
                $sl = random_int(1, 3);
                $dg = random_int(200000, 3000000);
                $gg = random_int(1, 20);
                $totalCost += $sl * (1 - (float)$gg/100) * $dg;
                while (in_array($id = random_int(1, 400), $ids));
                $ids[] = $id;
                DB::table('chi_tiet_don_hangs')->insert([
                    'don_hang_id' => $i,
                    'san_pham_id' => $id,
                    'so_luong' => $sl,
                    'don_gia' => $dg,
                    'giam_gia' => $gg,
                ]);
            }
            DB::table('don_hangs')->where('id', $i)->update(['tong_tien' => $totalCost]);
        }
    }
}
