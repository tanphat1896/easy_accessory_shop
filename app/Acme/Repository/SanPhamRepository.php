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
    private $sanPham;

    private $sanPhams;

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

        $this->sanPhams = SanPham::where($condition)->get();

        return $this->indexDataFiltered($filterData);
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

    private function indexDataFiltered($filterData) {
        $filtered = true;

        $sanPhams = $this->sanPhams;

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
        $this->sanPham = SanPham::capNhatThongTin($id, $data);

        if (!empty($anhDaiDien)){
            $storePath = StringHelper::buildImageRelativePathFromProductType($this->sanPham->loai_san_pham_id);

            $relativePath = ImageHelper::storeImageToStorage($anhDaiDien, $storePath);

            ImageHelper::deleteImageFromStorage($this->sanPham->anh_dai_dien);

            $this->sanPham->anh_dai_dien = $relativePath;
        }

        if (GiaSanPham::giaThayDoi($data['gia'])){
            $this->sanPham->gia()->save(GiaSanPham::fromCurrency($data['gia']));
        }

        $this->themThongSoKyThuat();

        return $this->sanPham->update();
    }

    public function themSanPham(array $data, $anhDaiDien, $anhChiTiets) {
        $this->sanPham = SanPham::taoMoiThongTin($data);

        if (!empty($anhDaiDien))
            $this->sanPham->anh_dai_dien = ImageHelper::storeImageToStorage(
                $anhDaiDien,
                StringHelper::buildImageRelativePathFromProductType($this->sanPham->loai_san_pham_id));

        if(!$this->sanPham->save())
            return false;

        if (!$this->sanPham->gia()->save(GiaSanPham::fromCurrency($data['gia'])))
            return false;

        $this->themThongSoKyThuat();

        if (!empty($anhChiTiets))
            return $this->storeAndAttachWith($anhChiTiets);

        return $this->sanPham->id;
    }

    private function themThongSoKyThuat() {
        $this->sanPham->thongSos()->detach();

        $loaiSanPham = LoaiSanPham::findOrFail($this->sanPham->loai_san_pham_id);

        $this->sanPham->thongSos()->sync($loaiSanPham->thongSoIds());
    }

    private function storeAndAttachWith($anhs) {
        foreach ($anhs as $anh) {
            $link = ImageHelper::storeImageToStorage($anh, $this->folderAnhSanPham);

            if (!$this->sanPham->hinhAnhs()->save(new HinhAnh(['lien_ket' => $link])))
                return false;
        }

        return $this->sanPham->id;
    }

    public function search($queryString) {
        $queries = $this->extractQuery($queryString);

        $productsModel = null;

        if (!empty($queries['product-type']))
            $productsModel = LoaiSanPham::find($queries['product-type'])->sanPhams();

        if (!empty($queries['name']))
            $productsModel = $this->getProductsModelByName($productsModel, $queries['name']);

        return $productsModel->get();
    }

    private function extractQuery($queryString) {
        $parts = explode(';', $queryString);
        $queries = [];
        foreach ($parts as $part) {
            if (!preg_match('/.+(=).+/', $part))
                continue;
            $bunch = explode('=', $part);
            $queries[$bunch[0]] = $bunch[1];
        }
        return $queries;
    }

    private function getProductsModelByName($productsModel, $name) {
        $condition = [['ten_san_pham', 'like', "%$name%"]];
        if (empty($productsModel))
            return SanPham::where($condition);

        return $productsModel->where($condition);
    }


}