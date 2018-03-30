<?php
/**
 * Created by PhpStorm.
 * User: TanPhat
 * Date: 27/03/2018
 * Time: 11:12 PM
 */

namespace App\Acme\Repository;


use App\GiaSanPham;
use App\Helper\ImageHelper;
use App\Helper\StringHelper;
use App\HinhAnh;
use App\LoaiSanPham;
use App\SanPham;
use App\ThuongHieu;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use PharIo\Manifest\Email;

class SanPhamRepository {
    private $reflectKey = ['th' => 'thuong_hieu_id', 'lsp' => 'loai_san_pham_id'];

    private $reflectClass = ['th' => 'ThuongHieu', 'lsp' => 'LoaiSanPham'];

    private $folderAnhSanPham = 'uploaded/img_product';

    public function getSanPhams(Request $request) {
        if ($this->filtered($request))
            return $this->getSanPhamWithFilter($request);

        return $this->indexDataNoFiltered();
    }

    private function filtered($request) {
        return !empty($request->query());
    }

    private function getSanPhamWithFilter($request) {
        $filters = $request->query();

        $condition = $this->buildWhereCondition($filters);

        $filterData = $this->getFilterDataFrom($filters);

        $sanPhams = SanPham::where($condition)->get();

        return $this->indexDataFiltered($sanPhams, $filterData);
    }

    private function buildWhereCondition($filters) {
        $conditions = [];

        foreach ($filters as $key => $value) {
            if ($value == 'all')
                continue;
            $conditions[] = [$this->reflectKey[$key], $value];
        }

        return $conditions;
    }

    private function getFilterDataFrom($filters) {
        $filterData = [];

        foreach ($filters as $key => $value) {
            if ($value == 'all')
                continue;

            $class = $this->reflectClass[$key];
            $class = "App\\$class";

            $filterData[$key] = $class::find($value);
        }

        return $filterData;
    }

    private function indexDataFiltered($sanPhams, $filterData) {
        $filtered = true;

        $thuongHieus = ThuongHieu::all();

        $loaiSanPhams = LoaiSanPham::all();

        return compact('filtered', 'sanPhams', 'thuongHieus', 'loaiSanPhams', 'filterData');
    }

    private function indexDataNoFiltered() {
        $filtered = false;

        $sanPhams = SanPham::all();

        $thuongHieus = ThuongHieu::all();

        $loaiSanPhams = LoaiSanPham::all();

        return compact('filtered', 'sanPhams', 'thuongHieus', 'loaiSanPhams');
    }

    public function getSanPham($id) {
        $sanPham = SanPham::with(['gia', 'loaiSanPham', 'thuongHieu'])->findOrFail($id);

        $thuongHieus = ThuongHieu::all();

        $loaiSanPhams = LoaiSanPham::all();

        return compact('sanPham', 'thuongHieus', 'loaiSanPhams');
    }

    public function luuAnhChiTietSanPham(UploadedFile $file, $sanPhamId) {
        $sanPham = SanPham::findOrFail($sanPhamId);

        $relativePath = ImageHelper::storeImageToStorage($file, $this->folderAnhSanPham);

        if (empty($relativePath))
            return false;

        $hinhAnh = new HinhAnh(['lien_ket' => $relativePath]);

        return $sanPham->hinhAnhs()->save($hinhAnh);
    }

    public function updateSanPham($id, $data, $anhDaiDien) {
        $sanPham = SanPham::findOrFail($id);

        $sanPham->ma_san_pham = $data['ma-san-pham'];
        $sanPham->ten_san_pham = $data['ten-san-pham'];
        $sanPham->loai_san_pham_id = $data['loai-san-pham'];
        $sanPham->thuong_hieu_id = $data['thuong-hieu'];
        $sanPham->tinh_trang = $data['tinh-trang']%2;
        $sanPham->ngay_cap_nhat = date('Y-m-d H:i:s');

        if (!empty($anhDaiDien)){
            $storePath = StringHelper::buildImageRelativePathFromProductType($sanPham->loai_san_pham_id);

            $relativePath = ImageHelper::storeImageToStorage($anhDaiDien, $storePath);

            ImageHelper::deleteImageFromStorage($sanPham->anh_dai_dien);

            $sanPham->anh_dai_dien = $relativePath;
        }

        if (GiaSanPham::giaThayDoi($data['gia'])){
            $sanPham->gia()->save(GiaSanPham::fromCurrency($data['gia']));
        }

        return $sanPham->update();
    }

    public function themSanPham(array $data, $anhDaiDien, $anhChiTiets) {

        $errors = [];
        $sanPham = new SanPham();

        $sanPham->ma_san_pham = $data['ma-san-pham'];
        $sanPham->ten_san_pham = $data['ten-san-pham'];
        $sanPham->thuong_hieu_id = $data['thuong-hieu'];
        $sanPham->loai_san_pham_id = $data['loai-san-pham'];
        $sanPham->ngay_tao = date('Y-m-d H:i:s');
        $sanPham->ngay_cap_nhat = date('Y-m-d H:i:s');


        if (!empty($anhDaiDien))
            $sanPham->anh_dai_dien = ImageHelper::storeImageToStorage(
                $anhDaiDien,
                StringHelper::buildImageRelativePathFromProductType($sanPham->loai_san_pham_id));

        if(!$sanPham->save())
            return false;
        if (!$sanPham->gia()->save(GiaSanPham::fromCurrency($data['gia'])))
            return false;

        if (!empty($anhChiTiets))
            return $this->storeAndAttachWith($sanPham, $anhChiTiets);

        return $sanPham->id;
    }

    private function storeAndAttachWith($sanPham, $anhs) {
        foreach ($anhs as $anh) {
            $link = ImageHelper::storeImageToStorage($anh, $this->folderAnhSanPham);

            if (!$sanPham->hinhAnhs()->save(new HinhAnh(['lien_ket' => $link])))
                return false;
        }

        return $sanPham->id;
    }


}