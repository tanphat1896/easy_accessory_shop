<?php

use Illuminate\Database\Seeder;

class SanPhamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->seedingSsd();
        $this->seedingKeyboard();
    }

    private function seedingSsd() {
        $data = $this->getData();
        $ssdGroups = $this->translateData($data);
        foreach ($ssdGroups as $ssd) {
            DB::table('san_phams')->insert([
                'ten_san_pham' => $ssd->name,
                'so_luong' => random_int(0, 10),
                'mo_ta' => 'SSD',
                'diem_danh_gia' => 0,
                'loai_san_pham_id' => 1,
                'thuong_hieu_id' => 1,
                'ngay_tao' => date('Y-m-d H:i:s'),
                'ngay_cap_nhat' => date('Y-m-d H:i:s'),
                'tinh_trang' => 1,
                'anh_dai_dien' => $ssd->img

            ]);
        }
    }

    private function seedingKeyboard() {
        $data = $this->getKeyboardData();
        $keyboards = $this->translateData($data);
        foreach ($keyboards as $keyboard) {
            DB::table('san_phams')->insert([
                'ten_san_pham' => $keyboard->name,
                'so_luong' => random_int(0, 10),
                'mo_ta' => 'Keyboard',
                'diem_danh_gia' => 0,
                'loai_san_pham_id' => 2,
                'thuong_hieu_id' => 1,
                'ngay_tao' => date('Y-m-d H:i:s'),
                'ngay_cap_nhat' => date('Y-m-d H:i:s'),
                'tinh_trang' => 1,
                'anh_dai_dien' => str_replace('product', 'assets/images/uploaded/products/keyboard', $keyboard->img)

            ]);
        }
    }

    private function getData() {
        $str = '[{"name":"Ổ Cứng SSD Sata III M.2 120GB Klevv D120GAC-N600","price":"1.330.000","img":"https://vcdn.tikicdn.com/cache/200x200/ts/product/7a/b9/d8/9bc7545815325df4d1a6afca61588f96.jpg"},{"name":" Ổ Cứng SSD Patriot Burst 120GB","price":"1.250.000","img":"https://vcdn.tikicdn.com/cache/200x200/ts/product/05/ae/82/6bda9784aa21a5c838083c7db1b1361a.jpg"},{"name":"Ổ Cứng SSD SanDisk Ultra II 240GB (Up to 550/500 MB/s)","price":"2.350.000","img":"https://vcdn.tikicdn.com/cache/200x200/media/catalog/product/1/2/12_5_2_1.jpg"},{"name":"Ổ Cứng SSD WD Green 120GB 3D NAND - WDS120G2G0A","price":"1.249.000","img":"https://vcdn.tikicdn.com/cache/200x200/ts/product/d6/59/88/42f720221b94a127695a40e8ee3e5a36.jpg"},{"name":"Ổ Cứng SSD NVME M.2 120GB Apacer Z280","price":"1.950.000","img":"https://vcdn.tikicdn.com/cache/200x200/ts/product/b9/5a/b9/a10a0ee5e708fe42aa09a1f67f8ef306.jpg"},{"name":"Ổ Cứng SSD Sata III 2.5 Inch 250GB Crucial MX500","price":"2.100.000","img":"https://vcdn.tikicdn.com/cache/200x200/ts/product/e2/0f/9e/7e33450d9fd75fc1b448647d2e033597.jpg"},{"name":"Ổ Cứng SSD ADATA ASU800 128GB","price":"1.309.000","img":"https://vcdn.tikicdn.com/cache/200x200/media/catalog/product/a/s/asu800-128-1.u579.d20161104.t165743.877388.jpg"},{"name":"Ổ Cứng SSD Sata III 2.5 inch 250GB Samsung 860 Evo MZ-76E250BW","price":"2.790.000","img":"https://vcdn.tikicdn.com/cache/200x200/ts/product/88/40/ae/c816e869a8d70033036a5547522a681d.jpg"},{"name":"Ổ Cứng SSD Transcend 220S 240GB - TS240GSSD220S","price":"2.098.000","img":"https://vcdn.tikicdn.com/cache/200x200/media/catalog/product/8/1/815k4flxgwl._sl1500__1_2_1.jpg"},{"name":"Ổ Cứng SSD CorSair Force Series LS - CSSD-F120GBLSB - 120GB","price":"1.730.000","img":"https://vcdn.tikicdn.com/cache/200x200/media/catalog/product/5/1/51w54ytj0pl.jpg"},{"name":"Ổ Cứng SSD Kingston A400 (120GB)","price":"1.299.000","img":"https://vcdn.tikicdn.com/cache/200x200/media/catalog/product/1/_/1.u2409.d20170421.t141838.456229.jpg"},{"name":"Ổ Cứng SSD Sandisk Plus 240GB","price":"2.159.000","img":"https://vcdn.tikicdn.com/cache/200x200/media/catalog/product/1/2/1234.u689.d20160425.t125202.jpg"},{"name":"Ổ Cứng SSD Sata III 2.5 Inch 120GB Apacer AS350","price":"1.150.000","img":"https://vcdn.tikicdn.com/cache/200x200/ts/product/0d/75/ec/fa10d31c17d378e89f0189a3329a903e.jpg"},{"name":"Ổ Cứng SSD WD Blue 3D NAND 250GB WD S250G2B0A (2.5 inch)","price":"2.398.000","img":"https://vcdn.tikicdn.com/cache/200x200/ts/product/12/d0/9b/d72f3bb0e56aab69df31320b5ea6860d.jpg"},{"name":"Ổ Cứng SSD Samsung SSD 850EVO M.2 500GB","price":"4.899.000","img":"https://vcdn.tikicdn.com/cache/200x200/media/catalog/product/8/1/81kqhmbwanl._sl1500_.jpg"},{"name":"Ổ Cứng SSD Sata III 2.5 Inch 240GB Apacer AS330","price":"1.890.000","img":"https://vcdn.tikicdn.com/cache/200x200/ts/product/35/6b/dc/d51c4e62828dc0c2c6b3cdd9d0d2f76c.jpg"},{"name":"Ổ Cứng SSD Corsair MP500 480GB - CSSD-F480GBMP500","price":"8.500.000","img":"https://vcdn.tikicdn.com/cache/200x200/media/catalog/product/c/s/cssd-f480gbmp500_1.u579.d20170114.t100320.465076.jpg"},{"name":"Ổ Cứng SSD ADATA ASU800 256GB","price":"2.098.000","img":"https://vcdn.tikicdn.com/cache/200x200/media/catalog/product/a/s/asu800-256-1.u579.d20161105.t101201.358136.jpg"},{"name":"Ổ Cứng SSD WD Blue 3D NAND 1TB WD WDS100T2B0A (2.5 inch)","price":"7.749.000","img":"https://vcdn.tikicdn.com/cache/200x200/ts/product/cf/3d/0c/a6c1b0f81e8a7ede5f5a8f34b3c6d80e.jpg"},{"name":"Ổ Cứng SSD Samsung 850 EVO - 500GB","price":"4.998.000","img":"https://vcdn.tikicdn.com/cache/200x200/media/catalog/product/9/1/91n8tud6zll._sl1500_.jpg"},{"name":"Ổ Cứng SSD Samsung 850EVO M.2 250GB","price":"2.899.000","img":"https://vcdn.tikicdn.com/cache/200x200/media/catalog/product/8/1/81g3eyqjy_l._sl1500__2.jpg"},{"name":"Ổ Cứng SSD Crucial MX300 2050GB","price":"17.200.000","img":"https://vcdn.tikicdn.com/cache/200x200/media/catalog/product/c/t/ct2050mx300ssd1_1.u579.d20161118.t120851.238258.jpg"},{"name":"Ổ Cứng SSD Sata III 2.5 Inch 120GB Apacer AS340","price":"1.150.000","img":"https://vcdn.tikicdn.com/cache/200x200/ts/product/c5/c0/70/1e3d740ec0b956e819136ea5aabf5f56.jpg"}]';

        return $str;
    }

    private function getKeyboardData() {
        $str = '[{"name":"Bàn phím Bosston C888 LED trên chữ","price":"220.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20Boston%20C888%20Led.jpg"},{"name":"Bàn phím Bosston 803 giả cơ","price":"205.000đ","img":"product/kb-bosston-k803-gia-co-chuyen-game-usb-chinh-hang1478848619.jpg"},{"name":"Bàn phím Bosston R100 LED","price":"320.000đ","img":"product/R100000000000.jpg"},{"name":"Bàn phím Ensoho 104","price":"195.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20Enshoho%20104.jpg"},{"name":"Bàn phím Genius","price":"150.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20Genius.jpg"},{"name":"Bàn phím KB EBLUE","price":"190.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20KB%20EBLUE.jpg"},{"name":"Bàn phím Vision mini","price":"80.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20vision%20mini.jpg"},{"name":"Bàn phím Vision G25","price":"150.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20Vision%20G25.jpg"},{"name":"Bàn phím Vision G7","price":"105.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20Vision%20G7.jpg"},{"name":"Bàn phím game R8 1822 giả cơ","price":"175.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20game%20R8%201822%20gi%E1%BA%A3%20c%C6%A1.jpg"},{"name":"Bàn phím Motospeed K81","price":"1.950.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20Motospeed%20K81.jpg"},{"name":"Bàn phím Rainbow Mechanical K86","price":"1.950.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20Rainbow%20Mechanical%20K86.jpg"},{"name":"Bàn phím Motospeed K87","price":"2.450.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20Motospeed%20K87.jpg"},{"name":"Bàn phím Bosston K680","price":"125.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20BOSSTON%20S680,K680.jpg"},{"name":"Bàn phím Sumtax Fox 1 giả cơ có LED","price":"375.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20Sumtax%20Fox%201%20c%C3%B3%20Led.jpg"},{"name":"Bàn phím Bosston K830","price":"90.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20BOSSTON%20K830.jpg"},{"name":"Bàn phím bluetooth KB16","price":"230.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20bluetooth%20KB16.jpg"},{"name":"Bàn phím R8 1802","price":"125.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20R8%201802.jpg"},{"name":"Bàn phím A4tech siêu bền","price":"165.000đ","img":"product/B%C3%A0n%20ph%C3%ADm%20A4tech%20si%C3%AAu%20tr%C3%A2u.jpg"},{"name":"Bàn phím chuyên game Vision X2","price":"220.000đ","img":"product/ban-phim-may-ban-vision-x2.jpg"},{"name":"Bàn phím Acer AR 680","price":"115.000đ","img":"product/Acer%20AR%20680.jpg"},{"name":"Bàn phím Dell D-600","price":"100.000đ","img":"product/Dell%20D-600.jpg"},{"name":"Bàn phím RDRAGS R500 giả cơ","price":"275.000đ","img":"product/RDRAGS%20R500.jpg"},{"name":"Bàn phím Vision X6 chuyên game","price":"175.000đ","img":"product/Vision%20X6%20game.jpg"},{"name":"Bàn phím dẻo","price":"115.000đ","img":"product/banphimdeoepts.jpg"},{"name":"Bàn phím R8 1827","price":"250.000đ","img":"product/giacor81827apts.jpg"},{"name":"Ensoho E-GL121K giả cơ","price":"495.000đ","img":"product/banphimensohoEG121Kapts.jpg"},{"name":"Bàn phím Apple mini","price":"85.000đ","img":"product/appleminiapts.jpg"},{"name":"Ajazz Cyborg","price":"420.000đ","img":"product/ajazzcyborgsldier1bpts.jpg"},{"name":"Ajazz X5","price":"350.000đ","img":"product/ajazz%20X5apts.jpg"},{"name":"Motospeed K11","price":"690.000đ","img":"product/motospeedk11bpts.jpg"},{"name":"Ajazz AK10","price":"495.000đ","img":"product/ajazzak10apts.jpg"},{"name":"Ajazz Rhino","price":"550.000đ","img":"product/ajazzrhinoapts.jpg"},{"name":"Protos E180","price":"150.000đ","img":"product/protose180apts.jpg"},{"name":"Bàn phím Bosston G160 led","price":"290.000đ","img":"product/thumbnail_1512450655.jpg"},{"name":"Bàn phím Vision G1/G8","price":"110.000đ","img":"product/thumbnail_1512454936.jpg"},{"name":"Bàn phím Colorvis R100","price":"250.000đ","img":"product/thumbnail_1512455834.jpg"},{"name":"Bàn phím Vision G9","price":"160.000đ","img":"product/thumbnail_1512456204.jpg"},{"name":"Bàn phím R8 1818","price":"175.000đ","img":"product/thumbnail_1512457527.jpg"},{"name":"Bàn phím R8 1831 led","price":"220.000đ","img":"product/thumbnail_1512457973.jpg"},{"name":"Bàn phím Colorvis C83A","price":"115.000đ","img":"product/thumbnail_1512458248.jpg"},{"name":"Bàn phím RDRAGS R300 led trên chữ","price":"275.000đ","img":"product/thumbnail_1512458645.jpg"},{"name":"Bàn phím Motospeed K50","price":"195.000đ","img":"product/thumbnail_1512459025.png"},{"name":"Bàn phím Bosston 808","price":"185.000đ","img":"product/thumbnail_1512460640.jpg"},{"name":"Bàn phím giả cơ Ensoho E-G121KR","price":"350.000đ","img":"product/thumbnail_1512461191.jpg"},{"name":"Bàn phím Bosston K330","price":"275.000đ","img":"product/thumbnail_1512462790.jpg"},{"name":"Bàn phím Rdrags 180","price":"205.000đ","img":"product/thumbnail_1512464241.jpg"},{"name":"Bàn phím R8 1812 mini","price":"105.000đ","img":"product/thumbnail_1512464602.jpg"},{"name":"Bàn phím dẻo Flexible","price":"135.000đ","img":"product/thumbnail_1512465000.jpg"}]';

        return $str;
    }

    private function translateData($data) {
        return json_decode($data);
    }
}
