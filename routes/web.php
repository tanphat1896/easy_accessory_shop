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

Route::get('/', function () {
    $ssds = \App\SanPham::whereLoaiSanPhamId(1)->limit(12)->get();

    $sliders = \App\Slider::all();

    return view('index', compact('ssds', 'sliders'));
});
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

// admin routes

Route::get('/products', function () {
	return view('admin.products.index');
});


Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function(){
        return view('admin');
    });
    Route::resource('thuong_hieu', 'Admin\ThuongHieuController', ["except" => ["create", "show", "edit"]]);
    Route::resource('loai_sp', 'Admin\LoaiSanPhamController', ["except" => ["create", "show", "edit"]]);
    Route::resource('nha_cung_cap', 'Admin\NhaCungCapController', ["except" => ["create", "show", "edit"]]);
    Route::resource('noi_dung/slider', 'Admin\SliderController');
    Route::resource('san_pham', 'Admin\SanPhamController');

});

Route::get('/admin/sidebar-wide', function() {
    return view('admin.layouts.components.sidebar_wide');
});
Route::get('/admin/sidebar-thin', function() {
    return view('admin.layouts.components.sidebar_thin');
});
