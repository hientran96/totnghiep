<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
	 protected $table='sanpham';

    protected $fillable=['tensanpham','id_loaisanpham','mota','dongia','donvi','hinhanh'];
    public $timestamps= false;
    //
    public function loaisanpham(){
    	return $this->belongsTo('App\loaisanpham','id_loaisanpham','id');
    }
    public function chitiethoadon()
    {
    	return $this->hasMany('App\chitiethoadon','id_sanpham','id');
    }
}
