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
       $this->seedingSsd();
        // $this->seedingKeyboard();
    }

    private function seedingSsd() {
        $data = $this->getData();
        $ssdGroups = $this->translateData($data);
        foreach ($ssdGroups as $idx => $ssd) {
            DB::table('san_phams')->insert([
                'id' => $idx + 1,
                'ma_san_pham' => 'SSD' . $idx,
                'ten_san_pham' => $ssd->name,
                'so_luong' => random_int(0, 10),
                'mo_ta' => 'SSD',
                'diem_danh_gia' => (float)random_int(0, 10)/2.0,
                'loai_san_pham_id' => random_int(1, 100)%2 + 1,
                'thuong_hieu_id' => random_int(1, 100)%3 + 1,
                'ngay_tao' => date('Y-m-d H:i:s'),
                'ngay_cap_nhat' => date('Y-m-d H:i:s'),
                'tinh_trang' => 1,
                'anh_dai_dien' => 'assets/images/uploaded/products/ssd/' . $ssd->img,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            DB::table('gia_san_phams')->insert([
                'san_pham_id' => $idx + 1,
                'ngay_cap_nhat' => date('Y-m-d H:i:s'),
                'gia' => (float)$ssd->price,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
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
                'diem_danh_gia' => random_int(0, 5),
                'loai_san_pham_id' => 2,
                'thuong_hieu_id' => 1,
                'ngay_tao' => date('Y-m-d H:i:s'),
                'ngay_cap_nhat' => date('Y-m-d H:i:s'),
                'tinh_trang' => 1,
                'anh_dai_dien' => 'assets/images/uploaded/products/keyboard/' . $keyboard->img,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ]);
        }
    }

    private function getData() {
        $str = '[{"name":"\u1ed4 C\u1ee9ng SSD Sata III M.2 120GB Klevv D120GAC-N600","price":"1330000","img":"9bc7545815325df4d1a6afca61588f96.jpg"},{"name":"\u00a0\u1ed4 C\u1ee9ng SSD Patriot Burst 120GB","price":"1250000","img":"6bda9784aa21a5c838083c7db1b1361a.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD SanDisk Ultra II 240GB (Up to 550\/500 MB\/s)","price":"2350000","img":"12_5_2_1.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD WD Green 120GB 3D NAND - WDS120G2G0A","price":"1249000","img":"42f720221b94a127695a40e8ee3e5a36.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD NVME M.2 120GB Apacer Z280","price":"1950000","img":"a10a0ee5e708fe42aa09a1f67f8ef306.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Sata III 2.5 Inch 250GB Crucial MX500","price":"2100000","img":"7e33450d9fd75fc1b448647d2e033597.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD ADATA ASU800 128GB","price":"1309000","img":"asu800-128-1.u579.d20161104.t165743.877388.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Sata III 2.5 inch 250GB Samsung 860 Evo MZ-76E250BW","price":"2790000","img":"c816e869a8d70033036a5547522a681d.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Transcend 220S 240GB - TS240GSSD220S","price":"2098000","img":"815k4flxgwl._sl1500__1_2_1.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD CorSair Force Series LS - CSSD-F120GBLSB - 120GB","price":"1730000","img":"51w54ytj0pl.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Kingston A400 (120GB)","price":"1299000","img":"1.u2409.d20170421.t141838.456229.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Sandisk Plus 240GB","price":"2159000","img":"1234.u689.d20160425.t125202.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Sata III 2.5 Inch 120GB Apacer AS350","price":"1150000","img":"fa10d31c17d378e89f0189a3329a903e.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD WD Blue 3D NAND 250GB WD S250G2B0A (2.5 inch)","price":"2398000","img":"d72f3bb0e56aab69df31320b5ea6860d.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Samsung SSD 850EVO M.2 500GB","price":"4899000","img":"81kqhmbwanl._sl1500_.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Sata III 2.5 Inch 240GB Apacer AS330","price":"1890000","img":"d51c4e62828dc0c2c6b3cdd9d0d2f76c.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Corsair MP500 480GB - CSSD-F480GBMP500","price":"8500000","img":"cssd-f480gbmp500_1.u579.d20170114.t100320.465076.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD ADATA ASU800 256GB","price":"2098000","img":"asu800-256-1.u579.d20161105.t101201.358136.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD WD Blue 3D NAND 1TB WD WDS100T2B0A (2.5 inch)","price":"7749000","img":"a6c1b0f81e8a7ede5f5a8f34b3c6d80e.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Samsung 850 EVO - 500GB","price":"4998000","img":"91n8tud6zll._sl1500_.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Samsung 850EVO M.2 250GB","price":"2899000","img":"81g3eyqjy_l._sl1500__2.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Crucial MX300 2050GB","price":"17200000","img":"ct2050mx300ssd1_1.u579.d20161118.t120851.238258.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Sata III 2.5 Inch 120GB Apacer AS340","price":"1150000","img":"1e3d740ec0b956e819136ea5aabf5f56.jpg"}]';

        return $str;
    }

    private function getKeyboardData() {
        $str = '[{"name":"B\u00e0n ph\u00edm Bosston C888 LED tr\u00ean ch\u1eef","price":"220000","img":"ban-phim-boston-c888-led.jpg"},{"name":"B\u00e0n ph\u00edm Bosston 803 gi\u1ea3 c\u01a1","price":"205000","img":"kb-bosston-k803-gia-co-chuyen-game-usb-chinh-hang1478848619.jpg"},{"name":"B\u00e0n ph\u00edm Bosston R100 LED","price":"320000","img":"r100000000000.jpg"},{"name":"B\u00e0n ph\u00edm Ensoho 104","price":"195000","img":"ban-phim-enshoho-104.jpg"},{"name":"B\u00e0n ph\u00edm Genius","price":"150000","img":"ban-phim-genius.jpg"},{"name":"B\u00e0n ph\u00edm KB EBLUE","price":"190000","img":"ban-phim-kb-eblue.jpg"},{"name":"B\u00e0n ph\u00edm Vision mini","price":"80000","img":"ban-phim-vision-mini.jpg"},{"name":"B\u00e0n ph\u00edm Vision G25","price":"150000","img":"ban-phim-vision-g25.jpg"},{"name":"B\u00e0n ph\u00edm Vision G7","price":"105000","img":"ban-phim-vision-g7.jpg"},{"name":"B\u00e0n ph\u00edm game R8 1822 gi\u1ea3 c\u01a1","price":"175000","img":"ban-phim-game-r8-1822-gia-co.jpg"},{"name":"B\u00e0n ph\u00edm Motospeed K81","price":"1950000","img":"ban-phim-motospeed-k81.jpg"},{"name":"B\u00e0n ph\u00edm Rainbow Mechanical K86","price":"1950000","img":"ban-phim-rainbow-mechanical-k86.jpg"},{"name":"B\u00e0n ph\u00edm Motospeed K87","price":"2450000","img":"ban-phim-motospeed-k87.jpg"},{"name":"B\u00e0n ph\u00edm Bosston K680","price":"125000","img":"ban-phim-bosston-s680k680.jpg"},{"name":"B\u00e0n ph\u00edm Sumtax Fox 1 gi\u1ea3 c\u01a1 c\u00f3 LED","price":"375000","img":"ban-phim-sumtax-fox-1-co-led.jpg"},{"name":"B\u00e0n ph\u00edm Bosston K830","price":"90000","img":"ban-phim-bosston-k830.jpg"},{"name":"B\u00e0n ph\u00edm bluetooth KB16","price":"230000","img":"ban-phim-bluetooth-kb16.jpg"},{"name":"B\u00e0n ph\u00edm R8 1802","price":"125000","img":"ban-phim-r8-1802.jpg"},{"name":"B\u00e0n ph\u00edm A4tech si\u00eau b\u1ec1n","price":"165000","img":"ban-phim-a4tech-sieu-trau.jpg"},{"name":"B\u00e0n ph\u00edm chuy\u00ean game Vision X2","price":"220000","img":"ban-phim-may-ban-vision-x2.jpg"},{"name":"B\u00e0n ph\u00edm Acer AR 680","price":"115000","img":"acer-ar-680.jpg"},{"name":"B\u00e0n ph\u00edm Dell D-600","price":"100000","img":"dell-d-600.jpg"},{"name":"B\u00e0n ph\u00edm RDRAGS R500 gi\u1ea3 c\u01a1","price":"275000","img":"rdrags-r500.jpg"},{"name":"B\u00e0n ph\u00edm Vision X6 chuy\u00ean game","price":"175000","img":"vision-x6-game.jpg"},{"name":"B\u00e0n ph\u00edm d\u1ebbo","price":"115000","img":"banphimdeoepts.jpg"},{"name":"B\u00e0n ph\u00edm R8 1827","price":"250000","img":"giacor81827apts.jpg"},{"name":"Ensoho E-GL121K gi\u1ea3 c\u01a1","price":"495000","img":"banphimensohoeg121kapts.jpg"},{"name":"B\u00e0n ph\u00edm Apple mini","price":"85000","img":"appleminiapts.jpg"},{"name":"Ajazz Cyborg","price":"420000","img":"ajazzcyborgsldier1bpts.jpg"},{"name":"Ajazz X5","price":"350000","img":"ajazz-x5apts.jpg"},{"name":"Motospeed K11","price":"690000","img":"motospeedk11bpts.jpg"},{"name":"Ajazz AK10","price":"495000","img":"ajazzak10apts.jpg"},{"name":"Ajazz Rhino","price":"550000","img":"ajazzrhinoapts.jpg"},{"name":"Protos E180","price":"150000","img":"protose180apts.jpg"},{"name":"B\u00e0n ph\u00edm Bosston G160 led","price":"290000","img":"thumbnail1512450655.jpg"},{"name":"B\u00e0n ph\u00edm Vision G1\/G8","price":"110000","img":"thumbnail1512454936.jpg"},{"name":"B\u00e0n ph\u00edm Colorvis R100","price":"250000","img":"thumbnail1512455834.jpg"},{"name":"B\u00e0n ph\u00edm Vision G9","price":"160000","img":"thumbnail1512456204.jpg"},{"name":"B\u00e0n ph\u00edm R8 1818","price":"175000","img":"thumbnail1512457527.jpg"},{"name":"B\u00e0n ph\u00edm R8 1831 led","price":"220000","img":"thumbnail1512457973.jpg"},{"name":"B\u00e0n ph\u00edm Colorvis C83A","price":"115000","img":"thumbnail1512458248.jpg"},{"name":"B\u00e0n ph\u00edm RDRAGS R300 led tr\u00ean ch\u1eef","price":"275000","img":"thumbnail1512458645.jpg"},{"name":"B\u00e0n ph\u00edm Motospeed K50","price":"195000","img":"thumbnail1512459025.png"},{"name":"B\u00e0n ph\u00edm Bosston 808","price":"185000","img":"thumbnail1512460640.jpg"},{"name":"B\u00e0n ph\u00edm gi\u1ea3 c\u01a1 Ensoho E-G121KR","price":"350000","img":"thumbnail1512461191.jpg"},{"name":"B\u00e0n ph\u00edm Bosston K330","price":"275000","img":"thumbnail1512462790.jpg"},{"name":"B\u00e0n ph\u00edm Rdrags 180","price":"205000","img":"thumbnail1512464241.jpg"},{"name":"B\u00e0n ph\u00edm R8 1812 mini","price":"105000","img":"thumbnail1512464602.jpg"},{"name":"B\u00e0n ph\u00edm d\u1ebbo Flexible","price":"135000","img":"thumbnail1512465000.jpg"}]';

        return $str;
    }

    private function translateData($data) {
        return json_decode($data);
    }
}
