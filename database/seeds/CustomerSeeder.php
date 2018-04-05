<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name' => 'Nguyễn Đình Trọng',
            'email' => 'nguyentrongcp@gmail.com',
            'phone' => '01639883047',
            'username' => 'nguyentrong',
            'password' => bcrypt('111111')
        ]);
    }
}
