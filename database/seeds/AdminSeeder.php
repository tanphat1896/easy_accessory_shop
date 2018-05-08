<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('admins')->insert([
            [
                'name' => 'Mr. Blo bla',
                'email' => 'blabla@gmail.com',
                'phone' => '01639883047',
                'username' => 'blabla',
                'password' => bcrypt('111111'),
                'vai_tro' => 0
            ],
            [
                'name' => 'Nguyễn Đình Trọng',
                'email' => 'nguyentrongcp@gmail.com',
                'phone' => '01639883047',
                'username' => 'nguyentrong',
                'password' => bcrypt('111111'),
                'vai_tro' => 1
            ],
            [
                'name' => 'Lý Trường Giang',
                'email' => 'ltgiang@gmail.com',
                'phone' => '01639883047',
                'username' => 'ltgiang',
                'password' => bcrypt('111111'),
                'vai_tro' => 1
            ],
            [
                'name' => 'Nguyễn Văn Lộc',
                'email' => 'nvloc@gmail.com',
                'phone' => '01639883047',
                'username' => 'nvloc',
                'password' => bcrypt('111111'),
                'vai_tro' => 1
            ],
            [
                'name' => 'Phạm Hoài An',
                'email' => 'phoaian@gmail.com',
                'phone' => '01639883047',
                'username' => 'phoaian',
                'password' => bcrypt('111111'),
                'vai_tro' => 1
            ],
            [
                'name' => 'Phan Văn Thành',
                'email' => 'pvthanh@gmail.com',
                'phone' => '01639883047',
                'username' => 'pvthanh',
                'password' => bcrypt('111111'),
                'vai_tro' => 1
            ],
            [
                'name' => 'Nguyễn Văn Tài',
                'email' => 'nvantai@gmail.com',
                'phone' => '01639883047',
                'username' => 'nvantai',
                'password' => bcrypt('111111'),
                'vai_tro' => 1
            ],
            [
                'name' => 'La Thị Kiều Oanh',
                'email' => 'ltkoanh@gmail.com',
                'phone' => '01639883047',
                'username' => 'ltkoanh',
                'password' => bcrypt('111111'),
                'vai_tro' => 1
            ],
            [
                'name' => 'Phan Thị Kiều Loan',
                'email' => 'ptkloan@gmail.com',
                'phone' => '01639883047',
                'username' => 'ptkloan',
                'password' => bcrypt('111111'),
                'vai_tro' => 1
            ],
            [
                'name' => 'Đỗ Việt Hùng',
                'email' => 'dvhung@gmail.com',
                'phone' => '01639883047',
                'username' => 'dvhung',
                'password' => bcrypt('111111'),
                'vai_tro' => 1
            ]
        ]);
    }
}
