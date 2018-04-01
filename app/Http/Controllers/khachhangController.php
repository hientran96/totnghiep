<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\khachhang;

class khachhangController extends Controller
{
    
    public function getdanhsach(){
         $khachhang=khachhang::orderBy('id','DESC')->get();
        return view('admin.khachhang.danhsach',['khachhang'=>$khachhang]);
    }
}
