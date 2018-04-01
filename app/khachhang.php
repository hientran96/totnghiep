<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class khachhang extends Model
{

    protected $table='khachhang';

    protected $fillable=['hovaten','gioitinh','email','sdt','diachi','note'];
   public $timestamps= false;
    public function hoadon(){
    	return $this->hasMany('App\hoadon','id_khachhang','id');
    }

   
}
