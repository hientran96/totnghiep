<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
	 protected $table='hoadon';

    protected $fillable=['id_khachhang','ngaymua','tongtien','hinhthucthanhtoan'];
    public $timestamps= false;
    
    public function khachhang()
    {
    	return $this->belongsTo('App\khachhang
    		','id_khachhang','id');
    }
    public function chitiethoadon()
    {
    	return $this->hasMany('App\chitiethoadon','id_hoadon','id');
    }
}
