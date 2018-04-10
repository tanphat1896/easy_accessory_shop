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
       $amount = $this->seedingSsd();
       $amount = $this->seedingHeadphone($amount);
       $amount = $this->seedingUsb($amount);
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
//                'diem_danh_gia' => (float)random_int(0, 10)/2.0,
                'loai_san_pham_id' => 1,
                'thuong_hieu_id' => random_int(1, 100)%3 + 1,
                'slug' => \App\Helper\StringHelper::toSlug($ssd->name),
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
        return count($ssdGroups);
    }

    private function seedingKeyboard() {
        $data = $this->getKeyboardData();
        $keyboards = $this->translateData($data);
        foreach ($keyboards as $keyboard) {
            DB::table('san_phams')->insert([
                'ten_san_pham' => $keyboard->name,
                'so_luong' => random_int(0, 10),
                'mo_ta' => 'Keyboard',
//                'diem_danh_gia' => random_int(0, 5),
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

    private function seedingHeadphone($amount) {
        $data = $this->getHeadphoneData();
        $headphones = $this->translateData($data);
        foreach ($headphones as $idx => $headphone) {
            DB::table('san_phams')->insert([
                'ten_san_pham' => $headphone->name,
                'ma_san_pham' => 'HP' . $idx,
                'so_luong' => random_int(0, 10),
                'mo_ta' => 'Headphone',
//                'diem_danh_gia' => random_int(0, 5),
                'loai_san_pham_id' => 5,
                'thuong_hieu_id' => 1,
                'slug' => \App\Helper\StringHelper::toSlug($headphone->name),
                'ngay_tao' => date('Y-m-d H:i:s'),
                'ngay_cap_nhat' => date('Y-m-d H:i:s'),
                'tinh_trang' => 1,
                'anh_dai_dien' => 'assets/images/uploaded/products/headphone/' . $headphone->img,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ]);
            DB::table('gia_san_phams')->insert([
                'san_pham_id' => ++$amount,
                'ngay_cap_nhat' => date('Y-m-d H:i:s'),
                'gia' => (float)$headphone->price,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        return $amount;
    }

    private function seedingUsb($amount) {
        $data = $this->getUsbData();
        $usbs = $this->translateData($data);
        foreach ($usbs as $idx => $usb) {
            DB::table('san_phams')->insert([
                'ten_san_pham' => $usb->name,
                'ma_san_pham' => 'USB' . $idx,
                'so_luong' => random_int(0, 10),
                'mo_ta' => 'Headphone',
//                'diem_danh_gia' => random_int(0, 5),
                'loai_san_pham_id' => 4,
                'thuong_hieu_id' => 1,
                'slug' => \App\Helper\StringHelper::toSlug($usb->name),
                'ngay_tao' => date('Y-m-d H:i:s'),
                'ngay_cap_nhat' => date('Y-m-d H:i:s'),
                'tinh_trang' => 1,
                'anh_dai_dien' => 'assets/images/uploaded/products/usb/' . $usb->img,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ]);
            DB::table('gia_san_phams')->insert([
                'san_pham_id' => ++$amount,
                'ngay_cap_nhat' => date('Y-m-d H:i:s'),
                'gia' => (float)$usb->price,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        return $amount;
    }

    private function getData() {
        $str = '[{"name":"\u00a0\u1ed4 C\u1ee9ng SSD Patriot Burst 120GB","price":"1250000","img":"6bda9784aa21a5c838083c7db1b1361a.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD SanDisk Ultra II 240GB (Up to 550\/500 MB\/s)","price":"2350000","img":"12_5_2_1.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD WD Green 120GB 3D NAND - WDS120G2G0A","price":"1249000","img":"42f720221b94a127695a40e8ee3e5a36.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD NVME M.2 120GB Apacer Z280","price":"1950000","img":"a10a0ee5e708fe42aa09a1f67f8ef306.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Sata III 2.5 Inch 250GB Crucial MX500","price":"2100000","img":"7e33450d9fd75fc1b448647d2e033597.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD ADATA ASU800 128GB","price":"1309000","img":"asu800-128-1.u579.d20161104.t165743.877388.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Sata III 2.5 inch 250GB Samsung 860 Evo MZ-76E250BW","price":"2790000","img":"c816e869a8d70033036a5547522a681d.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Transcend 220S 240GB - TS240GSSD220S","price":"2098000","img":"815k4flxgwl._sl1500__1_2_1.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD CorSair Force Series LS - CSSD-F120GBLSB - 120GB","price":"1730000","img":"51w54ytj0pl.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Kingston A400 (120GB)","price":"1299000","img":"1.u2409.d20170421.t141838.456229.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Sandisk Plus 240GB","price":"2159000","img":"1234.u689.d20160425.t125202.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Sata III 2.5 Inch 120GB Apacer AS350","price":"1150000","img":"fa10d31c17d378e89f0189a3329a903e.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD WD Blue 3D NAND 250GB WD S250G2B0A (2.5 inch)","price":"2398000","img":"d72f3bb0e56aab69df31320b5ea6860d.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Samsung SSD 850EVO M.2 500GB","price":"4899000","img":"81kqhmbwanl._sl1500_.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Sata III 2.5 Inch 240GB Apacer AS330","price":"1890000","img":"d51c4e62828dc0c2c6b3cdd9d0d2f76c.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Corsair MP500 480GB - CSSD-F480GBMP500","price":"8500000","img":"cssd-f480gbmp500_1.u579.d20170114.t100320.465076.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD ADATA ASU800 256GB","price":"2098000","img":"asu800-256-1.u579.d20161105.t101201.358136.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD WD Blue 3D NAND 1TB WD WDS100T2B0A (2.5 inch)","price":"7749000","img":"a6c1b0f81e8a7ede5f5a8f34b3c6d80e.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Samsung 850 EVO - 500GB","price":"4998000","img":"91n8tud6zll._sl1500_.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Samsung 850EVO M.2 250GB","price":"2899000","img":"81g3eyqjy_l._sl1500__2.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Crucial MX300 2050GB","price":"17200000","img":"ct2050mx300ssd1_1.u579.d20161118.t120851.238258.jpg"},{"name":"\u1ed4 C\u1ee9ng SSD Sata III 2.5 Inch 120GB Apacer AS340","price":"1150000","img":"1e3d740ec0b956e819136ea5aabf5f56.jpg"}]';

        return $str;
    }

    private function getKeyboardData() {
        $str = '[{"name":"B\u00e0n ph\u00edm Bosston C888 LED tr\u00ean ch\u1eef","price":"220000","img":"ban-phim-boston-c888-led.jpg"},{"name":"B\u00e0n ph\u00edm Bosston 803 gi\u1ea3 c\u01a1","price":"205000","img":"kb-bosston-k803-gia-co-chuyen-game-usb-chinh-hang1478848619.jpg"},{"name":"B\u00e0n ph\u00edm Bosston R100 LED","price":"320000","img":"r100000000000.jpg"},{"name":"B\u00e0n ph\u00edm Ensoho 104","price":"195000","img":"ban-phim-enshoho-104.jpg"},{"name":"B\u00e0n ph\u00edm Genius","price":"150000","img":"ban-phim-genius.jpg"},{"name":"B\u00e0n ph\u00edm KB EBLUE","price":"190000","img":"ban-phim-kb-eblue.jpg"},{"name":"B\u00e0n ph\u00edm Vision mini","price":"80000","img":"ban-phim-vision-mini.jpg"},{"name":"B\u00e0n ph\u00edm Vision G25","price":"150000","img":"ban-phim-vision-g25.jpg"},{"name":"B\u00e0n ph\u00edm Vision G7","price":"105000","img":"ban-phim-vision-g7.jpg"},{"name":"B\u00e0n ph\u00edm game R8 1822 gi\u1ea3 c\u01a1","price":"175000","img":"ban-phim-game-r8-1822-gia-co.jpg"},{"name":"B\u00e0n ph\u00edm Motospeed K81","price":"1950000","img":"ban-phim-motospeed-k81.jpg"},{"name":"B\u00e0n ph\u00edm Rainbow Mechanical K86","price":"1950000","img":"ban-phim-rainbow-mechanical-k86.jpg"},{"name":"B\u00e0n ph\u00edm Motospeed K87","price":"2450000","img":"ban-phim-motospeed-k87.jpg"},{"name":"B\u00e0n ph\u00edm Bosston K680","price":"125000","img":"ban-phim-bosston-s680k680.jpg"},{"name":"B\u00e0n ph\u00edm Sumtax Fox 1 gi\u1ea3 c\u01a1 c\u00f3 LED","price":"375000","img":"ban-phim-sumtax-fox-1-co-led.jpg"},{"name":"B\u00e0n ph\u00edm Bosston K830","price":"90000","img":"ban-phim-bosston-k830.jpg"},{"name":"B\u00e0n ph\u00edm bluetooth KB16","price":"230000","img":"ban-phim-bluetooth-kb16.jpg"},{"name":"B\u00e0n ph\u00edm R8 1802","price":"125000","img":"ban-phim-r8-1802.jpg"},{"name":"B\u00e0n ph\u00edm A4tech si\u00eau b\u1ec1n","price":"165000","img":"ban-phim-a4tech-sieu-trau.jpg"},{"name":"B\u00e0n ph\u00edm chuy\u00ean game Vision X2","price":"220000","img":"ban-phim-may-ban-vision-x2.jpg"},{"name":"B\u00e0n ph\u00edm Acer AR 680","price":"115000","img":"acer-ar-680.jpg"},{"name":"B\u00e0n ph\u00edm Dell D-600","price":"100000","img":"dell-d-600.jpg"},{"name":"B\u00e0n ph\u00edm RDRAGS R500 gi\u1ea3 c\u01a1","price":"275000","img":"rdrags-r500.jpg"},{"name":"B\u00e0n ph\u00edm Vision X6 chuy\u00ean game","price":"175000","img":"vision-x6-game.jpg"},{"name":"B\u00e0n ph\u00edm d\u1ebbo","price":"115000","img":"banphimdeoepts.jpg"},{"name":"B\u00e0n ph\u00edm R8 1827","price":"250000","img":"giacor81827apts.jpg"},{"name":"Ensoho E-GL121K gi\u1ea3 c\u01a1","price":"495000","img":"banphimensohoeg121kapts.jpg"},{"name":"B\u00e0n ph\u00edm Apple mini","price":"85000","img":"appleminiapts.jpg"},{"name":"Ajazz Cyborg","price":"420000","img":"ajazzcyborgsldier1bpts.jpg"},{"name":"Ajazz X5","price":"350000","img":"ajazz-x5apts.jpg"},{"name":"Motospeed K11","price":"690000","img":"motospeedk11bpts.jpg"},{"name":"Ajazz AK10","price":"495000","img":"ajazzak10apts.jpg"},{"name":"Ajazz Rhino","price":"550000","img":"ajazzrhinoapts.jpg"},{"name":"Protos E180","price":"150000","img":"protose180apts.jpg"},{"name":"B\u00e0n ph\u00edm Bosston G160 led","price":"290000","img":"thumbnail1512450655.jpg"},{"name":"B\u00e0n ph\u00edm Vision G1\/G8","price":"110000","img":"thumbnail1512454936.jpg"},{"name":"B\u00e0n ph\u00edm Colorvis R100","price":"250000","img":"thumbnail1512455834.jpg"},{"name":"B\u00e0n ph\u00edm Vision G9","price":"160000","img":"thumbnail1512456204.jpg"},{"name":"B\u00e0n ph\u00edm R8 1818","price":"175000","img":"thumbnail1512457527.jpg"},{"name":"B\u00e0n ph\u00edm R8 1831 led","price":"220000","img":"thumbnail1512457973.jpg"},{"name":"B\u00e0n ph\u00edm Colorvis C83A","price":"115000","img":"thumbnail1512458248.jpg"},{"name":"B\u00e0n ph\u00edm RDRAGS R300 led tr\u00ean ch\u1eef","price":"275000","img":"thumbnail1512458645.jpg"},{"name":"B\u00e0n ph\u00edm Motospeed K50","price":"195000","img":"thumbnail1512459025.png"},{"name":"B\u00e0n ph\u00edm Bosston 808","price":"185000","img":"thumbnail1512460640.jpg"},{"name":"B\u00e0n ph\u00edm gi\u1ea3 c\u01a1 Ensoho E-G121KR","price":"350000","img":"thumbnail1512461191.jpg"},{"name":"B\u00e0n ph\u00edm Bosston K330","price":"275000","img":"thumbnail1512462790.jpg"},{"name":"B\u00e0n ph\u00edm Rdrags 180","price":"205000","img":"thumbnail1512464241.jpg"},{"name":"B\u00e0n ph\u00edm R8 1812 mini","price":"105000","img":"thumbnail1512464602.jpg"},{"name":"B\u00e0n ph\u00edm d\u1ebbo Flexible","price":"135000","img":"thumbnail1512465000.jpg"}]';

        return $str;
    }

    private function getHeadphoneData() {
        $str = '[{"name":"Headphone Beat Solo","price":"60000","img":"headphone-beat-solo.jpg"},{"name":"Headphone bluetooth Beats S450","price":"220000","img":"headphone-bluetooth-beats-s450.jpg"},{"name":"Headphone bluetooth Beats S950","price":"350000","img":"headphone-bluetooth-beats-s950tm010.jpg"},{"name":"Headphone King Master 750","price":"95000","img":"headphone-king-master-750.jpg"},{"name":"Headphone Nubwo 3000","price":"135000","img":"headphone-nubwo-3000.jpg"},{"name":"Headphone Onto x\u00ec tin","price":"45000","img":"headphone-onto-xi-tin.jpg"},{"name":"Headphone Ovann X1","price":"110000","img":"headphone-ovan-x1.jpg"},{"name":"Headphone Ovann X2","price":"165000","img":"headphone-ovan-x2.jpg"},{"name":"Headphone V2K si\u00eau b\u1ec1n","price":"55000","img":"headphone-sieu-trau-vang-v2k.jpg"},{"name":"Headphone Each G2100 c\u00f3 LED, c\u00f3 rung","price":"550000","img":"headphone-each-g2100-blue-led-co-rung.jpg"},{"name":"Headphone Each G3100 c\u00f3 LED, c\u00f3 rung","price":"650000","img":"headphone-each-g3100-blue-led-co-rung.jpg"},{"name":"Headphone DJ Somic ST80 c\u00f3 rung","price":"400000","img":"headphone-dj-somic-st80.jpg"},{"name":"Headphone Beat Soul SL 150","price":"145000","img":"headphone-beat-soul-sl-150-beat-studio-150.jpg"},{"name":"Headphone Ovann X4","price":"175000","img":"headphone-ovann-x4.jpg"},{"name":"Headphone Beat studio MS18","price":"140000","img":"headphone-beat-studio-ms18.jpg"},{"name":"Headphone Ovann X6","price":"210000","img":"headphone-ovann-x6.jpg"},{"name":"Headphone Nubwo A6","price":"115000","img":"headphone-nubwo-a6.jpg"},{"name":"Headphone Ovann X16","price":"185000","img":"headphone-ovann-x16.jpg"},{"name":"Headphone Bluetooth Beat S900","price":"375000","img":"headphone-bluetooth-beat-s900.jpg"},{"name":"Headphone Senic ST 818","price":"95000","img":"headphone-senic-st-818.jpg"},{"name":"Headphone Dismo G901","price":"195000","img":"headphone-dismo-g901.jpg"},{"name":"Headphone bluetooth S980","price":"350000","img":"headphone-bluetooth-s980.jpg"},{"name":"Headphone Nubwo A7","price":"160000","img":"headphone-nubwo-a7.jpg"},{"name":"Headphone Samsung 133","price":"105000","img":"headphone-samsung-133.jpg"},{"name":"Headphone Shinice H6","price":"250000","img":"headphone-shinice-h6.jpg"},{"name":"Headphone Sony Extra bass XB800","price":"125000","img":"headphone-sony-extra-bass-xb800.jpg"},{"name":"Headphone QINLIAN A2 c\u00f3 LED","price":"165000","img":"headphone-qinlian-a2-led.jpg"},{"name":"Headphone Beats Polo HD","price":"150000","img":"headphone-beats-polo-hd2324.jpg"},{"name":"Headphone Huyndai HY-500","price":"105000","img":"headphone-huyndai-hy-500.jpg"},{"name":"Headphone bluetooth S970","price":"350000","img":"headphone-bluetooth-s970.jpg"},{"name":"Headphone Each GS200 led","price":"550000","img":"headphone-each-gs200-led.jpg"},{"name":"Headphone bluetooth JBL S990","price":"450000","img":"headphone-jbl-s990.jpg"},{"name":"Headphone LED Gamer TY 318","price":"205000","img":"headphone-led-gamer-ty-318.jpg"},{"name":"Headphone Ovann X11","price":"195000","img":"headphone-ovan-x11.jpg"},{"name":"Headphone Ovann X60","price":"395000","img":"headphone-ovann-x60.jpg"},{"name":"Headphone Sony AD-268","price":"135000","img":"headphone-sony-ad-268.jpg"},{"name":"Headphone Sony XB450AP","price":"130000","img":"headphone-sony-extrabass-mdr-xb450ap.jpg"},{"name":"Headphone Mix Style","price":"85000","img":"mixstylestarheadphonemusicheadbandheadphone.jpg"},{"name":"Headphone UH 140","price":"185000","img":"headphone-khong-day-uh-140.jpg"}]';

        return $str;
    }

    private function getUsbData() {
        $str = '[{"name":"Adapter th\u1ebb nh\u1edb","price":"5000","img":"adapter-the-nho.jpg"},{"name":"Th\u1ebb nh\u1edb 16G class 4","price":"145000","img":"the-nho-16g-class-4.jpg"},{"name":"Th\u1ebb nh\u1edb 2G class 4","price":"95000","img":"the-nho-2g-class-4.jpg"},{"name":"Th\u1ebb nh\u1edb 32G class 4","price":"295000","img":"the-nho-32g-class-4.jpg"},{"name":"Th\u1ebb nh\u1edb 4G class 4","price":"95000","img":"the-nho-4g-class-4.jpg"},{"name":"Th\u1ebb nh\u1edb 8G class 4","price":"115000","img":"the-nho-8g-class-4.jpg"},{"name":"Th\u1ebb nh\u1edb m\u00e1y \u1ea3nh Toshiba 16G class 10","price":"210000","img":"the-nho-may-anh-toshiba-16g-class-10.jpg"},{"name":"Th\u1ebb nh\u1edb m\u00e1y \u1ea3nh Toshiba 32G class 10","price":"350000","img":"the-nho-may-anh-toshiba-32g-class-10.jpg"},{"name":"Th\u1ebb nh\u1edb m\u00e1y \u1ea3nh Toshiba 8G class 10","price":"120000","img":"the-nho-may-anh-toshiba-8g-class-10.jpg"},{"name":"Th\u1ebb nh\u1edb TOSHIBA 16G class 10","price":"210000","img":"the-nho-toshiba-16g-class-10.jpg"},{"name":"Th\u1ebb nh\u1edb TOSHIBA 32G class 10","price":"345000","img":"the-nho-toshiba-32g-class-10.jpg"},{"name":"Th\u1ebb nh\u1edb TOSHIBA 64G class 10","price":"600000","img":"the-nho-toshiba-64g-class-10.jpg"},{"name":"Th\u1ebb nh\u1edb TOSHIBA 8G class 10","price":"150000","img":"the-nho-toshiba-8g-class-10.jpg"},{"name":"USB Kingmax 8GB ch\u00ednh h\u00e3ng","price":"155000","img":"usb-kingmax-8g.jpg"},{"name":"USB Kingston 16GB 2.0 h\u00e0ng c\u00f4ng ty","price":"95000","img":"usb-kingston-16g-2.0.jpg"},{"name":"USB Kingston 16GB 2.0 h\u00e0ng nh\u1eadp kh\u1ea9u","price":"155000","img":"usb-kingston-16g-2.0-xin.jpg"},{"name":"USB Kingston 16GB 3.0 ch\u00ednh h\u00e3ng","price":"195000","img":"usb-kingston-16g-3.0.jpg"},{"name":"USB kingston 32GB 2.0 h\u00e0ng c\u00f4ng ty","price":"205000","img":"usb-kingston-32g-2.0.jpg"},{"name":"USB Kingston 32GB 3.0 ch\u00ednh h\u00e3ng","price":"350000","img":"usb-kingston-32g-3.0.jpg"},{"name":"USB Kingston 8GB 2.0 h\u00e0ng nh\u1eadp kh\u1ea9u","price":"135000","img":"usb-kingston-8g-2.0-xin.jpg"},{"name":"USB Kingston 8GB 3.0 ch\u00ednh h\u00e3ng","price":"150000","img":"usb-kingston-8g-3.0.jpg"},{"name":"USB Silicon Power 16GB ch\u00ednh h\u00e3ng","price":"165000","img":"usb-silicon-power-16g.jpg"},{"name":"USB Silicon Power 4GB ch\u00ednh h\u00e3ng","price":"99000","img":"usb-silicon-power-4g.jpg"},{"name":"USB Silicon Power 8GB ch\u00ednh h\u00e3ng","price":"109000","img":"usb-silicon-power-8g.jpg"},{"name":"USB Sound 3D 7.1","price":"30000","img":"usb-sound-3d-7.1.jpg"},{"name":"USB Sound 5.1","price":"30000","img":"usb-sound-5.1.jpg"},{"name":"B\u1ed9 chuy\u1ec3n c\u1ed5ng USB th\u00e0nh c\u1ed5ng m\u1ea1ng LAN","price":"75000","img":"usb-to-lan.jpg"},{"name":"USB Toshiba 16GB ch\u00ednh h\u00e3ng","price":"165000","img":"usb-toshiba-16g.jpg"},{"name":"USB Toshiba 32GB ch\u00ednh h\u00e3ng","price":"250000","img":"usb-toshiba-32g.jpg"},{"name":"USB Toshiba 8GB ch\u00ednh h\u00e3ng","price":"135000","img":"usb-toshiba-8g.jpg"},{"name":"USB Sound 4.1 h\u00ecnh m\u00e1y bay","price":"75000","img":"usb-sound-card.jpg"},{"name":"USB 4GB 1 c\u1ed5ng USB v\u00e0 1 c\u1ed5ng micro USB","price":"105000","img":"usb-otg-4g.jpg"},{"name":"USB Sound 7.1","price":"55000","img":"usb-sound-7.1-apple.jpg"},{"name":"USB Transcend 8GB h\u00e0ng nh\u1eadp kh\u1ea9u","price":"105000","img":"usb-transcend-8gb.jpg"},{"name":"USB Sandisk 8GB ch\u00ednh h\u00e3ng","price":"99000","img":"usb-sandisk-8g.jpg"},{"name":"USB Sony 16GB h\u00e0ng nh\u1eadp kh\u1ea9u","price":"175000","img":"usb-sony-16g.jpg"},{"name":"USB Team 8GB ch\u00ednh h\u00e3ng","price":"130000","img":"usb-team-mini-8g.jpg"},{"name":"USB Toshiba 8GB 3.0 h\u00e0ng ch\u00ednh h\u00e3ng","price":"145000","img":"usb-toshiba-8g-3.0.jpg"},{"name":"USB Transcend 4GB 3.0 h\u00e0ng ch\u00ednh h\u00e3ng","price":"99000","img":"usb-transcend-4gb-3.0.jpg"},{"name":"USB Kingston SE9 4G","price":"85000","img":"kingston4gbpts.jpg"},{"name":"USB Kingston SE9 8G","price":"95000","img":"kingston8gpts.jpg"},{"name":"USB Kingston SE9 16G","price":"135000","img":"kingston16gapts.jpg"},{"name":"USB Kingmax 16G","price":"185000","img":"kingmax16apts.jpg"},{"name":"USB Dato 8G","price":"105000","img":"dato8gpts.jpg"},{"name":"USB Kingston SE9 32G","price":"220000","img":"kingston32gapts.jpg"},{"name":"USB Team 32G","price":"250000","img":"teamgroup32gcpts.jpg"},{"name":"Th\u1ebb\u00a0nh\u1edb\u00a0Team\u00a032G","price":"350000","img":"team32gclasscpts.jpg"},{"name":"Th\u1ebb \u1ea3nh Sandisk 32G","price":"350000","img":"mayanhsandiskultra32gclass10apts.jpg"},{"name":"USB Team 16GB","price":"150000","img":"teamc14116gbpts.jpg"},{"name":"USB Toshiba 4G FPT","price":"99000","img":"toshiba4gapts.jpg"}]';

        return $str;
    }

    private function translateData($data) {
        return json_decode($data);
    }
}
