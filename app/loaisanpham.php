<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
	 protected $table='loaisanpham';

    protected $fillable=['tenloai','hinhanh'];
    public $timestamps= false;
    //
    public function sanpham(){
    	return $this->hasMany('App\sanpham','id_loaisanpham','id');
    }
}
