<?php

namespace App\Http\Controllers;
use App\slide;
use App\sanpham;
use App\loaisanpham;
use App\Cart;
use Session;
use App\User;
use App\khachhang;
Use App\hoadon;
use App\chitiethoadon;
use App\news;
use Hash;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;


class PageController extends Controller
{
    
    function _construct()
    {
        $slide=slide::all();
        view()->share('slide',$slide);
    }
    public function getIndex(){
        $slide= slide::all();

        $new_sanpham= sanpham::where('new',0)->orderBy('created_at','DESC')->paginate(8);
        $sanphamkhuyenmai= sanpham::where('giakhuyenmai','<>',0)->orderBy('created_at','DESC')->paginate(4);
    	return view('trangchu',compact('slide','new_sanpham','sanphamkhuyenmai'));
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
       public function gettinchitiet(Request $re)
    {
        $news=news::where('id',$re->id)->first();
 
        return view('page.tinchitiet',compact('news'));
    }
    // public function getSP()
    // {
    // 	return view('page.sanpham');
    // }
     public function getblog()
    {
        $news=news::all();
        $ne= news::where('id',$news)->orderBy('created_at','DESC')->paginate(6);
        return view('page.blog',compact('news','ne'));
    }
     public function getlienhe()
    {
        return view('page.lienhe');
    }
     public function gethotromuahang()
    {
        return view('page.hotromuahang');
    }
      public function getchinhsachdoitra()
    {
        return view('page.chinhsachdoitra');
    }
      public function getchinhsachdaily()
    {
        return view('page.chinhsachdaily');
    }
     public function getchinhsachgiaohang()
    {
        return view('page.chinhsachgiaohang');
    }
     public function getgioithieu()
    {
        return view('page.gioithieu');
    }
     public function getvitrituyendung()
    {
        return view('page.vitrituyendung');
    }
     public function getyeucau()
    {
        return view('page.yeucau');
    }
     public function getnhansu()
    {
        return view('page.nhansu');
    }


    public function getthemvaogio(Request $req,$id){
        $sanpham= sanpham::find($id);
        $oldCart=session('cart')?session::get('cart'):null;
        $cart=new cart($oldCart);
        $cart->add($sanpham,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getxoagiohang($id){
        $oldCart= Session::has('cart')?Session::get('cart'):null;
        $cart= new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        
        return redirect()->back();
    }
   public function getdathang()
   {

     if(Session::has('cart'))
         {
            $oldcart=Session::get('cart');
            $cart=new Cart($oldcart);
           
             return view('page.dathang',['sanphamtronggio'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
        }
        else
        {
            return view('page.dathang');
        }
   }
    
   public function postdathang(Request $req)
   {
    $cart = Session::get('cart');
     $khachhang= new khachhang;
     $khachhang->hovaten= $req->hovaten;
     $khachhang->gioitinh=$req->gioitinh;
     $khachhang->email=$req->email;
     $khachhang->sdt=$req->sdt;
     $khachhang->diachi=$req->diachi;
     $khachhang->note=$req->note;
     $khachhang->save();

     $hoadon = new hoadon;
     $hoadon->id_khachhang = $khachhang->id;
     $hoadon->ngaymua = date('y-m-d');
     $hoadon->tongtien=$cart->totalPrice;
     $hoadon->hinhthucthanhtoan= $req->hinhthucthanhtoan;
     $hoadon->trangthai="c";
     $hoadon->save();

     foreach($cart->items as $key => $value)
     {
        $chitiethoadon= new chitiethoadon;
        $chitiethoadon->id_hoadon=$hoadon->id;
        $chitiethoadon->id_sanpham= $key;
        $chitiethoadon->soluong=$value['qty'];
        $chitiethoadon->dongia=$value['price']/$value['qty'];
         $chitiethoadon->save();
    }
    
     Session::forget('cart');
      return redirect('dathang')->with('thongbao','Đặt hàng thành công');

    
   }
     public function getxoa1sanpham($id){
        $oldCart= Session::has('cart')?Session::get('cart'):null;
        $cart= new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        
        return redirect()->back();
    }
   
    public function getsearch(Request $req){
        $sanpham= sanpham::where('tensanpham','like','%'.$req->key.'%')
        ->orWhere('dongia',$req->key)
        ->get();
        return view('page.search',compact('sanpham'));
    }
    
  
    
        
}
