<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\NhaSanXuatController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PhieuBaoHanhController;
use App\Http\Controllers\PhieuNhapHangController;
use App\Http\Controllers\NguoiDungController;
use \App\Http\Controllers\BinhLuanController;
use \App\Http\Controllers\TinTucController;


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

// clear route cache
Route::get('/clear-route-cache', function () {
    Artisan::call('route:cache');
    return 'Routes cache has clear successfully !';
});

//clear config cache
Route::get('/clear-config-cache', function () {
    Artisan::call('config:cache');
    return 'Config cache has clear successfully !';
});

// clear application cache
Route::get('/clear-app-cache', function () {
    Artisan::call('cache:clear');
    return 'Application cache has clear successfully!';
});

// clear view cache
Route::get('/clear-view-cache', function () {
    Artisan::call('view:clear');
    return 'View cache has clear successfully!';
});

//Trang Chủ
Route::get('/', function () {
//    return view('frontend/homepage/home');
    dd('hi');
});

//Admin
Route::get('/admin', function () {
    return view('admin/dashboard/dashboard');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('loai-san-pham', LoaiSanPhamController::class);
Route::resource('nha-san-xuat', NhaSanXuatController::class);
Route::resource('san-pham', SanPhamController::class);
Route::resource('don-hang', CheckoutController::class);
Route::resource('phieu-bao-hanh', PhieuBaoHanhController::class);
Route::resource('nha-cung-cap', NhaCungCapController::class);
Route::resource('phieu-nhap', PhieuNhapHangController::class);
Route::resource('nguoi-dung', NguoiDungController::class);
Route::resource('binh-luan', BinhLuanController::class);
Route::resource('tin-tuc', TinTucController::class);

Route::post('/ket-qua-tim-kiem', [App\Http\Controllers\FullTextSearchController::class, 'index'])->name('full-text-search');

Route::get('/gio-hang', function () {
    return view('frontend/checkout/cart');
});

//Giỏ hàng
Route::get('add-to-cart/{id}', 'App\Http\Controllers\SanPhamController@addToCart');
Route::patch('update-cart', 'App\Http\Controllers\SanPhamController@updateCart');
Route::delete('remove-from-cart', 'App\Http\Controllers\SanPhamController@removeCart');

//Checkout
Route :: post ( '/thanh-toan/don-hang' , 'App\Http\Controllers\CheckoutController@saveOrderDetail' );

Route::get('/thanh-toan', function () {
    return view('frontend/checkout/checkout ');
});

//Phiếu nhập
Route::get('phieu-nhap/san-pham/{id}', 'App\Http\Controllers\PhieuNhapHangController@themVaoPhieu');
Route::patch('phieu-nhap-update', 'App\Http\Controllers\PhieuNhapHangController@updatePnh');
Route::delete('phieu-nhap-delete', 'App\Http\Controllers\PhieuNhapHangController@removePnh');

//Xử lý đơn hàng
Route::get('/don-hang-cho-xu-ly', 'App\Http\Controllers\CheckoutController@choxuly');
Route::get('/don-hang-dang-xu-ly', 'App\Http\Controllers\CheckoutController@dangxuly');
Route::get('/don-hang-da-hoan-thanh', 'App\Http\Controllers\CheckoutController@dahoanthanh');
Route::get('/don-hang-da-huy', 'App\Http\Controllers\CheckoutController@dahuy');

//In Hóa đơn
Route::get('/hoa-don/{id}', 'App\Http\Controllers\CheckoutController@xuatHoaDon');

//Bình Luận
Route::get('/binh-luan/duyet/{id}', 'App\Http\Controllers\BinhLuanController@duyetBL');

//Tin tuc công nghệ
Route::get('/tin-tuc-cong-nghe', [TinTucController::class, 'indexFrontend']);

//Tra Cứu Đơn Hàng
Route::get( '/tra-cuu-don-hang' , 'App\Http\Controllers\CheckoutController@traCuuDonHang' );
Route::post( '/tra-cuu-don-hang' , 'App\Http\Controllers\CheckoutController@traCuuDonHangSuccess' );
