<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    const BRANDS = [
        "Dell", "OKI", "Crucial", "Toshiba", "SanDisk", "ADATA", "Microsoft", "Lenovo",
        "WD", "Brother", "Canon", "Media Ink", "MSI", "Asus", "Ricoh", "Samsung", "Apple",
        "Acer", "LG", "Orico", "Bone", "Corsair", "AOC", "AcBel", "Apacer", "Logitech", "Rapoo",
        "Seagate", "BenQ", "HP", "Promate", "Belkin", "POPSOCKETS", "D-Link", "Bagi", "Microlab",
        "Audio-technica", "Dada", "Anker", "Spigen", "Energizer", "Sony", "Sennheiser", "Nillkin",
        "Orico", "Hoco", "JBL", "TP-Link", "Linksys", "Joyroom", "Ringke", "UAG", "SoundMax",
        "Logitech", "Razer", "Ugreen", "Rock", "FASHION CASE", "TotoLink", "OEM", "Kingston", "Beat",
        "Boston", "Mitsumi", "Newmen", "Pariot", "Transcend"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [];

        foreach (self::BRANDS as $idx => $brand) {
            $rows[] = [
                'ten_thuong_hieu' => $brand,
                'slug' => \App\Helper\StringHelper::toSlug($brand)
            ];
        }

        DB::table('thuong_hieus')->insert($rows);
    }
}
