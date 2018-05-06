<?php

namespace App\Http\Controllers\Admin;

use App\ChiTietDonHang;
use App\ChiTietGioHang;
use App\DonHang;
use App\SanPham;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;

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
        $donHangs = DonHang::orderBy('tinh_trang', 'asc')->paginate(10);

        return view('admin.don_hang.index.index', compact('donHangs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chiTietDonHangs = ChiTietDonHang::where('don_hang_id', $id)->paginate(5);
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
        $donHang = DonHang::findOrFail($id);
        $donHang->tinh_trang = 1;
        $donHang->ngay_duyet_don = date('M-d-y');
        $donHang->update();
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
            $sanPham = SanPham::findOrFail($chiTietDonHang->san_pham_id);
            $sanPham->so_luong += $chiTietDonHang->so_luong;
            $sanPham->update();
            ChiTietDonHang::destroy($chiTietDonHang->id);
        }
        DonHang::destroy($id);
        return redirect('/admin/don_hang')->with('success', 'Hủy đơn hàng thành công');
    }

    public function printOrder($id) {
        $donHang = DonHang::find($id);
        $pdf = PDF::loadView('admin.don_hang.san_pham.order_preview', compact('donHang'));
        return $pdf->stream();
    }
}
