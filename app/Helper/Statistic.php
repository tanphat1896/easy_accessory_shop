<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/19/18
 * Time: 10:03 PM
 */

namespace App\Helper;

use App\Acme\Behavior\AccountStatistic;
use App\BinhLuan;
use App\DonHang;
use App\SanPham;
use App\ThuongHieu;
use Illuminate\Support\Facades\DB;

class Statistic {
    use AccountStatistic;

    const CHART_FIELDS = ['label', 'value'];

    const reflectClass = [
        'product' => 'SanPham',
        'brand' => 'ThuongHieu',
        'comment' => 'BinhLuan',
        'ptype' => 'LoaiSanPham'
    ];

    public static function totalProduct() {
        return SanPham::all()->count();
    }

    public static function totalCommentNotApproved() {
        return BinhLuan::where([
            ['approved', 0],
            ['parent_id', null]
        ])->get()->count();
    }

    public static function totalOrder($type = null) {
        if (empty($type))
            return DonHang::all()->count();

        return self::totalOrderByType($type);
    }

    private static function totalOrderByType($type) {
        $types = [
            'complete' => 2,
            'check' => 1,
            'uncheck' => 0
        ];

        return DonHang::where('tinh_trang', $types[$type])->get()->count();
    }

    public static function totalRevenueByMonth($month) {
        $thisYear = date('Y');
        $revenue = DB::table('don_hangs')
            ->selectRaw('round(sum(tong_tien)/1000000.0, 2) as total')
            ->whereBetween('ngay_duyet_don', ["$thisYear-$month-1", "$thisYear-$month-31"])
            ->first();
        return $revenue->total ?: 0;
    }

    public static function convertToChartData($source, $columns = [], $axisLabels = []) {
        $output = [];
        foreach ($source as $key => $data) {
            $output[$key] = self::convertToDataSet($data, $columns);
        }

        return [
            'data' => $output,
            'axes' => [
                'x' => empty($axisLabels[0]) ? '' : $axisLabels[0],
                'y' => empty($axisLabels[1]) ? '' : $axisLabels[1]
            ]
        ];
    }

    private static function convertToDataSet($data, $columns) {
        $set = [];
        foreach ($data as $datum) {
            $row = [];
            foreach ($columns as $idx => $column) {
                if (empty(self::CHART_FIELDS[$idx]))
                    break;
                $row[self::CHART_FIELDS[$idx]] = $datum->$column;
            }
            $set[] = $row;
        }
        return $set;
    }
}