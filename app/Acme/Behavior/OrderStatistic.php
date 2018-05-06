<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 5/6/18
 * Time: 12:26 PM
 */

namespace App\Acme\Behavior;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait OrderStatistic {
    private $reflectOrderMethod = [
        'year' => 'getOrderByYear',
        'quarter' => 'getOrderByQuarter',
        'month' => 'getOrderByMonth',
        'day' => 'getOrderByDay'
    ];

    public function getOrder(Request $request) {
        $type = $request->get('type') ?: null;

        if (empty($type))
            return response()->json(null);

        $method = $this->reflectOrderMethod[$type];

        $data = $this->$method($request);

        $output = $this->standardizeOutput($data);

//        return view('home');
        return response()->json($output);
    }

    private function getOrderByYear(Request $request) {
        for ($i = 2014; $i <= date('Y'); $i++)
            $this->fill['year'][] = $i;

        $uncheckOrders = $this->yearBuilder()->where('tinh_trang', 0)->get();

        $checkedOrders = $this->yearBuilder()->where('tinh_trang', 1)->get();

        $deliveredOrders = $this->yearBuilder()->where('tinh_trang', 2)->get();

        $source = ['uncheck' => $uncheckOrders, 'checked' => $checkedOrders, 'delivered' => $deliveredOrders];

        return $this->standardizeData(
            $this->fillMissingDuration($source, 'year', 'year'),
            ['year', 'total', 'extra'],
            ['Năm', 'Số lượng', 'Tổng tiền']
        );
    }

    private function yearBuilder() {
        return DB::table('don_hangs')
            ->selectRaw('year(ngay_dat_hang) as year, count(*) as total, 
            round(sum(tong_tien)/1000000, 2) as extra')
            ->groupBy(DB::raw('year(ngay_dat_hang)'));
    }

    private function getOrderByMonth(Request $request) {
        $year = $request->get('year') ?: date('Y');

        $uncheckOrders = $this->monthBuilder($year)->where('tinh_trang', 0)->get();

        $checkedOrders = $this->monthBuilder($year)->where('tinh_trang', 1)->get();

        $deliveredOrders = $this->monthBuilder($year)->where('tinh_trang', 2)->get();

        $source = ['uncheck' => $uncheckOrders, 'checked' => $checkedOrders, 'delivered' => $deliveredOrders];

        return $this->standardizeData(
            $this->fillMissingDuration($source, 'month', 'month'),
            ['month', 'total', 'extra'],
            ['Tháng', 'Số lượng', 'Tổng tiền']
        );
    }

    private function monthBuilder($year) {
        return DB::table('don_hangs')
            ->selectRaw('month(ngay_dat_hang) as month, count(*) as total, 
            round(sum(tong_tien)/1000000, 2) as extra')
            ->whereBetween('ngay_dat_hang', ["$year-1-1", "$year-12-31"])
            ->groupBy(DB::raw('month(ngay_dat_hang)'));
    }

    private function getOrderByQuarter(Request $request) {
        $year = $request->get('year') ?: date('Y');

        $uncheckOrders = $this->quarterBuilder($year)->where('tinh_trang', 0)->get();

        $checkedOrders = $this->quarterBuilder($year)->where('tinh_trang', 1)->get();

        $deliveredOrders = $this->quarterBuilder($year)->where('tinh_trang', 2)->get();

        $source = ['uncheck' => $uncheckOrders, 'checked' => $checkedOrders, 'delivered' => $deliveredOrders];

        return $this->standardizeData(
            $this->fillMissingDuration($source, 'quarter', 'quarter'),
            ['quarter', 'total', 'extra'],
            ['Quý', 'Số lượng', 'Tổng tiền']
        );
    }

    private function quarterBuilder($year) {
        return DB::table('don_hangs')
            ->selectRaw('quarter(ngay_dat_hang) as quarter, count(*) as total, 
            round(sum(tong_tien)/1000000, 2) as extra')
            ->whereBetween('ngay_dat_hang', ["$year-1-1", "$year-12-31"])
            ->groupBy(DB::raw('quarter(ngay_dat_hang)'));
    }

    private function getOrderByDay(Request $request) {
        $year = $request->get('year') ?: date('Y');
        $month = $request->get('month') ?: date('m');
        $start = $request->get('dayStart') ?: date('d');
        $end = $request->get('dayEnd') ?: date('d');

        for($i = $start; $i <= $end; $i++)
            $this->fill['day'][] = $i;

        $uncheckOrders = $this->dayBuilder($year, $month, $start, $end)->where('tinh_trang', 0)->get();

        $checkedOrders = $this->dayBuilder($year, $month, $start, $end)->where('tinh_trang', 1)->get();

        $deliveredOrders = $this->dayBuilder($year, $month, $start, $end)->where('tinh_trang', 2)->get();

        $source = ['uncheck' => $uncheckOrders, 'checked' => $checkedOrders, 'delivered' => $deliveredOrders];

        return $this->standardizeData(
            $this->fillMissingDuration($source, 'day', 'day'),
            ['day', 'total', 'extra'],
            ['Ngày', 'Số lượng', 'Tổng tiền']
        );
    }

    private function dayBuilder($year, $month, $start, $end) {
        $builder = DB::table('don_hangs')
            ->selectRaw('day(ngay_dat_hang) as day, count(*) as total, 
            round(sum(tong_tien)/1000000, 2) as extra')
            ->groupBy(DB::raw('day(ngay_dat_hang)'));


        return $builder->whereBetween('ngay_dat_hang', [
            "$year-$month-$start 00:00:00",
            "$year-$month-$end 23:59:59"
        ]);
    }

}