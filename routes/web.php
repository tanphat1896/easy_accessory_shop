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
Route::get('/san-pham/ssd', 'Frontend\SanPhamController@showSsd');
Route::get('/chi-tiet/{slug}', 'Frontend\SanPhamController@show');


Route::get('/cart', function() {
	return view('frontend.cart.index');
});
Route::get('/checkout', function() {
	return view('frontend.cart.checkout');
});
Route::get('/detail', function() {
	return view('frontend.product_viewer.detail_view');
});
Route::post('/cart/addproduct/{id?}', 'CardController@addProductToCart');

Route::get('/hdd', function() {
    return view('frontend.product_category.hdd');
});

Auth::routes();



Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function(){
        return view('admin');
    });
    Route::resource('thuong_hieu', 'Admin\ThuongHieuController', ["except" => ["create", "show", "edit"]]);
    Route::resource('loai_sp', 'Admin\LoaiSanPhamController', ["except" => ["create", "show", "edit"]]);
    Route::resource('nha_cung_cap', 'Admin\NhaCungCapController', ["except" => ["create", "show", "edit"]]);
    Route::resource('noi_dung/slider', 'Admin\SliderController');
    Route::resource('san_pham', 'Admin\SanPhamController');
    Route::post('san_pham/{id}/resume', 'Admin\SanPhamController@resume')->name('san_pham.resume');
    Route::resource('anh_san_pham', 'Admin\AnhSanPhamController', ['only' => ['store', 'destroy']]);
    Route::resource('nhap_hang','Admin\NhapHangController');
    Route::post('gia_san_pham/{sanpham_id}', 'Admin\GiaSanPhamController@store')->name('gia_san_pham.store');
    Route::post('thong_so_ky_thuat/{sanpham_id}', 'Admin\ThongSoKyThuatController@update')->name('thong_so_ky_thuat');
});
