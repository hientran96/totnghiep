<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slide extends Model
{
	 protected $table='slide';

    protected $fillable=['hinhanh','link'];
    public $timestamps= false;
    //
}
