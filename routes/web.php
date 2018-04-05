<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Frontend\IndexController@index');
Route::get('/san-pham/{slug}', 'Frontend\SanPhamController@showGroup');
Route::get('/chi-tiet/{slug}', 'Frontend\SanPhamController@show');
Route::post('/gio-hang/{slug}', 'Frontend\CartController@addProductToCart')->name('cart.add');
Route::get('/gio-hang', 'Frontend\CartController@index')->name('cart.index');
Route::delete('/gio-hang/{slug}', 'Frontend\CartController@removeProduct')->name('cart.remove');
Route::put('/gio-hang/{slug}', 'Frontend\CartController@updateAmount')->name('cart.update');
Route::resource('/checkout', 'Frontend\CheckoutController', ['only' => ['index', 'store']]);
Route::get('/checkout-result', function() {
    return view('frontend.cart.checkout_result');
})->name('checkout.result');

Route::post('check_login', 'Auth\CheckLoginController@check')->name('check_login');

Auth::routes();



Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function(){
        return view('admin');
    });

//    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
//    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
//    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    

    Route::resource('thuong_hieu', 'Admin\ThuongHieuController', ["except" => ["create", "show", "edit"]]);
    Route::resource('loai_sp', 'Admin\LoaiSanPhamController', ["except" => ["create", "show", "edit"]]);
    Route::resource('nha_cung_cap', 'Admin\NhaCungCapController', ["except" => ["create", "show", "edit"]]);
    Route::resource('khuyen_mai', 'Admin\KhuyenMaiController', ["except" => ["create", "edit"]]);
    Route::resource('chi_tiet_km', 'Admin\ChiTietKMController', ["only" => ["store", "destroy"]]);


    Route::resource('noi_dung/slider', 'Admin\SliderController', ['only' => ['index', 'store', 'destroy']]);
    Route::resource('noi_dung/menu', 'Admin\MenuController', ['only' => ['index', 'store', 'destroy']]);


    Route::resource('san_pham', 'Admin\SanPhamController');
    Route::post('san_pham/{id}/resume', 'Admin\SanPhamController@resume')->name('san_pham.resume');
    Route::post('gia_san_pham/{sanpham_id}', 'Admin\GiaSanPhamController@store')->name('gia_san_pham.store');
    Route::post('thong_so_ky_thuat/{sanpham_id}', 'Admin\ThongSoKyThuatController@update')->name('thong_so_ky_thuat');
    Route::resource('anh_san_pham', 'Admin\AnhSanPhamController', ['only' => ['store', 'destroy']]);


    Route::resource('nhap_hang','Admin\NhapHangController');
    Route::resource('chi_tiet_nhap_hang', 'Admin\CTNHController', ['only' => ['update', 'store', 'destroy']]);


    Route::get('menu_state/{state}', function($state) {
        $store = App\CuaHang::first();
        $store->wide_menu = $state%2;
        $store->save();
    });


    Route::get('ajax-request/products/search/{query}', 'Admin\SanPhamController@search');

    Route::get('/blabla', function() {
    });
});
