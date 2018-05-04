<?php

namespace App\Http\Controllers\Admin;

use App\NhanVien;
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
        $nhanViens = NhanVien::all();

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
        $nhanVien = new NhanVien();
        $nhanVien->name = $request->get('ten-nhan-vien');
        $nhanVien->email = $request->get('email');
        $nhanVien->phone = $request->get('so-dien-thoai');
        $nhanVien->username = substr($request->get('email'),0,strpos($request->get('email'),'@'));
        $nhanVien->password = bcrypt($request->get('password'));
        $nhanVien->save();

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
        $nhanVien = NhanVien::findOrFail($id);
        $nhanVien->name = $request->get('ten-nhan-vien');
        $nhanVien->phone = $request->get('so-dien-thoai');
        if ($request->has('email'))
        {
            $nhanVien->email = $request->get('email');
        }
        $nhanVien->update();

        return back()->with('succcess', 'Cập nhật thông tin thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
