<?php

use Illuminate\Database\Seeder;

class QuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phan_quyens')->insert([
            [
                'ten_quyen' => 'Thống kê'
            ],
            [
                'ten_quyen' => 'Thương hiệu'
            ],
            [
                'ten_quyen' => 'Loại sản phẩm'
            ],
            [
                'ten_quyen' => 'Sản phẩm'
            ],
            [
                'ten_quyen' => 'Nhà cung cấp'
            ],
            [
                'ten_quyen' => 'Nhập hàng'
            ],
            [
                'ten_quyen' => 'Đơn hàng'
            ],
            [
                'ten_quyen' => 'Khuyến mãi'
            ],
            [
                'ten_quyen' => 'Nội dung'
            ],
        ]);
        DB::table('quyen_nhan_viens')->insert([
            [
                'admin_id' => 1,
                'phan_quyen_id' => 1
            ],
            [
                'admin_id' => 1,
                'phan_quyen_id' => 2
            ],
            [
                'admin_id' => 1,
                'phan_quyen_id' => 5
            ],
            [
                'admin_id' => 1,
                'phan_quyen_id' => 6
            ],
            [
                'admin_id' => 1,
                'phan_quyen_id' => 7
            ],
            [
                'admin_id' => 2,
                'phan_quyen_id' => 1
            ],
            [
                'admin_id' => 2,
                'phan_quyen_id' => 2
            ],
            [
                'admin_id' => 2,
                'phan_quyen_id' => 8
            ],
            [
                'admin_id' => 2,
                'phan_quyen_id' => 9
            ],
        ]);
    }
}
