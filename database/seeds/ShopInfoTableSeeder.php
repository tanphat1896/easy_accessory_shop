<?php

use Illuminate\Database\Seeder;

class ShopInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('cua_hangs')->insert([
            'ten_cua_hang' => 'Easy Accessory shop',
            'email' => 'ezshop@gmail.com',
            'so_dien_thoai' => '01234569871',
            'dia_chi' => 'Ninh Kiều, Cần Thơ',
            'logo' => '/assets/images/favicon.png',
            'baokim_email' => 'entipi18@gmail.com',
            'nganluong_email' => 'entipi18@gmail.com',
            'link_fb' => '',
            'link_tawkto' => '<script type="text/javascript">var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();(function(){var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];s1.async=true;s1.src=\'https://embed.tawk.to/5ae56d01227d3d7edc24d1bd/default\';s1.charset=\'UTF-8\';s1.setAttribute(\'crossorigin\',\'*\');s0.parentNode.insertBefore(s1,s0);})();</script>',
            'wide_menu' => 1
        ]);
    }
}
