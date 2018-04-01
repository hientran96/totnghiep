<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class sanpham extends Model
{
	 protected $table='sanpham';

    protected $fillable=['id_loaisanpham','tensanpham','mota','dongia','donvi','hinhanh','giakhuyenmai','new','chitiet'];
    
    //
    public function loaisanpham(){
    	return $this->belongsTo('App\loaisanpham','id_loaisanpham','id');
    }
    public function chitiethoadon()
    {
    	return $this->hasMany('App\chitiethoadon','id_sanpham','id');
    }
}
