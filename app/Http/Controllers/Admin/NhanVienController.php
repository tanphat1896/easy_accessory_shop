<?php

namespace App\Http\Controllers\Admin;

use App\NhanVien;
use App\PhanQuyen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhanViens = NhanVien::paginate(10);

        return view('admin.nhan_vien.index', compact('nhanViens'));
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
        $email = $request->get('email');
        if (NhanVien::daTonTai($email))
        {
            return back()->with('errors', ["Email $email đã tồn tại"]);
        }

        $nhanVien = new NhanVien();
        $nhanVien->name = $request->get('ten-nhan-vien');
        $nhanVien->email = $request->get('email');
        $nhanVien->phone = $request->get('so-dien-thoai');
        $nhanVien->username = substr($request->get('email'),0,strpos($request->get('email'),'@'));
        $nhanVien->password = bcrypt($request->get('password'));
        $nhanVien->save();

        $quyenHanIds = $request->get('quyen');
        $nhanVien->quyenHans()->sync($quyenHanIds);

        return back()->with('success', 'Thêm nhân viên thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $email = NhanVien::find($id)->email;
        $emailReq = $request->get('email');

        $nhanVien = NhanVien::findOrFail($id);
        $nhanVien->name = $request->get('ten-nhan-vien');
        $nhanVien->phone = $request->get('so-dien-thoai');
        if ($request->has('email'))
        {
            if (($email != $emailReq) && NhanVien::daTonTai($emailReq)) {
                return back()->with('errors', ["Email $email đã tồn tại"]);
            }
            $nhanVien->email = $emailReq;
        }
        $nhanVien->update();

        $quyenHanIds = $request->get('quyen');
        $nhanVien->quyenHans()->sync($quyenHanIds);

        return back()->with('success', 'Cập nhật thông tin thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function changeInfo(Request $request, $id)
    {
        $nhanVien = NhanVien::findOrFail($id);
        $nhanVien->name = $request->get('ten-nhan-vien');
        $nhanVien->phone = $request->get('so-dien-thoai');
        $nhanVien->update();

        return back()->with('success', 'Cập nhật thông tin thành công');
    }

    public function changePass(Request $request, $id)
    {
        $nhanVien = NhanVien::findOrFail($id);
        $oldPassword = $request->get('oldPassword');
        if (!password_verify($oldPassword, $nhanVien->password))
        {
            return back()->with('error', "Mật khẩu cũ không chính xác");
        }
        $password = $request->get('password');
        $nhanVien->password = bcrypt($password);
        $nhanVien->update();

        return back()->with('success', 'Thay đổi mật khẩu thành công');
    }

    public function resetPass(Request $request, $id)
    {
        $nhanVien = NhanVien::findOrFail($id);
        $password = $request->get('password');
        $passwordConf = $request->get('password_confirmation');
        if ($password != $passwordConf)
        {
            return back()->with('error', "Mật khẩu nhập lại không khớp");
        }
        $nhanVien->password = bcrypt($password);
        $nhanVien->update();

        return back()->with('success', 'Thay đổi mật khẩu thành công');
    }

    public function destroy($id)
    {
        //
    }
}
