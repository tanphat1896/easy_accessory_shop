<?php

use Illuminate\Database\Seeder;

class ChiTietNhapHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('chi_tiet_phieu_nhaps')->insert([
//           'phieu_nhap_id' => 1,
//            'san_pham_id' => 1,
//            'so_luong' => 10,
//            'so_luong_cap_nhat' => 10,
//            'don_gia' => 50000
//        ]);
//        DB::table('chi_tiet_phieu_nhaps')->insert([
//            'phieu_nhap_id' => 1,
//            'san_pham_id' => 4,
//            'so_luong' => 4,
//            'so_luong_cap_nhat' => 4,
//            'don_gia' => 30000
//        ]);
//        DB::table('chi_tiet_phieu_nhaps')->insert([
//            'phieu_nhap_id' => 1,
//            'san_pham_id' => 6,
//            'so_luong' => 13,
//            'so_luong_cap_nhat' => 13,
//            'don_gia' => 60000
//        ]);
//        DB::table('chi_tiet_phieu_nhaps')->insert([
//            'phieu_nhap_id' => 1,
//            'san_pham_id' => 3,
//            'so_luong' => 20,
//            'so_luong_cap_nhat' => 20,
//            'don_gia' => 90000
//        ]);

        $totalReceipt = DB::table('phieu_nhaps')->count();
        for ($i = 1; $i <= $totalReceipt; $i++) {
            if (empty(\App\PhieuNhap::find($i)->phieu_nhap_id))
            {
                continue;
            }
            $totalProduct = 3;
            $ids = [];
            for($j = 0; $j < $totalProduct; $j++) {
                $sl = random_int(5, 20);
                $dg = random_int(20000, 1000000);
                $id = random_int(1, 400);
                while (in_array($id = random_int(1, 400), $ids));
                $ids[] = $id;
                DB::table('chi_tiet_phieu_nhaps')->insert([
                    'phieu_nhap_id' => $i,
                    'san_pham_id' => $id,
                    'so_luong' => $sl,
                    'so_luong_cap_nhat' => $sl,
                    'don_gia' => $dg,
                    'da_xoa' => 0
                ]);
            }
        }
        $products = DB::table('chi_tiet_phieu_nhaps')
            ->selectRaw('san_pham_id as id, sum(so_luong) as amount')
            ->groupBy('san_pham_id')->get();

        foreach ($products as $product) {
            DB::table('san_phams')
                ->where('id', $product->id)
                ->update(['so_luong' => $product->amount]);
        }
    }
}
