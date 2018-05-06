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

Route::get('/testing', function(){
    dd(password_verify('1111111', \App\Customer::find(1)->getAuthPassword()));
//    return \App\Helper\Statistic::getRevenueByAllYear();
});

Route::get('/', 'Frontend\IndexController@index');

Route::get('/tim-kiem/{keyword?}', 'Frontend\SearchController@search');

Route::get('/san-pham/{slug}', 'Frontend\SanPhamController@showGroup')->name('get_product');
Route::get('/san-pham-{type}', 'Frontend\SanPhamController@showSpecial')->name('product.special');

Route::get('/chi-tiet/{slug}', 'Frontend\SanPhamController@show')->name('product.viewer');

Route::post('/gio-hang/{slug}', 'Frontend\CartController@addProduct')->name('cart.add');
Route::get('/gio-hang', 'Frontend\CartController@index')->name('cart.index');
Route::delete('/gio-hang/{slug}', 'Frontend\CartController@removeProduct')->name('cart.remove');
Route::put('/gio-hang/{slug}', 'Frontend\CartController@updateAmount')->name('cart.update');

Route::resource('/checkout', 'Frontend\CheckoutController', ['only' => ['index', 'store']]);

Route::get('/payment-result', 'Frontend\CheckoutController@checkoutOnlineResult');
Route::get('/payment-cencel', 'Frontend\CheckoutController@checkoutOnlineCancel');


Route::resource('/don-hang', 'Frontend\OrderController', ['only' => ['index', 'show']])
    ->names('order');

Route::get('/tin-tuc/bai-viet/{slug}', 'Frontend\IndexController@showNews')->name('read.news');
Route::get('/tin-tuc/', 'Frontend\IndexController@showAllNews')->name('news.all');

Route::group(['middleware' => 'customer'], function() {
    Route::get('/khach-hang/lich-su-mua-hang', 'Frontend\CustomerController@history')
        ->name('customer.history');
    Route::get('/khach-hang/don-hang/{code}', 'Frontend\CustomerController@getOrderDetailTable')
        ->name('customer.orderDetail');

    Route::resource('/rating', 'Frontend\RatingController', ['only' => ['store']]);

    Route::resource('/comments', 'Frontend\CommentController', ['only' => ['store']]);

    Route::post('/khach-hang/{id}/doi-thong-tin', 'Frontend\CustomerController@changeInfo')
        ->name('customer-change-info');
    Route::post('/khach-hang/{id}/doi-mat-khau', 'Frontend\CustomerController@changePass')
        ->name('customer-change-pass');
});


Route::get('/checkout-result', function() {
    return view('frontend.cart.checkout_result');
})->name('checkout.result');

//Route::post('check_login', 'Auth\CheckLoginController@check')->name('check_login');

Auth::routes();

Route::get('customer/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
Route::post('customer/logout', 'Auth\CustomerLoginController@logout')->name('customer.logout');
Route::post('customer/login', 'Auth\CustomerLoginController@login')->name('customer.login.submit');


Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {


    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    /**
        Thong ke
     */
    Route::get('/thong_ke/thu_chi', 'Admin\StatisticController@account')->name('account')
        ->middleware('thongke');
    Route::get('/thong_ke/don_hang', 'Admin\StatisticController@order')->name('order')
        ->middleware('thongke');

    /**
        Thuong hieu
     */
    Route::resource('thuong_hieu', 'Admin\ThuongHieuController', ["except" => ["create", "show", "edit"]])
        ->middleware('thuonghieu');
    Route::get('brands', 'Admin\ThuongHieuController@brands')
        ->middleware('thuonghieu');

    /**
        Loai san pham
     */
    Route::resource('loai_sp', 'Admin\LoaiSanPhamController', ["except" => ["create", "show", "edit"]])
        ->middleware('loaisp');

    /**
        Nha cung cap
     */
    Route::resource('nha_cung_cap', 'Admin\NhaCungCapController', ["except" => ["create", "show", "edit"]])
        ->middleware('nhacungcap');

    /**
        Khuyen mai
     */
    Route::resource('khuyen_mai', 'Admin\KhuyenMaiController', ["except" => ["create", "edit"]])
        ->middleware('khuyenmai');
    Route::resource('chi_tiet_km', 'Admin\ChiTietKMController', ["only" => ["store", "destroy"]])
        ->middleware('khuyenmai');

    /**
        Noi dung
     */
    Route::resource('noi_dung/slider', 'Admin\SliderController', ['only' => ['index', 'store', 'destroy']])
        ->middleware('noidung');
    Route::resource('noi_dung/menu', 'Admin\MenuController', ['only' => ['index', 'store', 'destroy']])
        ->middleware('noidung');
    Route::resource('noi_dung/info', 'Admin\ShopInfoController', ['only' => ['index', 'store']])
        ->middleware('noidung');
    Route::resource('noi_dung/news', 'Admin\NewsController')
        ->middleware('noidung');

    /**
        San pham
     */
    Route::resource('san_pham', 'Admin\SanPhamController')
        ->middleware('sanpham');
    Route::post('san_pham/{id}/resume', 'Admin\SanPhamController@resume')->name('san_pham.resume')
        ->middleware('sanpham');
    Route::post('gia_san_pham/{sanpham_id}', 'Admin\GiaSanPhamController@store')->name('gia_san_pham.store')
        ->middleware('sanpham');
    Route::post('thong_so_ky_thuat/{sanpham_id}', 'Admin\ThongSoKyThuatController@update')
        ->name('thong_so_ky_thuat')->middleware('sanpham');
    Route::resource('anh_san_pham', 'Admin\AnhSanPhamController', ['only' => ['store', 'destroy']])
        ->middleware('sanpham');

    /**
        Binh luan
     */
    Route::resource('binh_luan', 'Admin\CommentController', ['only' => ['store', 'destroy', 'update']]);

    /**
        Nhap hang
     */
    Route::resource('nhap_hang','Admin\NhapHangController')
        ->middleware('nhaphang');
    Route::get('nhap_hang/{adminID}/index', 'Admin\NhapHangController@nhapHangIndex')->name('nhap_hang_index')
        ->middleware('nhaphang');
    Route::resource('chi_tiet_nhap_hang', 'Admin\CTNHController', ['only' => ['update', 'store', 'destroy']])
        ->middleware('nhaphang');
    Route::get('cap_nhat_so_luong/{id}', 'Admin\CTNHController@productUpdate')->name('cap_nhat_so_luong')
        ->middleware('nhaphang');

    /**
        Don hang
     */
    Route::resource('don_hang', 'Admin\DonHangController', ['only' => ['index', 'show', 'update', 'edit']])
        ->middleware('donhang');
    Route::get('duyet_don/{id}', 'Admin\DonHangController@duyetDon')->name('duyet_don')
        ->middleware('donhang');
    Route::get('huy_don/{id}', 'Admin\DonHangController@huyDon')->name('huy_don')
        ->middleware('donhang');
    Route::get('don_hang/{id}/print', 'Admin\DonHangController@printOrder')->name('print_order')
        ->middleware('donhang');

    /**
        Nhan vien
     */
    Route::resource('nhan_vien', 'Admin\NhanVienController')
        ->middleware('nhanvien');
    Route::post('nhan_vien/{id}/cap_nhat_thong_tin', 'Admin\NhanVienController@changeInfo')->name('cap_nhat_thong_tin');
    Route::post('nhan_vien/{id}/reset_mat_khau', 'Admin\NhanVienController@resetPass')->name('reset_mat_khau')
        ->middleware('nhanvien');
    Route::post('nhan_vien/{id}/change_mat_khau', 'Admin\NhanVienController@changePass')->name('change_mat_khau');

    Route::get('error', function () {
        return view('admin.errors.404');
    })->name('error');

    Route::get('menu_state/{state}', function($state) {
        $store = App\CuaHang::first();
        $store->wide_menu = $state%2;
        $store->save();
    });

    Route::prefix('ajax-request')->group(function() {
        Route::get('products/sale-search', 'Admin\SanPhamController@searchProductSale');
        Route::get('statistic/account', 'Admin\StatisticController@getAccount');
        Route::get('statistic/order', 'Admin\StatisticController@getOrder');
    });

    Route::get('/testing', 'Admin\SanPhamController@searchProductSale');
});
