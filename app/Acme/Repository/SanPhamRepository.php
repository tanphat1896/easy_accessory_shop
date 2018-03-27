<?php
/**
 * Created by PhpStorm.
 * User: TanPhat
 * Date: 27/03/2018
 * Time: 11:12 PM
 */

namespace App\Acme\Repository;


use App\LoaiSanPham;
use App\SanPham;
use App\ThuongHieu;
use Illuminate\Http\Request;

class SanPhamRepository {
    private $reflectKey = ['th' => 'thuong_hieu_id', 'lsp' => 'loai_san_pham_id'];
    private $reflectClass = ['th' => 'ThuongHieu', 'lsp' => 'LoaiSanPham'];

    public function getSanPham(Request $request) {
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


}