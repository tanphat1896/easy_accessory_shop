<?php

namespace App\Http\Controllers\Admin;

use App\ChiTietDonHang;
use App\DonHang;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $donHangs = DonHang::all();
        $donHangs = DonHang::paginate(10);

        return view('admin.don_hang.index.index', compact('donHangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chiTietDonHangs = ChiTietDonHang::where('don_hang_id', $id)->get();
        $donHang = DonHang::find($id);

        return view('admin.don_hang.san_pham.index', compact(['id', 'chiTietDonHangs', 'donHang']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donHang = DonHang::findOrFail($id);
        ($donHang->tinh_trang == 1)?($donHang->tinh_trang = 2):($donHang->tinh_trang = 1);
        $donHang->update();

        return back()->with('success', 'Cập nhật trạng thái giao hàng thành công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($id);
        $donHang = DonHang::findOrFail($id);
        $donHang->tinh_trang = 1;
        $donHang->ngay_duyet_don = date('M-d-y');
        $donHang->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        DonHang::destroy($id);

        return back()->with('success', 'Xóa thành công');
    }

    public function duyetDon($id) {
        $donHang = DonHang::findOrFail($id);
        $donHang->tinh_trang = 1;
        $donHang->ngay_duyet_don = date('Y-m-d H:i:s');
        $donHang->update();

        return back()->with('success', 'Duyệt đơn hàng thành công');
    }

    public function huyDon($id) {
        $chiTietDonHangs = ChiTietDonHang::where('don_hang_id', $id)->get();
        foreach ($chiTietDonHangs as $key => $chiTietDonHang) {
            ChiTietDonHang::destroy($chiTietDonHang->id);
        }
        DonHang::destroy($id);
        return redirect('/admin/don_hang')->with('success', 'Hủy đơn hàng thành công');
    }
}
