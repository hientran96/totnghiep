<?php

namespace App\Http\Controllers;
use App\slide;
use App\sanpham;
use App\loaisanpham;
use App\Cart;
use Session;
use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    //
    public function getIndex(){
        $slide= slide::all();
        $new_sanpham= sanpham::where('new',1)->paginate(4);
        $sanphamkhuyenmai= sanpham::where('giakhuyenmai','<>',0)->paginate(4);
    	return view('page.trangchu',compact('slide','new_sanpham','sanphamkhuyenmai'));
    }
    public function getloaiSP($loai)
    {
        $SP_theoloai =sanpham::where('id_loaisanpham',$loai)->get();
        $SP_khac= sanpham::where('id_loaisanpham','<>',$loai)->paginate(3);
        $loai= loaisanpham::all();
        $loai_SP= loaisanpham::where('id',$loai)->first();
    	return view('page.loaisanpham',compact('SP_theoloai','SP_khac','loai','loai_SP'));
    }
    public function getchitiet(Request $re)
    {
        $sanpham=sanpham::where('id',$re->id)->first();
        $sptuongtu= sanpham::where('id_loaisanpham',$sanpham->id_loaisanpham)->paginate(3);
        return view('page.chitietsanpham',compact('sanpham','sptuongtu'));
    }
    public function getSP()
    {
    	return view('page.sanpham');
    }
     public function getlienhe()
    {
        return view('page.lienhe');
    }
     public function getgioithieu()
    {
        return view('page.gioithieu');
    }
    public function getthemvaogio(Request $re,$id)
    {
        $sanpham= sanpham::find($id);
        $oldcart= Session('cart')?Session::get('cart'):null;

        $cart = new Cart($oldcart);
        $cart->add($sanpham,$id);
        $re->Session()->put('cart',$cart); 
        return redirect()->back();
    }
    public function getxoaitemcart($id)
    {
        $oldcart = session::has('cart')?session::get('cart'):null;
        $cart = new Cart($oldcart);
        $cart->removeItem($id);
        Session::put('cart',$cart);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart');
        }
         return redirect()->back();
    }
}
