<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\loaisanpham;

class loaiSPController extends Controller
{
    //
    public function getthem(){

    	return view('admin.loaiSP.them');
    }
    public function getsua($id){
        $loaisp=loaisanpham::find($id);
    	return view('admin.loaiSP.sua',['loaisp'=>$loaisp]);
    }
    public function getdanhsach(){
         $loaisp= loaisanpham::all();
    	return view('admin.loaiSP.danhsach',['loaisp'=>$loaisp]);
    }
    public function postthem(Request $req)
    {
        $this->validate($req,[
            'tenloai'=>'required|min:3|max:225|unique:loaisanpham,tenloai'
        ],[
            'tenloai.required'=>'Vui lòng nhập loại sản phẩm',
            'tenloai.min'=>'Tên loại phải chứa ít nhất 3 ký tự',
            'tenloai.max'=>'Tên loại tối đa 225 ký tự'
        ]);
        $loaisp = new loaisanpham;
        $loaisp ->tenloai =$req->tenloai;
        $loaisp->save();
        return redirect('admin/loaiSP/them')->with('thongbao','Thêm thành công');
    }
    public function postsua(Request $req,$id){
        $loaisp= loaisanpham::find($id);
        $this->validate($req,
            [
                'tenloai'=>'required|unique:loaisanpham,tenloai|min:3|max:255'
            ],
            [
                'tenloai.required'=>'Vui lòng nhập tên loại sản phẩm',
                'tenloai.unique'=>'Tên loại của bạn đã tồn tại',
                'tenloai.min'=>'Tên loại phải có ít nhất 3 ký tự',
                'tenloai.max'=>'Tên loại chứa tối đa 225 ký tự'

            ]
        );
        $loaisp->tenloai=$req->tenloai;
        $loaisp->save();
        return redirect('admin/loaiSP/sua/'.$id)->with('thongbao','Sửa thành công');

    }
    public function getxoa($id)
    {
        $loaisp= loaisanpham::find($id);
        $loaisp->delete();
        return redirect('admin/loaiSP/danhsach')->with('thongbao','Xóa thành công');
    }
}
