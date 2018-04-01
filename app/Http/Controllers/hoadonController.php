<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\khachhang;
use App\hoadon;
use App\User;


class hoadonController extends Controller
{
	
    public function getdanhsach()
    {
        $hoadon=hoadon::
		join('khachhang','hoadon.id_khachhang','=','khachhang.id')
        ->select(['hoadon.id',
        	'khachhang.hovaten',
        	'khachhang.gioitinh',
        	'khachhang.email',
        	'khachhang.sdt',
        	'khachhang.diachi',
        	'hoadon.tongtien',
        	'hoadon.ngaymua',
        	'hoadon.hinhthucthanhtoan',
        	'khachhang.note',

        ])->where('hoadon.trangthai','=','c')->orderBy('id','DESC')
        ->get();
       
    	return view('admin.hoadon.danhsach',['hoadon'=>$hoadon]);
    }
    public function getdanhsachduyet()
    {
        $hoadon=hoadon::
        join('khachhang','hoadon.id_khachhang','=','khachhang.id')
        ->select(['hoadon.id',
            'khachhang.hovaten',
            'khachhang.gioitinh',
            'khachhang.email',
            'khachhang.sdt',
            'khachhang.diachi',
            'hoadon.tongtien',
            'hoadon.ngaymua',
            'hoadon.hinhthucthanhtoan',
            'khachhang.note'
        ])
        ->where('trangthai','=','d')
        ->orderBy('id','desc')
        ->get();
       
         
         return view('admin.hoadon.hoadonduyet',['hoadon'=>$hoadon]);
    }
     public function getdanhsachkhongduyet()
    {
        $hoadon=hoadon::
        join('khachhang','hoadon.id_khachhang','=','khachhang.id')
        ->select(['hoadon.id',
            'khachhang.hovaten',
            'khachhang.gioitinh',
            'khachhang.email',
            'khachhang.sdt',
            'khachhang.diachi',
            'hoadon.tongtien',
            'hoadon.ngaymua',
            'hoadon.hinhthucthanhtoan',
            'khachhang.note'
        ])
        ->where('trangthai','=','kd')
        ->orderBy('id','desc')
        ->get();
         return view('admin.hoadon.hoadonkhongduyet',['hoadon'=>$hoadon]);
    }
    public function getduyetdon($id,$trangthai)
    {
        $hoadon=hoadon::find($id);
      
        if($trangthai=="kd")
        {
            $hoadon->trangthai="kd";
        }
        elseif($trangthai=="d")
        {
            $hoadon->trangthai="d";
        }
        else
        {
            $hoadon->trangthai="c";
        }
        
        $hoadon->save();
        return redirect()->back();


    }





}
