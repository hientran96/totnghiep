<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
	 protected $table='news';

    protected $fillable=['tieude','noidung','hinhanh'];
    public $timestamps= false;
    //
}