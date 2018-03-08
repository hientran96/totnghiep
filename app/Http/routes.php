<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\khachhang;
Route::get('/', function () {
    return view('welcome');
});
Route::get('test',function(){
	return view('admin.cate.add');
});
Route::get('khachhang',function()
{
	$id_khachhang= khachhang::find(1);
	foreach ($id_khachhang->hoadon as $hoadon) {
		echo $hoadon->tongtien;
		
	}
});
Route::get('index',[
	'as'=>'trangchu',
	'uses'=>'PageController@getIndex'
]);
Route::get('loaisanpham/{loai}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getloaiSP'
]);
Route::get('chitietsanpham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getchitiet'
]);
Route::get('sanpham',[
	'as'=>'sanpham',
	'uses'=>'PageController@getSP'
]);
Route::get('lienhe',[
	'as'=>'lienhe',
	'uses'=>'PageController@getlienhe'
]);
Route::get('gioithieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getgioithieu'
]);
Route::get('themvaogio/{id}',[
	'as'=>'themvaogio',
	'uses'=>'PageController@getthemvaogio'
]);
Route::get('xoacart/{id}',
[
	'as'=>'xoacart',
	'uses'=>'PageController@getxoaitemcart'
]);