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

    private $statusCodes = [
        'check' => 1,
        'uncheck' => 0,
        'delivery' => 2
    ];

    /**
     * Lấy tổng tiền theo loại đơn hàng
     * @param $orderType
     * @return mixed
     */
    public static function getTotalRevenue($orderType) {
        $statusCode = (new self)->statusCodes[$orderType];

        $total = DB::table('don_hangs');
        $total = self::buildWhereCondition($total, 'tinh_trang', $statusCode);

        return $total->sum('tong_tien');
    }

    public function getAccount(Request $request, $orderType = 'delivery') {
        $type = $request->get('type') ?: null;
        $statusCode = $this->statusCodes[$orderType];

        if (empty($type))
            return response()->json(null);

        $method = $this->reflectMethod[$type];

        $data = $this->$method($request, $statusCode);

        $output = $this->standardizeOutput($data);

        return response()->json($output);
//        return view('home');
    }

    private function getAccountByYear(Request $request, $statusCode) {
        $yearRevenues = DB::table('don_hangs')
            ->selectRaw('year(ngay_duyet_don) as year, round(sum(tong_tien)/1000000.0, 2) as total')
            ->where('tinh_trang', $statusCode)
            ->groupBy(DB::raw('year(ngay_duyet_don)'))
            ->get();

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

    private function getAccountByMonth(Request $request, $statusCode) {
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

    private function getAccountByQuarter(Request $request, $statusCode) {
        $year = $request->get('year') ?: date('Y');

        $quarterRevenues = $this->getRevenues('quarter', $year, $statusCode);

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

    private function getRevenues($durationType, $durationValue, $statusCode) {
        $builder = DB::table('don_hangs')
            ->selectRaw("$durationType(ngay_duyet_don) as $durationType, round(sum(tong_tien)/1000000.0, 2) as total")
            ->whereBetween('ngay_duyet_don', ["$durationValue-1-1", "$durationValue-12-31"])
            ->groupBy(DB::raw("$durationType(ngay_duyet_don)"));

        $builder = self::buildWhereCondition($builder, 'tinh_trang', $statusCode);

        return $builder->get();
    }

    private function getBuyings() {

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
                $datum->extra = 0;
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

    private static function buildWhereCondition($builder, $column, $value, $operator = "=") {
        $condition = [];
        $condition[] = [$column, $operator, $value];

        if (empty($condition))
            return $builder;

        return $builder->where($condition);
    }
}