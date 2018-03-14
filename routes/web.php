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
    return view('index');
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

Auth::routes();










Route::get('/admin', function(){
	return view('admin');
});


Route::get('/products', function () {
	return view('admin.products.index');
});