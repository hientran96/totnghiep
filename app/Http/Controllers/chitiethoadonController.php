<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\khachhang;
use App\hoadon;
use App\chitiethoadon;

class chitiethoadonController extends Controller
{
  //    public function getdanhsachchitiet(){
       
      
  //     $hoadon=DB::table('hoadon')
		// ->join('khachhang','hoadon.id_khachhang','=','khachhang.id')
		// ->join('chitiethoadon','chitiethoadon.id_hoadon','=','hoadon.id') 
  //       ->select(['hoadon.*',
  //       	'khachhang.hovaten',
  //       	'chitiethoadon.dongia'
  //       ])
  //       ->get();


  //   	return view('admin.chitiethoadon.danhsachchitiet',['hoadon'=>$hoadon]);
  //   }
    public function getchitiet($id)
    {
    	 $hoadon = DB::table('hoadon')->where('hoadon.id',$id)
        ->join('khachhang','hoadon.id_khachhang','=','khachhang.id')
        ->join('chitiethoadon','chitiethoadon.id_hoadon','=','hoadon.id')  
        ->select('hoadon.*','khachhang.*','chitiethoadon.*')
        ->first();

        $chitiethoadon = DB::table('chitiethoadon')
        ->join('hoadon','chitiethoadon.id_hoadon','=','hoadon.id')
        ->join('sanpham','chitiethoadon.id_sanpham','=','sanpham.id')
        ->where('id_hoadon',$id)
        ->select('sanpham.tensanpham','sanpham.hinhanh','chitiethoadon.soluong','chitiethoadon.dongia','hoadon.tongtien')
        ->get();

       return view('admin.chitiethoadon.chitiet',['chitiethoadon'=>$chitiethoadon,'hoadon'=>$hoadon]);
    
    }

}
