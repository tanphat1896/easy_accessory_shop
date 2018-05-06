<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/19/18
 * Time: 4:34 PM
 */

namespace App\Acme\Behavior;


use App\Helper\StringHelper;
use App\LoaiSanPham;
use App\ThuongHieu;
use Illuminate\Http\Request;

trait Filter {
    private $reflectKey = [
        'pt' => 'loai_san_pham_id',
        'p' => 'gia',
        't' => 'thuong_hieu',
        'min' => 'gia',
        'max' => 'gia',
        'name' => 'san_phams.slug',
        'amt' => 'so_luong'
    ];

    private $whereMethods = [
        'whereBrand',
        'wherePriceMin',
        'wherePriceMax',
        'whereName',
        'whereAmount'
    ];

    private $translatedFilters = [];

    private function filtered(Request $request) {
        if (empty($request->query()))
            return false;

        $onlyPagingQuery = $request->has('page') && count($request->query()) == 1;

        return !$onlyPagingQuery;
    }

    // special function: use in different context
    private function whereProductTypeId($builder, $productTypeId) {
        if (empty($productTypeId))
            return $builder;

        $this->translatedFilters['pt'] = [
            "text" => LoaiSanPham::find($productTypeId)->ten_loai,
            "val" => $productTypeId
        ];

        return $builder->where('loai_san_pham_id', '=', $productTypeId);
    }

    // assume query like: p=desc&t=samsung;sandisk;&min=1000&max=10000000&name=SSD
    private function bindFilterToBuilder($builder, $criteria) {
        foreach ($this->whereMethods as $whereMethod) {
            $builder = $this->{$whereMethod}($builder, $criteria);
        }
        $builder = $this->priceDirection($builder, $criteria);

        return $builder;
    }

    private function priceDirection($builder, $criteria) {
        if (empty($criteria['p']))
            return $builder;

        if (!in_array($criteria['p'], ['asc', 'desc']))
            return $builder;

        $this->translatedFilters['p'] = [
            'text' => $criteria['p'] == 'desc' ? 'Giá giảm dần' : 'Giá tăng dần',
            'val' => $criteria['p']
        ];

        return $builder->orderBy($this->reflectKey['p'], $criteria['p']);
    }

    private function whereBrand($builder, $criteria) {
        if (empty($criteria['t']))
            return $builder;

        $brandSlugs = explode(';', trim($criteria['t'], ';'));

        $brands = ThuongHieu::whereIn('slug', $brandSlugs)->get();
        $brandIds = $brands->map(function ($brand) {
            $this->translatedFilters['t'][] = [
                'text' => $brand->ten_thuong_hieu,
                'val' => $brand->slug
            ];
            return $brand->id;
        });

        return $builder->whereIn('thuong_hieu_id', $brandIds);
    }

    private function wherePriceMin($builder, $criteria) {
        if (empty($criteria['min']))
            return $builder;

        $this->translatedFilters['min'] = [
            "text" => "<i class='chevron right fitted icon'></i> " . StringHelper::toCurrencyString($criteria['min']),
            "val" => $criteria['min']
        ];

        return $builder->where(
            $this->reflectKey['min'],
            '>=',
            $criteria['min']
        );
    }

    private function wherePriceMax($builder, $criteria) {
        if (empty($criteria['max']))
            return $builder;

        $this->translatedFilters['max'] = [
            "text" => "<i class='chevron left fitted icon'></i> " . StringHelper::toCurrencyString($criteria['max']),
            "val" => $criteria['max']
        ];

        return $builder->where(
            $this->reflectKey['max'],
            '<=',
            $criteria['max']
        );
    }

    private function whereName($builder, $criteria) {
        if (empty($criteria['name']))
            return $builder;

        $this->translatedFilters['name'] = [
            "text" => "Chứa từ " . $criteria['name'],
            "val" => $criteria['name']
        ];

        $name = StringHelper::toSlug($criteria['name']);

        return $builder->where(
            $this->reflectKey['name'],
            'like',
            "%{$name}%"
        );
    }

    private function whereAmount($builder, $criteria) {
        if (! isset($criteria['amt']))
            return $builder;

        $this->translatedFilters['amt'] = [
            "text" => $criteria['amt'] == '0' ? 'Hết hàng' : "Không quá " . $criteria['amt'] . " Sp",
            "val" => $criteria['amt']
        ];

        return $builder->where($this->reflectKey['amt'], '<=', $criteria['amt']);
    }
}