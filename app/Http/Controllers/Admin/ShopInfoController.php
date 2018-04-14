<?php

namespace App\Http\Controllers\Admin;

use App\CuaHang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopInfoController extends Controller
{
    public function index() {
        $info = CuaHang::find(1);

        return view('admin.content.info.index', compact('info'));
    }

    public function store(Request $request) {
        $data = $this->validateInfo($request);

        $info = CuaHang::find(1) ?: new CuaHang();

        $info->ten_cua_hang = $data['name'];
        $info->email = $data['email'];
        $info->so_dien_thoai = $data['phone'];
        $info->dia_chi = $data['address'];

        $info->save();
        
        return back()->with('success', 'Cập nhật thành công');
    }

    private function validateInfo(Request $request) {
        $name = $request->name ?: 'Easy Accessory Shop';
        $email = $request->email ?: 'ezshop@gmail.com';
        $phone = $request->phone ?: '01236544789';
        $address = $request->address ?: 'Ninh Kieu, Can Tho';

        return compact('name', 'email', 'phone', 'address');
    }
}
