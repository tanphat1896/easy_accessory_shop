<?php

namespace App\Http\Controllers\Admin;

use App\ChiTietPhieuNhap;
use App\NhaCungCap;
use App\PhieuNhap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NhapHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phieuNhaps = PhieuNhap::all();
        $nhaCungCaps = NhaCungCap::all();
        return view('admin.nhap_hang.index.index', compact(['phieuNhaps','nhaCungCaps']));
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
        $phieuNhap = new PhieuNhap();
        $phieuNhap->nha_cung_cap_id = $request->get('ten-ncc');
        $phieuNhap->ngay_nhap = $request->get('ngay-nhap');
        $phieuNhap->tai_khoan_id = 2;
        $phieuNhap->save();

        return back()->with('success', 'Thêm phiếu nhập thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chiTietPhieuNhaps = ChiTietPhieuNhap::where('phieu_nhap_id',$id)->get();
        return view('admin.nhap_hang.san_pham.index', compact('chiTietPhieuNhaps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $phieuNhap = PhieuNhap::findOrFail($id);
        $phieuNhap->nha_cung_cap_id = $request->get('ten-ncc');
        $phieuNhap->ngay_nhap = $request->get('ngay-nhap');
        $phieuNhap->tai_khoan_id = 2;
        $phieuNhap->update();

        return back()->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('phieu-nhap-id');
        PhieuNhap::destroy($ids);

        return back()->with('success', 'Xóa thành công');
    }
}
