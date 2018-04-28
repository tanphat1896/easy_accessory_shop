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

Route::get('/tim-kiem/{keyword?}', 'Frontend\SearchController@search');

Route::get('/san-pham/{slug}/{filter?}', 'Frontend\SanPhamController@showGroup')->name('get_product');
Route::get('/san-pham-{type}', 'Frontend\SanPhamController@showSpecial')->name('product.special');

Route::get('/chi-tiet/{slug}', 'Frontend\SanPhamController@show')->name('product.viewer');

Route::post('/gio-hang/{slug}', 'Frontend\CartController@addProduct')->name('cart.add');
Route::get('/gio-hang', 'Frontend\CartController@index')->name('cart.index');
Route::delete('/gio-hang/{slug}', 'Frontend\CartController@removeProduct')->name('cart.remove');
Route::put('/gio-hang/{slug}', 'Frontend\CartController@updateAmount')->name('cart.update');

Route::resource('/checkout', 'Frontend\CheckoutController', ['only' => ['index', 'store']]);

Route::get('/payment-result', 'Frontend\CheckoutController@checkoutOnlineResult');


Route::resource('/don-hang', 'Frontend\OrderController', ['only' => ['index', 'show']])
    ->names('order');

Route::get('/tin-tuc/bai-viet/{slug}', 'Frontend\IndexController@showNews')->name('read.news');
Route::get('/tin-tuc/', 'Frontend\IndexController@showAllNews')->name('news.all');

Route::group(['middleware' => 'customer'], function() {
    Route::get('/khach-hang/lich-su-mua-hang', 'Frontend\CustomerController@history')->name('customer.history');
    Route::get('/khach-hang/don-hang/{code}', 'Frontend\CustomerController@getOrderDetailTable')
        ->name('customer.orderDetail');

    Route::resource('/rating', 'Frontend\RatingController', ['only' => ['store']]);

    Route::resource('/comments', 'Frontend\CommentController', ['only' => ['store']]);
});


Route::get('/checkout-result', function() {
    return view('frontend.cart.checkout_result');
})->name('checkout.result');

//Route::post('check_login', 'Auth\CheckLoginController@check')->name('check_login');

Auth::routes();

Route::get('customer/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
Route::post('customer/logout', 'Auth\CustomerLoginController@logout')->name('customer.logout');
Route::post('customer/login', 'Auth\CustomerLoginController@login')->name('customer.login.submit');

Route::get('/testing', function() {

});


Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {


    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    

    Route::resource('thuong_hieu', 'Admin\ThuongHieuController', ["except" => ["create", "show", "edit"]]);
    Route::resource('loai_sp', 'Admin\LoaiSanPhamController', ["except" => ["create", "show", "edit"]]);
    Route::resource('nha_cung_cap', 'Admin\NhaCungCapController', ["except" => ["create", "show", "edit"]]);
    Route::resource('khuyen_mai', 'Admin\KhuyenMaiController', ["except" => ["create", "edit"]]);
    Route::resource('khuyen_mai', 'Admin\KhuyenMaiController', ["except" => ["create", "edit"]]);
    Route::resource('chi_tiet_km', 'Admin\ChiTietKMController', ["only" => ["store", "destroy"]]);


    Route::resource('noi_dung/slider', 'Admin\SliderController', ['only' => ['index', 'store', 'destroy']]);
    Route::resource('noi_dung/menu', 'Admin\MenuController', ['only' => ['index', 'store', 'destroy']]);
    Route::resource('noi_dung/info', 'Admin\ShopInfoController', ['only' => ['index', 'store']]);
    Route::resource('noi_dung/news', 'Admin\NewsController');


    Route::resource('san_pham', 'Admin\SanPhamController');
    Route::post('san_pham/{id}/resume', 'Admin\SanPhamController@resume')->name('san_pham.resume');
    Route::post('gia_san_pham/{sanpham_id}', 'Admin\GiaSanPhamController@store')->name('gia_san_pham.store');
    Route::post('thong_so_ky_thuat/{sanpham_id}', 'Admin\ThongSoKyThuatController@update')->name('thong_so_ky_thuat');
    Route::resource('anh_san_pham', 'Admin\AnhSanPhamController', ['only' => ['store', 'destroy']]);
    Route::resource('binh_luan', 'Admin\CommentController', ['only' => ['store', 'destroy', 'update']]);


    Route::resource('nhap_hang','Admin\NhapHangController');
    Route::resource('chi_tiet_nhap_hang', 'Admin\CTNHController', ['only' => ['update', 'store', 'destroy']]);
    Route::get('cap_nhat_so_luong/{id}', 'Admin\CTNHController@productUpdate')->name('cap_nhat_so_luong');

    Route::resource('don_hang', 'Admin\DonHangController');
    Route::get('duyet_don/{id}', 'Admin\DonHangController@duyetDon')->name('duyet_don');
    Route::get('huy_don/{id}', 'Admin\DonHangController@huyDon')->name('huy_don');

    Route::get('menu_state/{state}', function($state) {
        $store = App\CuaHang::first();
        $store->wide_menu = $state%2;
        $store->save();
    });


    Route::get('ajax-request/products/search/{query}/{sale?}', 'Admin\SanPhamController@search');

    Route::get('/testing', 'Admin\SanPhamController@searchProductSale');
});
