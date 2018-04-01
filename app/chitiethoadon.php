<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitiethoadon extends Model
{
	 protected $table='chitiethoadon';

    protected $fillable=['id_hoadon','id_sanpham','soluong','dongia'];
    public $timestamps= false;
    public function hoadon(){
    	return $this->belongsTo('App\hoadon','id_hoadon','id');
    }
    public function sanpham(){

    	return $this->belongsTo('App\sanpham','id_sanpham','id');
    }
    public function khachhang()
    {
    	return $this->BelongsToMany('App\khachhang','App\hoadon','id_hoadon','id_sanpham','id');
    }
}
