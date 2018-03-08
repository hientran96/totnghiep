<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    protected $table='khachhang';

    protected $fillable=['hovaten','diachi','sdt','email'];
    public $timestamps= false;
    public function hoadon(){
    	return $this->hasMany('App\hoadon','id_khachhang','id');
    }
    public function chitiethoadon()
    {
    	return $this->hasManyThrough('App\chitiethoadon','App\hoadon
    		','id_khachhang','id_hoadon','id');
    }
}
