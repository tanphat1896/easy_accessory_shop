<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/30/18
 * Time: 12:23 AM
 */

namespace App\Acme\Behavior;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait AccountStatistic {
    private $reflectMethod = [
        'year' => 'getAccountByYear',
        'quarter' => 'getAccountByQuarter',
        'month' => 'getAccountByMonth'
    ];

    private $fill = [
        'month' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
        'quarter' => [1, 2, 3, 4]
    ];

    public function getAccount(Request $request) {
        $type = $request->get('type') ?: null;

        if (empty($type))
            return response()->json(null);

        $method = $this->reflectMethod[$type];

        $data = $this->$method($request);

        $output = $this->standardizeOutput($data);

        return response()->json($output);
    }

    public static function getTotalRevenue($startDate = null, $endDate = null) {
        $total = DB::table('don_hangs');
        $total = self::buildWhereCondition($total, $startDate, $endDate);

        return $total->sum('tong_tien');
    }

    private function getAccountByYear(Request $request) {
        $yearRevenues = DB::table('don_hangs')
            ->selectRaw('year(ngay_duyet_don) as year, round(sum(tong_tien)/1000000.0, 2) as total')
            ->groupBy(DB::raw('year(ngay_duyet_don)'))->get();

        $yearBuyings = DB::table('chi_tiet_phieu_nhaps as c')
            ->join('phieu_nhaps as p', 'p.id', '=', 'c.phieu_nhap_id')
            ->selectRaw('year(ngay_nhap) as year, round(sum(so_luong*don_gia)/1000000.0, 2) as total')
            ->groupBy(DB::raw('year(ngay_nhap)'))->get();

        return $this->standardizeData(
            ['revenues' => $yearRevenues, 'buyings' => $yearBuyings],
            ['year', 'total'],
            ['Năm', 'Triệu đồng']
        );
    }

    private function getAccountByMonth(Request $request) {
        $year = $request->get('year') ?: date('Y');

        $monthRevenues = DB::table('don_hangs')
                ->selectRaw('month(ngay_duyet_don) as month, round(sum(tong_tien)/1000000.0, 2) as total')
                ->whereBetween('ngay_duyet_don', ["$year-1-1", "$year-12-31"])
                ->groupBy(DB::raw('month(ngay_duyet_don)'))->get();

        $monthBuyings = DB::table('chi_tiet_phieu_nhaps as c')
            ->join('phieu_nhaps as p', 'p.id', '=', 'c.phieu_nhap_id')
            ->selectRaw('month(ngay_nhap) as month, round(sum(so_luong*don_gia)/1000000.0, 2) as total')
            ->whereBetween('ngay_nhap', ["$year-1-1", "$year-12-31"])
            ->groupBy(DB::raw('month(ngay_nhap)'))->get();

        $source = ['revenues' => $monthRevenues, 'buyings' => $monthBuyings];

        return $this->standardizeData(
            $this->fillMissingDuration($source, 'month', 'month'),
            ['month', 'total'],
            ['Tháng', 'Triệu đồng']
        );
    }

    private function getAccountByQuarter(Request $request) {
        $year = $request->get('year') ?: date('Y');

        $quarterRevenues = DB::table('don_hangs')
            ->selectRaw('quarter(ngay_duyet_don) as quarter, round(sum(tong_tien)/1000000.0, 2) as total')
            ->whereBetween('ngay_duyet_don', ["$year-1-1", "$year-12-31"])
            ->groupBy(DB::raw('quarter(ngay_duyet_don)'))->get();

        $quarterBuyings = DB::table('chi_tiet_phieu_nhaps as c')
            ->join('phieu_nhaps as p', 'p.id', '=', 'c.phieu_nhap_id')
            ->selectRaw('quarter(ngay_nhap) as quarter, round(sum(so_luong*don_gia)/1000000.0, 2) as total')
            ->whereBetween('ngay_nhap', ["$year-1-1", "$year-12-31"])
            ->groupBy(DB::raw('quarter(ngay_nhap)'))->get();

        $source = ['revenues' => $quarterRevenues->toArray(), 'buyings' => $quarterBuyings->toArray()];

        return $this->standardizeData(
            $this->fillMissingDuration($source, 'quarter', 'quarter'),
            ['quarter', 'total'],
            ['Quý', 'Triệu đồng']
        );
    }

    private function fillMissingDuration($source, $type, $column) {
        $output = [];
        foreach ($source as $key => $data) {
            $fill = $this->fill[$type];
            $newData = [];
            foreach ($data as $datum) {
                $newData[$datum->$column] = $datum;
                if (($findKey = array_search($datum->$column, $fill)) !== false)
                    unset($fill[$findKey]);
            }
            foreach ($fill as $idx) {
                $datum = new \stdClass();
                $datum->$column = $idx;
                $datum->total = 0;
                $newData[$idx] = $datum;
            }
            ksort($newData);

            $output[$key] = $newData;
        }

        return $output;
    }

    private function standardizeData($source, $columns, $axes) {

        return compact('source', 'columns', 'axes');
    }

    private function standardizeOutput($data) {
        $source = $data['source'];
        $columns = $data['columns'];
        $axes = $data['axes'];

        $output = \App\Helper\Statistic::convertToChartData($source, $columns, $axes);

        return $output;
    }

    private static function buildWhereCondition($builder, $startDate, $endDate) {
        $condition = [];
        if (!empty($startDate))
            $condition[] = ['ngay_duyet_don', '>=', $startDate];

        if (!empty($endDate))
            $condition[] = ['ngay_duyet_don', '<=', $endDate];

        if (empty($condition))
            return $builder;

        return $builder->where($condition);
    }
}