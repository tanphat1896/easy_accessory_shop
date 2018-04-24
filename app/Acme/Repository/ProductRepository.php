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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PharIo\Manifest\Email;

class ProductRepository {
    private $sanPham;

    private $sanPhams;

    private $reflectKey = ['th' => 'thuong_hieu_id', 'lsp' => 'loai_san_pham_id'];

    private $reflectClass = ['th' => 'ThuongHieu', 'lsp' => 'LoaiSanPham'];

    private $folderAnhSanPham = 'uploaded/img_product';

    public function getSanPhams(Request $request, $perPage) {
        if ($this->filtered($request))
            return $this->getSanPhamWithFilter($request);

        return $this->indexDataNoFiltered($perPage);
    }

    private function filtered($request) {
        $filters = $request->query();

        if (empty($filters))
            return false;

        $onlyPagingQuery = count($filters) == 1 && in_array('page', array_keys($filters));

        return ! $onlyPagingQuery;
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
            if ($value == 'all' || $key == 'page')
                continue;
            $conditions[] = [$this->reflectKey[$key], $value];
        }

        return $conditions;
    }

    private function getFilterDataFrom($filters) {
        $filterData = [];

        foreach ($filters as $key => $value) {
            if ($value == 'all' || $key == 'page')
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

    private function indexDataNoFiltered($perPage) {
        $filtered = false;

        $sanPhams = SanPham::paginate($perPage);

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

    public function updateSanPham($id, $data, $avtFile) {
        $this->sanPham = SanPham::capNhatThongTin($id, $data);

        if (!empty($avtFile)){
            $this->updateAvatar($avtFile);
        }

        if ($this->sanPham->priceChanged($data['gia'])){
            $this->sanPham->updatePrice($data['gia']);
        }

        $this->themThongSoKyThuat();

        return $this->sanPham->update();
    }

    private function updateAvatar($avtFile) {
        $storePath = StringHelper::buildImageRelativePathFromProductType($this->sanPham->loai_san_pham_id);

        $relativePath = ImageHelper::storeImageToStorage($avtFile, $storePath);

        ImageHelper::deleteImageFromStorage($this->sanPham->anh_dai_dien);

        $this->sanPham->anh_dai_dien = $relativePath;
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
}