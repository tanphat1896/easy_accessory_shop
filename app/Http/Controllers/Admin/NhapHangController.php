<?php

namespace App\Http\Controllers\Admin;

use App\ChiTietPhieuNhap;
use App\Helper\AuthHelper;
use App\NhaCungCap;
use App\NhanVien;
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

    public function nhapHangIndex($adminID)
    {
        $phieuNhaps = PhieuNhap::where('admin_id', $adminID)
            ->orderBy('id', 'desc')->paginate(10);
        $nhaCungCaps = NhaCungCap::all();
        return view('admin.nhap_hang.index.index', compact(['phieuNhaps','nhaCungCaps']));
    }

    public function index()
    {
        if (AuthHelper::isAdmin())
        {
            $phieuNhaps = PhieuNhap::orderBy('admin_id', 'desc')->orderBy('id', 'desc')->paginate(10);
        }
        else
        {
            $phieuNhaps = PhieuNhap::where('admin_id', AuthHelper::adminId())->orderBy('id', 'desc')->paginate(10);
        }
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
        $phieuNhap->admin_id = AuthHelper::adminId();
        $phieuNhap->ten_nhan_vien = AuthHelper::adminName();
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
        $chiTietPhieuNhaps = PhieuNhap::find($id)->chiTietPhieuNhaps()->paginate(10);
        return view('admin.nhap_hang.san_pham.index', compact(['chiTietPhieuNhaps','id']));
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
