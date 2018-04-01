<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\loaisanpham;
use App\sanpham;

class sanphamController extends Controller
{
	public function getthem(){
        $loaiSP= loaisanpham::all();
        $sanpham=sanpham::all();
    	return view('admin.sanpham.them',['loaiSP'=>$loaiSP]);
    }
    public function getsua($id){
        
         $loaiSP= loaisanpham::all();
       
        $sanpham=sanpham::find($id);
    	return view('admin.sanpham.sua',['sanpham'=>$sanpham,'loaiSP'=>$loaiSP]);
    }

    public function getdanhsach(){
        $sanpham= sanpham::orderBy('id','DESC')->get();
    	return view('admin.sanpham.danhsach',['sanpham'=>$sanpham]);
    }
     public function postthem(Request $req)
    {
        $this->validate($req,[
            'loaisanpham'=>'required',
            'tensanpham'=>'required|min:3|max:225|unique:sanpham,tensanpham',
            'mota'=>'required',
            'dongia'=>'required|numeric',
            'donvi'=>'required',
            'giakhuyenmai'=>'numeric',
            'hinhanh'=>'required',
            //'chitiet'=>'required'

        ],[
            'loaisanpham.required'=>'Bạn chưa chọn loại sản phẩm',
            'tensanpham.required'=>'Vui lòng nhập loại sản phẩm',
            'tensanpham.min'=>'Tên loại phải chứa ít nhất 3 ký tự',
            'tensanpham.max'=>'Tên loại tối đa 225 ký tự',
            'tensanpham.unique'=>'Sản phẩm đã tồn tại',
            'mota.required'=>'Bạn chưa nhập mô tả cho sản phẩm',
            'dongia.required'=>'Vui lòng nhập giá sản phẩm',
            'dongia.numeric'=>'Giá sản phẩm phải là số',
            'donvi.required'=>'Vui lòng nhập đơn vị tính',
            'giakhuyenmai.numeric'=>'Giá khuyến mãi sản phẩm phải là số',
             'hinhanh.required'=>'Vui lòng thêm hình ảnh sản phẩm',
            
            //'chitiet.required'=>'Bạn chưa nhập chi tiết sản phẩm'


        ]);
        $sanpham = new sanpham;
        $sanpham->id_loaisanpham=$req->loaisanpham;
        $sanpham->tensanpham =$req->tensanpham;
        $sanpham->mota=$req->mota;
        $sanpham->dongia=$req->dongia;
        $sanpham->donvi=$req->donvi;
        $sanpham->giakhuyenmai=$req->giakhuyenmai;
        $sanpham->new =$req->new;
       
        $sanpham->chitiet=$req->chitiet;
        if($req->hasFile('hinhanh'))
        {
            $file=$req->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi!='png' && $duoi !='jpeg')
            {
                return redirect('admin/sanpham/them')->with('loi','Đuôi file phải là png,jpg,jpeg');
            }
        
            $name= $file->getClientOriginalName();
            
            $hinhanh= str_random(4)."_".$name;
            $file->move("public/source/image/product",$hinhanh);
            $sanpham->hinhanh=$hinhanh;
           //echo $hinhanh;
        }
        else
        {
            $sanpham->hinhanh="";

        }
        $sanpham->save();    
       return redirect('admin/sanpham/them')->with('thongbao','Thêm thành công');
    }
    public function postsua(Request $req,$id){
        $sanpham= sanpham::find($id);
       $this->validate($req,[
            'loaisanpham'=>'required',
            'tensanpham'=>'required|min:3|max:225',
            'mota'=>'required',
            'dongia'=>'required|numeric',
            'donvi'=>'required',
            'giakhuyenmai'=>'numeric',
            //'hinhanh'=>'required',
            //'chitiet'=>'required'

        ],[
            'loaisanpham.required'=>'Bạn chưa chọn loại sản phẩm',
            'tensanpham.required'=>'Vui lòng nhập loại sản phẩm',
            'tensanpham.min'=>'Tên loại phải chứa ít nhất 3 ký tự',
            'tensanpham.max'=>'Tên loại tối đa 225 ký tự',
           
            'mota.required'=>'Bạn chưa nhập mô tả cho sản phẩm',
            'dongia.required'=>'Vui lòng nhập giá sản phẩm',
            'dongia.numeric'=>'Giá sản phẩm phải là số',
            'donvi.required'=>'Vui lòng nhập đơn vị tính',
            'giakhuyenmai.numeric'=>'Giá khuyến mãi sản phẩm phải là số',
             //'hinhanh.required'=>'Vui lòng nhập giá sản phẩm',
            
            //'chitiet.required'=>'Bạn chưa nhập chi tiết sản phẩm'


        ]);
       $sanpham->id_loaisanpham=$req->loaisanpham;
        $sanpham->tensanpham =$req->tensanpham;
        $sanpham->mota=$req->mota;
        $sanpham->dongia=$req->dongia;
        $sanpham->donvi=$req->donvi;
        $sanpham->giakhuyenmai=$req->giakhuyenmai;
       $sanpham->new =$req->new;
        $sanpham->chitiet=$req->chitiet;
        if($req->hasFile('hinhanh'))
        {
            $file=$req->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi!='png' && $duoi !='jpeg')
            {
                return redirect('admin/sanpham/them')->with('loi','Đuôi file phải là png,jpg,jpeg');
            }
        
            $name= $file->getClientOriginalName();
            
            $hinhanh= str_random(4)."_".$name;
            $file->move("public/source/image/product",$hinhanh);
            unlink("public/source/image/product/".$sanpham->hinhanh);
          
            $sanpham->hinhanh=$hinhanh;
           //echo $hinhanh;
        }
        
        $sanpham->save();    
        return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa thành công');

    }
    //
    public function getxoa($id)
    {
        $sanpham= sanpham::find($id);
        $sanpham->delete();
        return redirect('admin/sanpham/danhsach')->with('thongbao','Xóa thành công');

    }
}
