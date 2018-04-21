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
       $amount =  $this->seedingKeyboard($amount);
       $amount =  $this->seedingPhone($amount);
    }

    private function seedingSsd() {
        $data = $this->getData();
        $ssdGroups = $this->translateData($data);
        foreach ($ssdGroups as $idx => $ssd) {
            $random = random_int(1, 100)%4;
            DB::table('san_phams')->insert([
                'id' => $idx + 1,
                'ten_san_pham' => $ssd->name,
                'so_luong' => random_int(0, 10),
                'mo_ta' => '<table border="0" cellpadding="1"><tbody><tr><td><table border="0" cellpadding="1"><tbody><tr><td><h2><strong>Ổ cứng SSD M8SeY PCIe Gen 3 x4 NVM Express</strong></h2><h2><br /><strong>Thiết kế Sink tản nhiệt &ndash; Hoạt động cực kỳ m&aacute;t mẻ</strong></h2><p>D&ograve;ng sản phẩm M8Se của Plextor được trang bị những c&ocirc;ng nghệ&nbsp;cao cấp v&agrave; ti&ecirc;n tiến nhất trong một thiết kế cực kỳ trang nh&atilde;, tinh tế với c&aacute;c r&atilde;nh gi&uacute;p tạo luồng gi&oacute; tho&aacute;t nhiệt. Bộ tản nhiệt được thiết kế theo phong c&aacute;ch xanh v&agrave; đen mang lại khả năng dẫn nhiệt tuyệt vời dựa tr&ecirc;n nguy&ecirc;n l&yacute; bức xạ nhiệt gi&uacute;p hấp thụ nhiệt b&ecirc;n trong m&aacute;y t&iacute;nh v&agrave;o truyền ra lỗ tho&aacute;t nhiệt. Điều n&agrave;y sẽ tạo hiệu ứng tốt nhất để m&aacute;y t&iacute;nh c&oacute; thể hoạt động hết c&ocirc;ng suất.</p></td><td><img src="https://memoryzone.com.vn/wp-content/uploads/2017/07/M8SeY-06.jpg" style="width:100%" /></td></tr></tbody></table><table border="0" cellpadding="1" style="width:100%"><tbody><tr><td><img src="https://memoryzone.com.vn/wp-content/uploads/2017/07/M8SeY-07.jpg" style="width:100%" /></td><td><h2><strong>Tốc độ băng th&ocirc;ng 32Gbps đ&aacute;ng kinh ngạc</strong></h2><p>D&ograve;ng ổ cứng SSD Plextor M8SeY PCIe Gen 3 x4 NVM Express được trang bị chuẩn giao tiếp tốc độ si&ecirc;u cao NVMe PCIe Gen 3x 4 mới nhất, mang lại băng th&ocirc;ng cao v&agrave; độ trễ cực thấp, cho ph&eacute;p tốc độ đọc/ghi đạt ngưỡng 2.450/1.000 MB/s v&agrave; tốc độ ngẫu nhi&ecirc;n Random 4K l&ecirc;n đến 210.000 IOPS. Cho d&ugrave; bạn d&ugrave;ng cho c&ocirc;ng việc g&igrave; th&igrave; ổ cứng SSD Plextor M8SeY PCIe Gen 3 x4 NVM Express lu&ocirc;n đ&aacute;p ứng mọi nhu cầu của bạn.</p></td></tr></tbody></table><table border="0" cellpadding="1" style="width:100%"><tbody><tr><td><h2><strong>C&ocirc;ng nghệ chip nhớ&nbsp;TLC tốc độ cao</strong></h2><p>Ổ cứng SSD Plextor M8SeY PCIe Gen 3 x4 NVM Express được trang bị chip nhớ&nbsp;TLC NAND flash, Controller Marvell 88SS1093, c&ocirc;ng nghệ hiệu chỉnh lỗi LDPC, c&ocirc;ng nghệ PlexNitro độc quyền, c&ocirc;ng nghệ PlexTurbo, tất cả kết hợp để cung cấp hiệu năng tuyệt vời, độ bền v&agrave; t&iacute;nh ổn định nhất.</p></td><td><img src="https://memoryzone.com.vn/wp-content/uploads/2017/07/M8SeY-08.jpg" style="width:100%" /></td></tr></tbody></table><table border="0" cellpadding="1" style="width:100%"><tbody><tr><td><img src="https://memoryzone.com.vn/wp-content/uploads/2017/07/M8SeY-09.jpg" style="width:100%" /></td><td><h2><strong>Chất lượng ho&agrave;n hảo của Plextor</strong></h2><p>Chất lượng của d&ograve;ng ổ&nbsp;cứng SSD Plextor M8SeY PCIe Gen 3 x4 NVM Express dựa v&agrave;o&nbsp;ti&ecirc;u chuẩn chất lượng do Plextor thiết kế; N&oacute; đ&atilde; vượt qua tất cả c&aacute;c b&agrave;i kiểm tra nghi&ecirc;m ngặt trong ph&ograve;ng th&iacute; nghiệm SSD ti&ecirc;n tiến nhất thế giới. Cơ chế kiểm tra độ bền bền của Plextor m&ocirc; phỏng một loạt c&aacute;c kịch bản đọc/ghi chuy&ecirc;n nghiệp nhằm đảm bảo sản phẩm của Plextor lu&ocirc;n hoạt động trong thời gian trung b&igrave;nh 1,5 triệu giờ (MTBF) đ&aacute;ng ngạc nhi&ecirc;n.&nbsp;Ổ cứng SSD Plextor M8SeY PCIe Gen 3 x4 NVM Express được hỗ trợ kĩ thuật miễn ph&iacute; v&agrave; chế độ bảo h&agrave;nh 3 năm lỗi kĩ thuật.</p></td></tr></tbody></table><table border="0" cellpadding="1" style="width:100%"><tbody><tr><td><h2><strong>C&ocirc;ng nghệ PlexNitro</strong></h2><p>PlexNitro, c&ocirc;ng nghệ gia tốc bộ nhớ Cache độc ​​quyền của Plextor, được ph&aacute;t triển đặc biệt cho c&aacute;c loại TLC SSD. Sử dụng bộ nhớ Ram c&ograve;n trống để tăng tối đa tốc độ. Plextor vẫn cam kết cung cấp c&aacute;c sản phẩm SSD &ldquo;Full Capacity&rdquo; với dung lượng 128GB, 256GB v&agrave; 512GB thay v&igrave; 120GB, 240GB v&agrave; 480GB.</p></td><td><img src="https://memoryzone.com.vn/wp-content/uploads/2017/07/M8SeY-10.jpg" style="width:100%" /></td></tr></tbody></table><table border="0" cellpadding="1" style="width:100%"><tbody><tr><td><img alt="M8PeG-08" src="https://memoryzone.com.vn/images/HoanVu/SSD/Plextor/M8PeG/M8PeG-08.jpg" style="height:100%; width:100%" /></td><td><h2><strong>C&ocirc;ng nghệ độc quyền</strong></h2><p><strong>&nbsp; C&ocirc;ng nghệ TrueSpeed</strong><br />&ndash; C&ocirc;ng nghệ TrueSpeed giữ hiệu suất của SSD lu&ocirc;n ở mức cao nhất trong thời gian d&agrave;i với tốc độ cao như mới sau một thời gian sử dụng v&agrave; khi dung lượng gần đầy.<br />&nbsp;&nbsp;<strong>C&ocirc;ng nghệ TrueProtect</strong><br />&ndash; C&ocirc;ng nghệ TrueProtect l&agrave; một cơ chế kiểm tra lỗi nhiều lớp hoạt động tự động bởi phần mềm. Bằng c&aacute;ch sử dụng c&aacute;c khả năng sửa lỗi ECC 128bit, gi&uacute;p n&acirc;ng cao khả năng bảo vệ dữ liệu.</p></td></tr></tbody></table></td><td>&nbsp;</td></tr></tbody></table>',
                'loai_san_pham_id' => 1,
                'thuong_hieu_id' => random_int(1, 100)%5 + 1,
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

    private function seedingKeyboard($amount) {
        $data = $this->getKeyboardData();
        $keyboards = $this->translateData($data);
        foreach ($keyboards as $idx => $keyboard) {
            DB::table('san_phams')->insert([
                'ten_san_pham' => $keyboard->name,
                'so_luong' => random_int(0, 10),
                'mo_ta' => 'Keyboard',
                'loai_san_pham_id' => 3,
                'thuong_hieu_id' => random_int(1, 100)%5 + 1,
                'slug' => \App\Helper\StringHelper::toSlug($keyboard->name),
                'ngay_tao' => date('Y-m-d H:i:s'),
                'ngay_cap_nhat' => date('Y-m-d H:i:s'),
                'tinh_trang' => 1,
                'anh_dai_dien' => 'assets/images/uploaded/products/keyboard/' . $keyboard->img,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ]);

            DB::table('gia_san_phams')->insert([
                'san_pham_id' => ++$amount,
                'ngay_cap_nhat' => date('Y-m-d H:i:s'),
                'gia' => (float)$keyboard->price,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return $amount;
    }

    private function seedingHeadphone($amount) {
        $data = $this->getHeadphoneData();
        $headphones = $this->translateData($data);
        foreach ($headphones as $idx => $headphone) {
            DB::table('san_phams')->insert([
                'ten_san_pham' => $headphone->name,
                'so_luong' => random_int(0, 10),
                'mo_ta' => 'Headphone',
                'loai_san_pham_id' => 5,
                'thuong_hieu_id' => random_int(1, 100)%5 + 1,
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

    private function seedingPhone($amount) {
        $data = $this->getPhoneData();
        $phones = $this->translateData($data);
        foreach ($phones as $idx => $phone) {
            DB::table('san_phams')->insert([
                'ten_san_pham' => $phone->name,
                'so_luong' => random_int(0, 10),
                'mo_ta' => 'Tai nghe',
                'loai_san_pham_id' => 6,
                'thuong_hieu_id' => random_int(1, 100)%5 + 1,
                'slug' => \App\Helper\StringHelper::toSlug($phone->name),
                'ngay_tao' => date('Y-m-d H:i:s'),
                'ngay_cap_nhat' => date('Y-m-d H:i:s'),
                'tinh_trang' => 1,
                'anh_dai_dien' => 'assets/images/uploaded/products/phone/' . $phone->img,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ]);
            DB::table('gia_san_phams')->insert([
                'san_pham_id' => ++$amount,
                'ngay_cap_nhat' => date('Y-m-d H:i:s'),
                'gia' => (float)$phone->price,
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
                'so_luong' => random_int(0, 10),
                'mo_ta' => 'Headphone',
                'loai_san_pham_id' => 4,
                'thuong_hieu_id' => random_int(1, 100)%5 + 1,
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
        $str = '[{"name":"B\u00e0n ph\u00edm Bosston C888 LED tr\u00ean ch\u1eef","price":"220000","img":"ban-phim-boston-c888-led.jpg"},{"name":"B\u00e0n ph\u00edm Bosston 803 gi\u1ea3 c\u01a1","price":"205000","img":"kb-bosston-k803-gia-co-chuyen-game-usb-chinh-hang1478848619.jpg"},{"name":"B\u00e0n ph\u00edm Ensoho 104","price":"195000","img":"ban-phim-enshoho-104.jpg"},{"name":"B\u00e0n ph\u00edm Genius","price":"150000","img":"ban-phim-genius.jpg"},{"name":"B\u00e0n ph\u00edm KB EBLUE","price":"190000","img":"ban-phim-kb-eblue.jpg"},{"name":"B\u00e0n ph\u00edm Vision mini","price":"80000","img":"ban-phim-vision-mini.jpg"},{"name":"B\u00e0n ph\u00edm Vision G25","price":"150000","img":"ban-phim-vision-g25.jpg"},{"name":"B\u00e0n ph\u00edm Vision G7","price":"105000","img":"ban-phim-vision-g7.jpg"},{"name":"B\u00e0n ph\u00edm game R8 1822 gi\u1ea3 c\u01a1","price":"175000","img":"ban-phim-game-r8-1822-gia-co.jpg"},{"name":"B\u00e0n ph\u00edm Motospeed K81","price":"1950000","img":"ban-phim-motospeed-k81.jpg"},{"name":"B\u00e0n ph\u00edm Rainbow Mechanical K86","price":"1950000","img":"ban-phim-rainbow-mechanical-k86.jpg"},{"name":"B\u00e0n ph\u00edm Motospeed K87","price":"2450000","img":"ban-phim-motospeed-k87.jpg"},{"name":"B\u00e0n ph\u00edm Bosston K680","price":"125000","img":"ban-phim-bosston-s680k680.jpg"},{"name":"B\u00e0n ph\u00edm Sumtax Fox 1 gi\u1ea3 c\u01a1 c\u00f3 LED","price":"375000","img":"ban-phim-sumtax-fox-1-co-led.jpg"},{"name":"B\u00e0n ph\u00edm Bosston K830","price":"90000","img":"ban-phim-bosston-k830.jpg"},{"name":"B\u00e0n ph\u00edm bluetooth KB16","price":"230000","img":"ban-phim-bluetooth-kb16.jpg"},{"name":"B\u00e0n ph\u00edm R8 1802","price":"125000","img":"ban-phim-r8-1802.jpg"},{"name":"B\u00e0n ph\u00edm A4tech si\u00eau b\u1ec1n","price":"165000","img":"ban-phim-a4tech-sieu-trau.jpg"},{"name":"B\u00e0n ph\u00edm chuy\u00ean game Vision X2","price":"220000","img":"ban-phim-may-ban-vision-x2.jpg"},{"name":"B\u00e0n ph\u00edm Acer AR 680","price":"115000","img":"acer-ar-680.jpg"},{"name":"B\u00e0n ph\u00edm Dell D-600","price":"100000","img":"dell-d-600.jpg"},{"name":"B\u00e0n ph\u00edm RDRAGS R500 gi\u1ea3 c\u01a1","price":"275000","img":"rdrags-r500.jpg"},{"name":"B\u00e0n ph\u00edm Vision X6 chuy\u00ean game","price":"175000","img":"vision-x6-game.jpg"},{"name":"B\u00e0n ph\u00edm d\u1ebbo","price":"115000","img":"banphimdeoepts.jpg"},{"name":"B\u00e0n ph\u00edm R8 1827","price":"250000","img":"giacor81827apts.jpg"},{"name":"B\u00e0n ph\u00edm Apple mini","price":"85000","img":"appleminiapts.jpg"},{"name":"Ajazz Cyborg","price":"420000","img":"ajazzcyborgsldier1bpts.jpg"},{"name":"Ajazz X5","price":"350000","img":"ajazz-x5apts.jpg"},{"name":"Motospeed K11","price":"690000","img":"motospeedk11bpts.jpg"},{"name":"Ajazz AK10","price":"495000","img":"ajazzak10apts.jpg"},{"name":"Ajazz Rhino","price":"550000","img":"ajazzrhinoapts.jpg"},{"name":"Protos E180","price":"150000","img":"protose180apts.jpg"},{"name":"B\u00e0n ph\u00edm Bosston G160 led","price":"290000","img":"thumbnail1512450655.jpg"},{"name":"B\u00e0n ph\u00edm Vision G1\/G8","price":"110000","img":"thumbnail1512454936.jpg"},{"name":"B\u00e0n ph\u00edm Colorvis R100","price":"250000","img":"thumbnail1512455834.jpg"},{"name":"B\u00e0n ph\u00edm Vision G9","price":"160000","img":"thumbnail1512456204.jpg"},{"name":"B\u00e0n ph\u00edm R8 1818","price":"175000","img":"thumbnail1512457527.jpg"},{"name":"B\u00e0n ph\u00edm R8 1831 led","price":"220000","img":"thumbnail1512457973.jpg"},{"name":"B\u00e0n ph\u00edm Colorvis C83A","price":"115000","img":"thumbnail1512458248.jpg"},{"name":"B\u00e0n ph\u00edm RDRAGS R300 led tr\u00ean ch\u1eef","price":"275000","img":"thumbnail1512458645.jpg"},{"name":"B\u00e0n ph\u00edm Motospeed K50","price":"195000","img":"thumbnail1512459025.png"},{"name":"B\u00e0n ph\u00edm Bosston 808","price":"185000","img":"thumbnail1512460640.jpg"},{"name":"B\u00e0n ph\u00edm gi\u1ea3 c\u01a1 Ensoho E-G121KR","price":"350000","img":"thumbnail1512461191.jpg"},{"name":"B\u00e0n ph\u00edm Bosston K330","price":"275000","img":"thumbnail1512462790.jpg"},{"name":"B\u00e0n ph\u00edm Rdrags 180","price":"205000","img":"thumbnail1512464241.jpg"},{"name":"B\u00e0n ph\u00edm R8 1812 mini","price":"105000","img":"thumbnail1512464602.jpg"},{"name":"B\u00e0n ph\u00edm d\u1ebbo Flexible","price":"135000","img":"thumbnail1512465000.jpg"}]';

        return $str;
    }

    private function getHeadphoneData() {
        $str = '[{"name":"Headphone Beat Solo","price":"60000","img":"headphone-beat-solo.jpg"},{"name":"Headphone bluetooth Beats S450","price":"220000","img":"headphone-bluetooth-beats-s450.jpg"},{"name":"Headphone bluetooth Beats S950","price":"350000","img":"headphone-bluetooth-beats-s950tm010.jpg"},{"name":"Headphone King Master 750","price":"95000","img":"headphone-king-master-750.jpg"},{"name":"Headphone Nubwo 3000","price":"135000","img":"headphone-nubwo-3000.jpg"},{"name":"Headphone Onto x\u00ec tin","price":"45000","img":"headphone-onto-xi-tin.jpg"},{"name":"Headphone Ovann X1","price":"110000","img":"headphone-ovan-x1.jpg"},{"name":"Headphone Ovann X2","price":"165000","img":"headphone-ovan-x2.jpg"},{"name":"Headphone V2K si\u00eau b\u1ec1n","price":"55000","img":"headphone-sieu-trau-vang-v2k.jpg"},{"name":"Headphone Each G2100 c\u00f3 LED, c\u00f3 rung","price":"550000","img":"headphone-each-g2100-blue-led-co-rung.jpg"},{"name":"Headphone Each G3100 c\u00f3 LED, c\u00f3 rung","price":"650000","img":"headphone-each-g3100-blue-led-co-rung.jpg"},{"name":"Headphone DJ Somic ST80 c\u00f3 rung","price":"400000","img":"headphone-dj-somic-st80.jpg"},{"name":"Headphone Beat Soul SL 150","price":"145000","img":"headphone-beat-soul-sl-150-beat-studio-150.jpg"},{"name":"Headphone Ovann X4","price":"175000","img":"headphone-ovann-x4.jpg"},{"name":"Headphone Beat studio MS18","price":"140000","img":"headphone-beat-studio-ms18.jpg"},{"name":"Headphone Ovann X6","price":"210000","img":"headphone-ovann-x6.jpg"},{"name":"Headphone Nubwo A6","price":"115000","img":"headphone-nubwo-a6.jpg"},{"name":"Headphone Ovann X16","price":"185000","img":"headphone-ovann-x16.jpg"},{"name":"Headphone Bluetooth Beat S900","price":"375000","img":"headphone-bluetooth-beat-s900.jpg"},{"name":"Headphone Senic ST 818","price":"95000","img":"headphone-senic-st-818.jpg"},{"name":"Headphone Dismo G901","price":"195000","img":"headphone-dismo-g901.jpg"},{"name":"Headphone bluetooth S980","price":"350000","img":"headphone-bluetooth-s980.jpg"},{"name":"Headphone Nubwo A7","price":"160000","img":"headphone-nubwo-a7.jpg"},{"name":"Headphone Samsung 133","price":"105000","img":"headphone-samsung-133.jpg"},{"name":"Headphone Shinice H6","price":"250000","img":"headphone-shinice-h6.jpg"},{"name":"Headphone Sony Extra bass XB800","price":"125000","img":"headphone-sony-extra-bass-xb800.jpg"},{"name":"Headphone QINLIAN A2 c\u00f3 LED","price":"165000","img":"headphone-qinlian-a2-led.jpg"},{"name":"Headphone Beats Polo HD","price":"150000","img":"headphone-beats-polo-hd2324.jpg"},{"name":"Headphone Huyndai HY-500","price":"105000","img":"headphone-huyndai-hy-500.jpg"},{"name":"Headphone bluetooth S970","price":"350000","img":"headphone-bluetooth-s970.jpg"},{"name":"Headphone Each GS200 led","price":"550000","img":"headphone-each-gs200-led.jpg"},{"name":"Headphone bluetooth JBL S990","price":"450000","img":"headphone-jbl-s990.jpg"},{"name":"Headphone LED Gamer TY 318","price":"205000","img":"headphone-led-gamer-ty-318.jpg"},{"name":"Headphone Ovann X11","price":"195000","img":"headphone-ovan-x11.jpg"},{"name":"Headphone Ovann X60","price":"395000","img":"headphone-ovann-x60.jpg"},{"name":"Headphone Sony AD-268","price":"135000","img":"headphone-sony-ad-268.jpg"},{"name":"Headphone Sony XB450AP","price":"130000","img":"headphone-sony-extrabass-mdr-xb450ap.jpg"},{"name":"Headphone Mix Style","price":"85000","img":"mixstylestarheadphonemusicheadbandheadphone.jpg"},{"name":"Headphone UH 140","price":"185000","img":"headphone-khong-day-uh-140.jpg"}]';

        return $str;
    }

    private function getUsbData() {
        $str = '[{"name":"Adapter thẻ nhớ","price":"5000","img":"adapter-the-nho.jpg"},{"name":"Thẻ nhớ 16G class 4","price":"145000","img":"the-nho-16g-class-4.jpg"},{"name":"Thẻ nhớ 2G class 4","price":"95000","img":"the-nho-2g-class-4.jpg"},{"name":"Thẻ nhớ 32G class 4","price":"295000","img":"the-nho-32g-class-4.jpg"},{"name":"Thẻ nhớ 4G class 4","price":"95000","img":"the-nho-4g-class-4.jpg"},{"name":"Thẻ nhớ 8G class 4","price":"115000","img":"the-nho-8g-class-4.jpg"},{"name":"Thẻ nhớ máy ảnh Toshiba 16G class 10","price":"210000","img":"the-nho-may-anh-toshiba-16g-class-10.jpg"},{"name":"Thẻ nhớ máy ảnh Toshiba 32G class 10","price":"350000","img":"the-nho-may-anh-toshiba-32g-class-10.jpg"},{"name":"Thẻ nhớ máy ảnh Toshiba 8G class 10","price":"120000","img":"the-nho-may-anh-toshiba-8g-class-10.jpg"},{"name":"Thẻ nhớ TOSHIBA 16G class 10","price":"210000","img":"the-nho-toshiba-16g-class-10.jpg"},{"name":"Thẻ nhớ TOSHIBA 32G class 10","price":"345000","img":"the-nho-toshiba-32g-class-10.jpg"},{"name":"Thẻ nhớ TOSHIBA 64G class 10","price":"600000","img":"the-nho-toshiba-64g-class-10.jpg"},{"name":"Thẻ nhớ TOSHIBA 8G class 10","price":"150000","img":"the-nho-toshiba-8g-class-10.jpg"},{"name":"USB Kingmax 8GB chính hãng","price":"155000","img":"usb-kingmax-8g.jpg"},{"name":"USB Kingston 16GB 2.0 hàng công ty","price":"95000","img":"usb-kingston-16g-2.0.jpg"},{"name":"USB Kingston 16GB 2.0 hàng nhập khẩu","price":"155000","img":"usb-kingston-16g-2.0-xin.jpg"},{"name":"USB Kingston 16GB 3.0 chính hãng","price":"195000","img":"usb-kingston-16g-3.0.jpg"},{"name":"USB kingston 32GB 2.0 hàng công ty","price":"205000","img":"usb-kingston-32g-2.0.jpg"},{"name":"USB Kingston 32GB 3.0 chính hãng","price":"350000","img":"usb-kingston-32g-3.0.jpg"},{"name":"USB Kingston 8GB 2.0 hàng nhập khẩu","price":"135000","img":"usb-kingston-8g-2.0-xin.jpg"},{"name":"USB Kingston 8GB 3.0 chính hãng","price":"150000","img":"usb-kingston-8g-3.0.jpg"},{"name":"USB Silicon Power 16GB chính hãng","price":"165000","img":"usb-silicon-power-16g.jpg"},{"name":"USB Silicon Power 4GB chính hãng","price":"99000","img":"usb-silicon-power-4g.jpg"},{"name":"USB Silicon Power 8GB chính hãng","price":"109000","img":"usb-silicon-power-8g.jpg"},{"name":"USB Sound 3D 7.1","price":"30000","img":"usb-sound-3d-7.1.jpg"},{"name":"USB Sound 5.1","price":"30000","img":"usb-sound-5.1.jpg"},{"name":"Bộ chuyển cổng USB thành cổng mạng LAN","price":"75000","img":"usb-to-lan.jpg"},{"name":"USB Toshiba 16GB chính hãng","price":"165000","img":"usb-toshiba-16g.jpg"},{"name":"USB Toshiba 32GB chính hãng","price":"250000","img":"usb-toshiba-32g.jpg"},{"name":"USB Toshiba 8GB chính hãng","price":"135000","img":"usb-toshiba-8g.jpg"},{"name":"USB Sound 4.1 hình máy bay","price":"75000","img":"usb-sound-card.jpg"},{"name":"USB 4GB 1 cổng USB và 1 cổng micro USB","price":"105000","img":"usb-otg-4g.jpg"},{"name":"USB Sound 7.1","price":"55000","img":"usb-sound-7.1-apple.jpg"},{"name":"USB Transcend 8GB hàng nhập khẩu","price":"105000","img":"usb-transcend-8gb.jpg"},{"name":"USB Sandisk 8GB chính hãng","price":"99000","img":"usb-sandisk-8g.jpg"},{"name":"USB Sony 16GB hàng nhập khẩu","price":"175000","img":"usb-sony-16g.jpg"},{"name":"USB Team 8GB chính hãng","price":"130000","img":"usb-team-mini-8g.jpg"},{"name":"USB Toshiba 8GB 3.0 hàng chính hãng","price":"145000","img":"usb-toshiba-8g-3.0.jpg"},{"name":"USB Transcend 4GB 3.0 hàng chính hãng","price":"99000","img":"usb-transcend-4gb-3.0.jpg"},{"name":"USB Kingmax 16G","price":"185000","img":"kingmax16apts.jpg"},{"name":"USB Dato 8G","price":"105000","img":"dato8gpts.jpg"},{"name":"USB Kingston SE9 32G","price":"220000","img":"kingston32gapts.jpg"},{"name":"USB Team 32G","price":"250000","img":"teamgroup32gcpts.jpg"},{"name":"USB Team 16GB","price":"150000","img":"teamc14116gbpts.jpg"}]';

        return $str;
    }

    private function getPhoneData() {
        $str = '[{"name":"Tai nghe Beat","price":"12000","img":"tai-nghe-dien-thoai-beat.jpg"},{"name":"Tai nghe Beat Tour ch\u00ednh h\u00e3ng","price":"195000","img":"tai-nghe-beat-tour-chinh-hang.jpg"},{"name":"Tai nghe bluetooth mini A8","price":"260000","img":"tai-nghe-bluetooth-apple-a8.jpg"},{"name":"Tai nghe bluetooth Bluedio DF7","price":"450000","img":"tai-nghe-bluetooth-bluedio-df7.jpg"},{"name":"Tai nghe bluetooth HD60","price":"150000","img":"tai-nghe-bluetooth-hd60.jpg"},{"name":"Tai nghe bluetooth HD90","price":"190000","img":"tai-nghe-bluetooth-hd90.jpg"},{"name":"Tai nghe bluetooth Iphone","price":"250000","img":"tai-nghe-bluetooth-iphone.jpg"},{"name":"Tai nghe bluetooth Keao V8-2","price":"275000","img":"tai-nghe-bluetooth-keao-v8-2.jpg"},{"name":"Tai nghe bluetooth Samsung S2","price":"185000","img":"tai-nghe-bluetooth-samsung-s2.jpg"},{"name":"Tai nghe bluetooth oppo V4","price":"165000","img":"oppo-v4.jpg"},{"name":"Tai nghe bluetooth Samsung N7100","price":"150000","img":"tai-nghe-bluetooth-samsung-n7100.jpg"},{"name":"Tai nghe bluetooth Samsung I9900","price":"275000","img":"tai-nghe-bluetooth-samsung-i9900.jpg"},{"name":"Tai nghe bluetooth Samsung S4","price":"195000","img":"tai-nghe-bluetooth-samsung-s4s5.jpg"},{"name":"Tai nghe Zipper d\u00e2y k\u00e9o c\u00f3 micro","price":"50000","img":"tai-nghe-day-keo-dau-ma-vang.jpg"},{"name":"Tai nghe h\u00ecnh th\u00fa d\u1ec5 th\u01b0\u01a1ng","price":"35000","img":"tai-nghe-hinh-thu-khong-micro.jpg"},{"name":"Tai nghe Iphone 5","price":"55000","img":"tai-nghe-iphone-5-loai-a-dat-luoi-xanh.jpg"},{"name":"Tai nghe Iphone 6","price":"75000","img":"tai-nghe-iphone-6.jpg"},{"name":"Tai nghe LG h\u00e0ng theo m\u00e1y","price":"55000","img":"tai-nghe-lg-hang-theo-may.jpg"},{"name":"Tai nghe Nokia h\u00e0ng theo m\u00e1y","price":"60000","img":"tai-nghe-nokia-hang-theo-may.jpg"},{"name":"Tai nghe Oppo","price":"90000","img":"tai-nghe-oppo.jpg"},{"name":"Tai nghe Samsung S4","price":"50000","img":"tai-nghe-samsung-s3-s4.jpg"},{"name":"Tai nghe Samsung S6","price":"65000","img":"tai-nghe-samsung-s6.jpg"},{"name":"Tai nghe Sony EX300AP","price":"60000","img":"tai-nghe-sony-ex300ap.jpg"},{"name":"Tai nghe Audio Technica","price":"150000","img":"tai-nghe-technica.jpg"},{"name":"Tai nghe Xiaomi Piston","price":"95000","img":"tai-nghe-xiaomi-piston.jpg"},{"name":"Tai nghe Xiaomi Piston nhi\u1ec1u m\u00e0u","price":"75000","img":"tai-nghe-xiaomi-piston-mau-dau-kim-loai.jpg"},{"name":"Tai nghe Sony Q50","price":"30000","img":"tai-nghe-sony-q50.jpg"},{"name":"Tai nghe bluetooth Sony AH2","price":"220000","img":"tai-nghe-bluetooth-sony-ah2.jpg"},{"name":"Tai nghe bluetooth Samsung S6","price":"250000","img":"tai-nghe-bluetooth-samsung-s6.jpg"},{"name":"Tai nghe Bluetooth Samsung K9","price":"125000","img":"tai-nghe-bluetooth-samsung-k9.jpg"},{"name":"Tai nghe Bluetooth IPhone L10","price":"150000","img":"tai-nghe-bluetooth-iphone-l10.jpg"},{"name":"Tai nghe Bluetooth Bluedio N2","price":"350000","img":"tai-nghe-bluetooth-bluedio-n2.jpg"},{"name":"Tai nghe bluetooth SamSung R11","price":"195000","img":"tai-nghe-bluetooth-samsung-r11.jpg"},{"name":"Tai nghe bluetooth Bluedio A99","price":"400000","img":"tai-nghe-bluedio-a99.jpg"},{"name":"Tai nghe bluetooth Bluedio Q5","price":"400000","img":"tai-nghe-bluedio-q5.jpg"},{"name":"Tai nghe bluetooth SamSung R10","price":"205000","img":"tai-nghe-bluetooth-samsung-r10.jpg"},{"name":"Tai nghe Smart X36","price":"55000","img":"tai-nghe-smart-x36.jpg"},{"name":"Tai nghe bluetooth SamSung 700+","price":"250000","img":"tai-nghe-bluetooth-samsung-700-.jpg"},{"name":"Tai nghe bluetooth HM 9200","price":"275000","img":"tai-nghe-bluetooth-hm-9200.jpg"},{"name":"Tai nghe cool cold S21","price":"75000","img":"tai-nghe-cool-cold-s21.jpg"},{"name":"Tai nghe Bluetooth Xiaomi ch\u00ednh h\u00e3ng","price":"400000","img":"tai-nghe-bluetooth-xiaomi-chinh-hang.jpg"},{"name":"Tai nghe bluetooth HBS 730","price":"180000","img":"tai-nghe-bluetooth-hbs-730.jpg"},{"name":"Tai nghe bluetooth HBS 800","price":"275000","img":"tai-nghe-bluetooth-hbs-800.jpg"},{"name":"Tai nghe bluetooth samsung H6","price":"200000","img":"tai-nghe-bluetooth-samsung-h6.jpg"},{"name":"Tai nghe Iphone nhi\u1ec1u m\u00e0u","price":"30000","img":"tai-nghe-iphone-5-nhieu-mau.jpg"},{"name":"Tai nghe HOCO Epm 02 c\u00f3 micro","price":"165000","img":"tai-nghe-hoco-epm-02-co-mic.jpg"},{"name":"Tai nghe Iphone 6 h\u00e0ng ch\u00ednh h\u00e3ng","price":"150000","img":"tai-nghe-iphone-6-logo-app.jpg"},{"name":"Tai nghe bluetooth Bluedio M2","price":"350000","img":"tai-nghe-bluetooth-bluedio-m2.jpg"},{"name":"Tai nghe Sony Hear in","price":"125000","img":"tai-nghe-sony-hear-in.jpg"},{"name":"Tai nghe Samsung S4 c\u00f3 h\u1ed9p","price":"95000","img":"tai-nghe-samsung-s4-mau-moi-co-hop.jpg"},{"name":"Tai nghe USam EJoy ch\u00ednh h\u00e3ng","price":"195000","img":"tai-nghe-usam-ejoy-chinh-hang.jpg"},{"name":"Tai nghe Samsung S6 c\u00f3 h\u1ed9p","price":"70000","img":"tai-nghe-samsung-s6-box-meka.jpg"},{"name":"Tai nghe Samsung Galaxy S7","price":"105000","img":"tai-nghe-galaxy-s7-zin-theo-may.jpg"},{"name":"Tai nghe Asus Zenfone","price":"75000","img":"tai-nghe-asus-zenfone-co-mic.jpg"},{"name":"Tai nghe Sony MDR - 75 c\u00f3 bao da","price":"85000","img":"tai-nghe-sony-mdr-75-co-bao-da.jpg"},{"name":"Tai nghe Fashion Seaw S-1","price":"75000","img":"tai-nghe-fashion-seaw-s-1.jpg"},{"name":"Tai nghe JBL T280A","price":"95000","img":"tai-nghe-jbl-t280a.jpg"},{"name":"Tai nghe Hoco M3","price":"125000","img":"tai-nghe-hoco-m3.jpg"},{"name":"Tai nghe Hoco M4","price":"125000","img":"tai-nghe-hoco-m4.jpg"},{"name":"Tai nghe Hoco M5","price":"200000","img":"tai-nghe-hoco-m5.jpg"},{"name":"Tai nghe Hoco M2","price":"150000","img":"tai-nghe-hoco-m2.jpg"},{"name":"Tai nghe Super Bass Isound SE10","price":"150000","img":"213858-tai-nghe-hieu-isound-mau-tim-se-10p-body-1.jpg"},{"name":"Tai nghe Super Bass Remax RM535","price":"250000","img":"tai-nghe-super-bass-remax-rm535.jpg"},{"name":"Tai nghe Super Bass Remax RM575","price":"275000","img":"tai-nghe-super-bass-remax-rm575.jpg"},{"name":"Tai nghe Super Bass Remax RM501","price":"200000","img":"tai-nghe-super-bass-remax-rm501.jpg"},{"name":"Tai nghe Super Bass Remax RM609D","price":"450000","img":"tai-nghe-super-bass-remax-rm609d.jpg"},{"name":"Tai nghe h\u1ed9p Hello Kitty","price":"55000","img":"tai-nghe-hop-kitty.jpg"},{"name":"Tai nghe Beats G15","price":"90000","img":"z68906339760236a388cca6ac18ff70c62aa6517d17da.jpg"},{"name":"Tai nghe bluetooth HBS 760","price":"295000","img":"tai-nghe-bluetooth-hbs-760.jpg"},{"name":"Tai nghe Sony EX220LP","price":"125000","img":"tai-nghe-sony-ex220lp.jpg"},{"name":"Tai nghe Super bass Remax 610D","price":"250000","img":"tai-nghe-super-bass-remax-610d.jpg"},{"name":"Tai nghe bluetooth Remax T8","price":"205000","img":"tai-nghe-bluetooth-remax-t8.jpg"},{"name":"Tai nghe bluetooth S6 New","price":"350000","img":"tai-nghe-bluetooth-s6-new.jpg"},{"name":"Tai nghe bluetooth N975","price":"200000","img":"tai-nghe-bluetooth-n975-4.0.jpg"},{"name":"Tai nghe bluetooth Roman X3S","price":"275000","img":"tai-nghe-bluetooth-roman-x3s.jpg"},{"name":"Tai nghe bluetooth Sport","price":"160000","img":"tai-nghe-bluetooth-sport.jpg"},{"name":"Tai nghe bluetooth NANO","price":"105000","img":"tai-nghe-bluetooth-nano-cuc-nho.jpg"},{"name":"Tai nghe bluetooth REMAX T6C","price":"450000","img":"tai-nghe-bluetooth-remax-t6c.jpg"},{"name":"Tai nghe USAMS EWAVE","price":"150000","img":"tai-nghe-usams-ewave.jpg"},{"name":"Tai Nghe iPhone 7","price":"195000","img":"tai-nghe-iphone-7-chinh-hang-apple3.jpg"},{"name":"Tai nghe Yison C5","price":"165000","img":"yisonc5bpts.jpg"},{"name":"Tai nghe Yison S50","price":"95000","img":"yisons50pts.jpg"},{"name":"Tai nghe Yison C6","price":"165000","img":"yisonc6apts.jpg"},{"name":"Tai nghe Yison CX380","price":"165000","img":"yisoncx380apts.jpg"},{"name":"Tai nghe Yison S30","price":"95000","img":"yisons30apts.jpg"},{"name":"Tai nghe Yison S20","price":"95000","img":"yisons20bpts.jpg"},{"name":"Tai nghe Yison EX200","price":"165000","img":"yisonex200cpts.jpg"},{"name":"Tai nghe Sony MDR-EX250","price":"65000","img":"sonymdrex250bpts.jpg"},{"name":"Tai nghe Usams EP-8","price":"135000","img":"usamsep8apts.jpg"},{"name":"Tai nghe bluetooth Sports S680","price":"275000","img":"sports680apts.jpg"},{"name":"Tai nghe bluetooth Pisen VN002","price":"350000","img":"pisenvn002apts.jpg"},{"name":"Tai nghe bluetooth Pisen VN003","price":"450000","img":"pisenvn003apts.jpg"},{"name":"Tai nghe Yison S40","price":"95000","img":"yisons40apts.jpg"},{"name":"Tai nghe Yison CX280","price":"95000","img":"yisoncx280apts.jpg"},{"name":"Tai nghe Yison CX390","price":"165000","img":"yisoncx390cpts.jpg"},{"name":"Tai nghe Yison N1","price":"125000","img":"yisonn1apts.jpg"},{"name":"Tai nghe Yison C8","price":"165000","img":"yisonc8bpts.jpg"},{"name":"Tai nghe Yison N2","price":"125000","img":"yisonn2apts.jpg"},{"name":"Tai nghe bluetooth Usam WT","price":"350000","img":"bluetoothusamswtepts.jpg"},{"name":"Tai nghe bluetooth V9","price":"275000","img":"philipv9apts.jpg"},{"name":"Tai nghe bluetooth HEADSET F-501","price":"275000","img":"bluetoothheadsetf501apts.jpg"},{"name":"Tai nghe Sony EX790","price":"75000","img":"sonyex790apts.jpg"},{"name":"Tai nghe bluetooth Hoco E7","price":"220000","img":"hocoe7apts.jpg"},{"name":"Tai nghe Yison CX360","price":"165000","img":"yisoncx360bpts.jpg"},{"name":"Xiaomi Piston Fresh","price":"200000","img":"xiaomipistonfreshapts.jpg"},{"name":"Tai nghe Sony EV10","price":"45000","img":"sonyev10apts.jpg"},{"name":"Tai nghe Yison D1","price":"105000","img":"yisond1apts.jpg"},{"name":"Tai nghe Yison D2","price":"105000","img":"yisond2apts.jpg"}]';
        return $str;
    }

    private function translateData($data) {
        return json_decode($data);
    }
}
