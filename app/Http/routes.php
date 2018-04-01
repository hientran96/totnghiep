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
// use App\khachhang;
Route::get('/', function () {
    return view('welcome');
});
Route::get('test',function(){
	return view('admin.cate.add');
});
// Route::get('khachhang',function()
// {
// 	$id_khachhang= khachhang::find(1);
// 	foreach ($id_khachhang->hoadon as $hoadon) {
// 		echo $hoadon->tongtien;
		
// 	}
// });
Route::get('/',[
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
// Route::get('sanpham',[
// 	'as'=>'sanpham',
// 	'uses'=>'PageController@getSP'
// ]);
Route::get('blog',[
	'as'=>'blog',
	'uses'=>'PageController@getblog'
]);
Route::get('tinchitiet/{id}',[
	'as'=>'tinchitiet',
	'uses'=>'PageController@gettinchitiet'
]);
Route::get('lienhe',[
	'as'=>'lienhe',
	'uses'=>'PageController@getlienhe'
]);
Route::get('page/hotromuahang',[
	'as'=>'hotromuahang',
	'uses'=>'PageController@gethotromuahang'
]);
Route::get('page/chinhsachdoitra',[
	'as'=>'chinhsachdoitra',
	'uses'=>'PageController@getchinhsachdoitra'
]);
Route::get('page/chinhsachdaily',[
	'as'=>'chinhsachdaily',
	'uses'=>'PageController@getchinhsachdaily'
]);
Route::get('page/chinhsachgiaohang',[
	'as'=>'chinhsachgiaohang',
	'uses'=>'PageController@getchinhsachgiaohang'
]);
Route::get('gioithieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getgioithieu'
]);

Route::get('login','userController@getlogin');
Route::post('login','userController@postlogin');
Route::get('logout',[
	'as'=>'logout',
	'uses'=>'userController@getlogout'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getsearch'
]);
Route::get('themvaogio/{id}',[
'as'=>'themvaogio',
'uses'=>'PageController@getthemvaogio'
]);
Route::get('xoagiohang/{id}',[
	'as'=>'xoagiohang',
'uses'=>'PageController@getxoagiohang'
]);
Route::get('xoa1sanpham/{id}',[
	'as'=>'xoa1sanpham',
'uses'=>'PageController@getxoa1sanpham'
]);
Route::get('dathang',[
	'as'=>'dathang',
'uses'=>'PageController@getdathang'
]);
Route::get('vitrituyendung',[
	'as'=>'vitrituyendung',
'uses'=>'PageController@getvitrituyendung'
]);
Route::get('yeucau',[
	'as'=>'yeucau',
'uses'=>'PageController@getyeucau'
]);
Route::get('nhansu',[
	'as'=>'nhansu',
'uses'=>'PageController@getnhansu'
]);

Route::post('dathang',[
	'as'=>'dathang',
'uses'=>'PageController@postdathang'
]);
Route::get('hoadon/{id}/duyet/{trangthai}','hoadonController@getduyetdon');
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'loaiSP'],function(){
		Route::get('them','loaiSPController@getthem');
		Route::post('them','loaiSPController@postthem');
		Route::get('sua/{id}','loaiSPController@getsua');
		Route::post('sua/{id}','loaiSPController@postsua');
		Route::get('xoa/{id}','loaiSPController@getxoa');
		Route::get('danhsach','loaiSPController@getdanhsach');

	});
	Route::group(['prefix'=>'sanpham'],function(){
		Route::get('them','sanphamController@getthem');
		Route::post('them','sanphamController@postthem');
		Route::get('sua/{id}','sanphamController@getsua');
		Route::post('sua/{id}','sanphamController@postsua');
		Route::get('danhsach','sanphamController@getdanhsach');
		Route::post('danhsach','sanphamController@postdanhsach');
		Route::get('xoa/{id}','sanphamController@getxoa');

	});
	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','slideController@getdanhsach');
		Route::get('them','slideController@getthem');
		Route::post('them','slideController@postthem');
		Route::get('sua/{id}','slideController@getsua');
		Route::post('sua/{id}','slideController@postsua');
		Route::get('xoa/{id}','slideController@getxoa');

	});
	Route::group(['prefix'=>'news'],function(){
		Route::get('them','newsController@getthem');
		Route::get('sua/{id}','newsController@getsua');
		Route::get('danhsach','newsController@getdanhsach');
		Route::post('them','newsController@postthem');
		Route::post('sua/{id}','newsController@postsua');
		Route::get('xoa/{id}','newsController@getxoa');

	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('them','userController@getthem');
		Route::post('them','userController@postthem');
		Route::get('sua/{id}','userController@getsua');
		Route::post('sua/{id}','userController@postsua');
		Route::get('doithongtin/{id}','userController@getdoithongtin');
		Route::post('doithongtin/{id}','userController@postdoithongtin');
		
		Route::get('danhsach','userController@getdanhsach');
		
		Route::get('xoa/{id}','userController@getxoa');

	});
	Route::group(['prefix'=>'hoadon'],function(){
		Route::get('danhsach','hoadonController@getdanhsach');
		Route::get('hoadonduyet','hoadonController@getdanhsachduyet');
		Route::get('hoadonkhongduyet','hoadonController@getdanhsachkhongduyet');

		

	});
	Route::group(['prefix'=>'khachhang'],function(){
		Route::get('danhsach','khachhangController@getdanhsach');
		

	});Route::group(['prefix'=>'chitiethoadon'],function(){
		// Route::get('danhsachchitiet','chitiethoadonController@getdanhsachchitiet');
		Route::get('chitiet/{id}','chitiethoadonController@getchitiet');

		

	});

});