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

Route::get('/','PageController@trangchu');
Route::get('admin/dangnhap',  'UserController@getDangNhapAdmin');
Route::post('admin/dangnhap', 'UserController@postDangNhapAdmin');
Route::get('admin/logout',    'UserController@getDangXuatAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'theloai'],function(){
		Route::get('danhsach',  'TheLoaiController@getDanhSach');
		Route::get('them',      'TheLoaiController@getThem');
		Route::post('them',     'TheLoaiController@postThem');
		Route::get('sua/{id}',  'TheLoaiController@getSua');
		Route::post('sua/{id}', 'TheLoaiController@postSua');
		Route::get('xoa/{id}',  'TheLoaiController@getXoa');
	});
	Route::group(['prefix'=>'loaimon'],function(){
		Route::get('danhsach',  'LoaiMonController@getDanhSach');
		Route::get('them',      'LoaiMonController@getThem');
		Route::post('them',     'LoaiMonController@postThem');
		Route::get('sua/{id}',  'LoaiMonController@getSua');
		Route::post('sua/{id}', 'LoaiMonController@postSua');
		
		Route::get('xoa/{id}',  'LoaiMonController@getXoa');
	});
	Route::group(['prefix'=>'monan'],function(){
		Route::get('danhsach',  'MonAnController@getDanhSach');
		Route::get('them',      'MonAnController@getThem');
		Route::post('them',     'MonAnController@postThem');
		Route::get('sua/{id}',  'MonAnController@getSua');
		Route::post('sua/{id}', 'MonAnController@postSua');
		Route::get('xoa/{id}',  'MonAnController@getXoa');
	});
	Route::group(['prefix'=>'vungmien'],function(){
		Route::get('danhsach',	'VungMienController@getDanhSach');
		Route::get('them',		'VungMienController@getThem');
		Route::post('them',		'VungMienController@postThem');
		Route::get('sua/{id}',	'VungMienController@getSua');
		Route::post('sua/{id}', 'VungMienController@postSua');
		
		Route::get('xoa/{id}',	'VungMienController@getXoa');
	});
	
	Route::group(['prefix'=>'comment'],function(){
		Route::get('xoa/{id}/{idMonAn}','CommentController@getXoa');
	});
	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach',   'SlideController@getDanhSach');
		Route::get('them',       'SlideController@getThem');
		Route::post('them',      'SlideController@postThem');
		Route::get('sua/{id}',   'SlideController@getSua');
		Route::post('sua/{id}',  'SlideController@postSua');
		Route::get('xoa/{id}',   'SlideController@getXoa');
	});
	
	Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach',   'UserController@getDanhSach');
		Route::get('them',       'UserController@getThem');
		Route::post('them',      'UserController@postThem');
		Route::get('sua/{id}',   'UserController@getSua');
		Route::post('sua/{id}',  'UserController@postSua');
		Route::get('xoa/{id}',   'UserController@getXoa');
	});

	Route::group(['prefix'=>'cuahang'],function(){
    	Route::get('danhsach',   'CuaHangController@getDanhSach');
		Route::get('them',       'CuaHangController@getThem');
		Route::post('them',      'CuaHangController@postThem');
		Route::get('sua/{id}',   'CuaHangController@getSua');
		Route::post('sua/{id}',  'CuaHangController@postSua');
		Route::get('xoa/{id}',   'CuaHangController@getXoa');
	});

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('loaimon/{idTheLoai}','AjaxController@getLoaiMon');
		Route::get('search/{tukhoa}','AjaxController@search');
	});
});
Route::get('trangchu','PageController@trangchu');
Route::get('lienhe','PageController@lienhe');
Route::get('gioithieu','PageController@getGioiThieu');

Route::get('loaimon/{id}/{TenKhongDau}.html','PageController@loaimon');
Route::get('monan/{id}/{TenKhongDau}.html','PageController@monan');

Route::get('dangnhap','PageController@getDangNhap');
Route::post('dangnhap','PageController@postDangNhap');
Route::get('dangxuat','PageController@getDangXuat');
Route::get('dangky','PageController@getDangKy');
Route::post('dangky','PageController@postDangKy');

Route::post('binhluan/{id}','PageController@postBinhLuan');
Route::get('nguoidung','PageController@getNguoiDung');
Route::post('nguoidung','PageController@postNguoiDung');

Route::post('timkiem','PageController@postTimKiem');
Route::get('timkiem','PageController@getTimKiem');


Route::get('vungmien/{id}/{TenKhongDau}.html','PageController@getVungMien');
//Route::get('teambk',                 'PageController@getTeam');
Route::get('cuahang/{id}/{TenKhongDau}.html',  'PageController@cuahang');
/*
Login With Facebook
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
Facebook Login
*/
Route::get('auth/facebook', 'FacebookController@redirectToProvider')->name('facebook.login');
Route::get('auth/facebook/callback', 'FacebookController@handleProviderCallback');
/*
google login
*/
Route::get('auth/google','GoogleController@redirectToProvider')->name('google.login');
Route::get('auth/google/callback','GoogleController@handleProviderCallback');

