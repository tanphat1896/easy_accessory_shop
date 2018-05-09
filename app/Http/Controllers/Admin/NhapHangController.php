<?php

namespace App\Http\Controllers\Admin;

use App\ChiTietPhieuNhap;
use App\Helper\AuthHelper;
use App\NhaCungCap;
use App\NhanVien;
use App\PhieuNhap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Stmt\Foreach_;

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
            ->orderBy('ngay_nhap', 'desc')->paginate(10);
        $nhaCungCaps = NhaCungCap::all();
        return view('admin.nhap_hang.indexParent.index', compact(['phieuNhaps','nhaCungCaps']));
    }

    public function index()
    {
        if (AuthHelper::isAdmin())
        {
            $phieuNhaps = PhieuNhap::where('phieu_nhap_id', null)->orderBy('ngay_nhap', 'desc')
                ->orderBy('id', 'desc')->paginate(10);
        }
        else
        {
            $phieuNhaps = PhieuNhap::where('admin_id', AuthHelper::adminId())->orderBy('id', 'desc')->paginate(10);
        }
        $nhaCungCaps = NhaCungCap::all();
        return view('admin.nhap_hang.indexParent.index', compact(['phieuNhaps','nhaCungCaps']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phieuNhap = new PhieuNhap();
        $phieuNhap->ngay_nhap = $request->get('ngay-nhap');
        $phieuNhap->admin_id = AuthHelper::adminId();
        $phieuNhap->ten_nhan_vien = AuthHelper::adminName();
        $phieuNhap->save();

        if ($request->has('nha-cung-cap'))
        {
            $ncc_ids = $request->get('nha-cung-cap');
            foreach ($ncc_ids as $ncc_id)
            {
                $phieuNhapChild = new PhieuNhap();
                $phieuNhapChild->nha_cung_cap_id = $ncc_id;
                $phieuNhapChild->phieu_nhap_id = $phieuNhap->id;
                $phieuNhapChild->save();
            }
        }

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
        $idParent = PhieuNhap::find($id)->phieu_nhap_id;
        $chiTietPhieuNhaps = PhieuNhap::find($id)->chiTietPhieuNhaps()->paginate(10);
        return view('admin.nhap_hang.san_pham.index', compact(['chiTietPhieuNhaps','id', 'idParent']));
    }

    public function showChild($id)
    {
        $phieuNhapParent = PhieuNhap::find($id);
        $phieuNhaps = $phieuNhapParent->getChild();
        $nhaCungCaps = NhaCungCap::all();

        return view('admin.nhap_hang.indexChild.index', compact(['phieuNhaps', 'phieuNhapParent', 'nhaCungCaps']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

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
        $phieuNhap->ngay_nhap = $request->get('ngay-nhap');
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

    public function createChild(Request $request, $id)
    {
        foreach ($request->get('nha-cung-cap') as $ncc_id)
        {
            $phieuNhap = New PhieuNhap();
            $phieuNhap->nha_cung_cap_id = $ncc_id;
            $phieuNhap->phieu_nhap_id = $id;
            $phieuNhap->save();
        }

        return back()->with('success', 'Thêm phiếu nhập thành công');
    }

    public function updateChild(Request $request, $id)
    {
        $phieuNhap = PhieuNhap::findOrFail($id);
        $phieuNhap->nha_cung_cap_id = $request->get('nha-cung-cap');
        $phieuNhap->update();

        return back()->with('success', 'Cập nhật phiếu nhập thành công');
    }
}
