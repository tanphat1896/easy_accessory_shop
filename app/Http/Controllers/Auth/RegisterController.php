<?php

namespace App\Http\Controllers\Auth;

use App\TaiKhoan;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data,[
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:tai_khoans',
            'password' => 'required|string|min:6|max:30|confirmed',
            'phone' => 'required|string|max:11',
        ], [
            'required' => ':attribute không được để trống!',
            'max' => ':attribute không được quá :max ký tự!',
            'email' => ':attribute không đúng định dạng!',
            'unique' => ':attribute đã tồn tại!',
            'confirmed' => ':attribute nhập lại không khớp!',
            'min' => ':attribute không được ít hơn :min ký tự!',
        ], [
            'name' => 'Họ tên',
            'password' => 'Mật khẩu',
            'phone' => 'Số điện thoại',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {
        return TaiKhoan::create([
            'ten' => $data['name'],
            'email' => $data['email'],
            'mat_khau' => bcrypt($data['password']),
            'so_dien_thoai' => $data['phone'],
            'ten_dang_nhap' => substr($data['email'],0,strpos($data['email'],'@')),
            'loai_tk_id' => 1,
        ]);
    }

//    public function register(Request $request) {
//        dd($request);
//    }
}
