<?php

use Illuminate\Database\Seeder;

class ThongSoKyThuatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('thong_so_ky_thuats')->insert(
            ['ten_thong_so' => 'Model']
        );
        DB::table('thong_so_ky_thuats')->insert(
            ['ten_thong_so' => 'Tốc độ đọc']
        );
        DB::table('thong_so_ky_thuats')->insert(
            ['ten_thong_so' => 'Tốc độ ghi']
        );
        DB::table('thong_so_ky_thuats')->insert(
            ['ten_thong_so' => 'Kích thước']
        );
        DB::table('thong_so_ky_thuats')->insert(
            ['ten_thong_so' => 'Chuẩn giao tiếp']
        );
        DB::table('thong_so_ky_thuats')->insert(
            ['ten_thong_so' => 'Dung lượng']
        );
        DB::table('thong_so_ky_thuats')->insert(
            ['ten_thong_so' => 'Loại kết nối']
        );
        DB::table('thong_so_ky_thuats')->insert(
            ['ten_thong_so' => 'Chiều dài dây']
        );
        DB::table('thong_so_ky_thuats')->insert(
            ['ten_thong_so' => 'Tuổi thọ']
        );
        DB::table('thong_so_ky_thuats')->insert(
            ['ten_thong_so' => 'Số nút bấm']
        );
        DB::table('loai_s_p_thong_sos')->insert([
        
            ['loai_sp_id' => 1, 'thong_so_id' => 1],
            ['loai_sp_id' => 1, 'thong_so_id' => 2],
            ['loai_sp_id' => 1, 'thong_so_id' => 3],
            ['loai_sp_id' => 1, 'thong_so_id' => 4],
            ['loai_sp_id' => 1, 'thong_so_id' => 5],]
        );
    }
}
