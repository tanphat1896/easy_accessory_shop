<?php

namespace App;

use App\Acme\Contract\CommonFunction;
use App\Acme\Behavior\CommonBehavior;
use App\Helper\StringHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanPham extends Model implements CommonFunction
{
    use CommonBehavior;

    private $price = -1;
    private $salePercent = -1;

    public static function taoMoiThongTin(array $data) {
        $sanPham = new self();

        $sanPham->ten_san_pham = $data['ten-san-pham'];
        $sanPham->mo_ta = $data['description'];
        $sanPham->thuong_hieu_id = $data['thuong-hieu'];
        $sanPham->loai_san_pham_id = $data['loai-san-pham'];
        $sanPham->ngay_tao = date('Y-m-d H:i:s');
        $sanPham->ngay_cap_nhat = date('Y-m-d H:i:s');
        $sanPham->slug = StringHelper::toSlug($sanPham->ten_san_pham) . (SanPham::all()->count() + 1);

        return $sanPham;

    }

    public static function capNhatThongTin($id, array $data) {
        $sanPham = SanPham::findOrFail($id);

        $sanPham->ten_san_pham = $data['ten-san-pham'];
        $sanPham->mo_ta = $data['description'];
        $sanPham->loai_san_pham_id = $data['loai-san-pham'];
        $sanPham->thuong_hieu_id = $data['thuong-hieu'];
        $sanPham->tinh_trang = $data['tinh-trang']%2;
        $sanPham->ngay_cap_nhat = date('Y-m-d H:i:s');
        $sanPham->slug = StringHelper::toSlug($sanPham->ten_san_pham) . "-$id";

        return $sanPham;
    }

    public function giaMoiNhat() {
        if ($this->price > -1)
            return $this->price;

        $this->price = $this->gia()->where('active', 1)->first()->gia;

        return $this->price;
    }

    public function gia() {
        return $this->hasMany(GiaSanPham::class)->orderBy('ngay_cap_nhat', 'desc');
    }

    public function priceChanged($price) {
        $currentPrice = $this->giaMoiNhat();
        $price = StringHelper::getNumberFromCurrency($price);

        return floor(abs($price - $currentPrice)) != 0;
    }

    public function updatePrice($price) {
        $this->deactivateOldPrice();
        $this->gia()->save(GiaSanPham::fromCurrency($price));
    }

    private function deactivateOldPrice() {
        $this->gia()->update(['active' => 0]);
    }

    public function loaiSanPham() {
        return $this->belongsTo(LoaiSanPham::class);
    }

    public function thuongHieu() {
        return $this->belongsTo(ThuongHieu::class);
    }

    public function hinhAnhs() {
        return $this->hasMany(HinhAnh::class);
    }

    public function thongSos() {
        return $this->belongsToMany(
            ThongSoKyThuat::class,
            'san_pham_thong_sos',
            'san_pham_id',
            'thong_so_id'
        )->withPivot('gia_tri');
    }

    public function sales() {
        return $this->belongsToMany(
            KhuyenMai::class,
            'chi_tiet_khuyen_mais',
            'san_pham_id',
            'khuyen_mai_id'
        )->where('ngay_ket_thuc', '>=', date('Y-m-d'))
            ->orderBy('ngay_ket_thuc', 'desc');

    }

    public function salePercent() {
        if ($this->salePercent > -1)
            return $this->salePercent;

        $sale = $this->sales()->first();

        $this->salePercent = empty($sale) ? 0 :  $sale->gia_tri_km;

        return $this->salePercent;
    }

    /**
     * Nếu có khuyến mãi sẽ lấy giá khuyến mãi, ngược lại lấy giá bán thường
     * @return float|int
     */
    public function priceSale() {
        $priceSale = $this->giaMoiNhat() * (1 - (float)$this->salePercent() / 100);
        return $priceSale;
    }

    public function backendComments() {
        return $this->hasMany(BinhLuan::class)
            ->where('parent_id', null)
            ->orderBy('created_at', 'desc');
    }

    public function comments() {
        return $this->hasMany(BinhLuan::class)
            ->where([
                ['san_pham_id', $this->id],
                ['parent_id', null],
                ['approved', true]
            ])->orderBy('created_at', 'desc');
    }


    public function ratingCount() {
        return DB::table('danh_gias')
            ->where('san_pham_id', $this->id)
            ->get()->count();
    }

    public function tinhTrang() {
        return (int)$this->tinh_trang === 1 ? 'Kinh doanh': 'Ngừng k.doanh';
    }

    public static function getFromSlug($slug) {
        return self::whereSlug($slug)->first();
    }

    public function getName() {
        return $this->ten_san_pham;
    }

    public function matchedId($id) {
        return $id == $this->id;
    }
}
