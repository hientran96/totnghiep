<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\slide;

class slideController extends Controller
{
    public function getdanhsach(){
         $slide=slide::all();
        return view('admin.slide.danhsach',['slide'=>$slide]);
    }
	public function getthem(){
    	return view('admin.slide.them');
    }

    public function getsua($id){
        $slide=slide::find($id);
    	return view('admin.slide.sua',['slide'=>$slide]);
    }
   
     public function postthem(Request $req)
    {


        $this->validate($req,[
          
            'hinhanh'=>'required'
            //'link'=>'required'

        ],[
           
             'hinhanh.required'=>'Vui lòng thêm hình ảnh sản phẩm'
            
            //'link.required'=>'Bạn chưa nhập link sản phẩm'


        ]);
        $slide = new slide;
        if ($req->has('link')) {
            $slide->link=$req->link;
        }
        if($req->hasFile('hinhanh'))
        {
            $file=$req->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi!='png' && $duoi !='jpeg')
            {
                return redirect('admin/slide/them')->with('loi','Đuôi file phải là png,jpg,jpeg');
            }
        
            $name= $file->getClientOriginalName();
            
            $hinhanh= str_random(4)."_".$name;
            $file->move("public/source/image/slide",$hinhanh);
            $slide->hinhanh=$hinhanh;
           //echo $hinhanh;
        }
        else
        {
            $slide->hinhanh="";

        }
        $slide->save();    
       return redirect('admin/slide/them')->with('thongbao','Thêm thành công');
    }
     public function postsua(Request $req,$id)
    {
        
        $this->validate($req,[
          
            'hinhanh'=>'required'
            //'link'=>'required'

        ],[
           
             'hinhanh.required'=>'Vui lòng thêm hình ảnh sản phẩm'
            
            //'link.required'=>'Bạn chưa nhập link sản phẩm'


        ]);
         $slide= slide::find($id);
        if ($req->has('link')) {
            $slide->link=$req->link;
        }
        if($req->hasFile('hinhanh'))
        {
            $file=$req->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi!='png' && $duoi !='jpeg')
            {
                return redirect('admin/slide/them')->with('loi','Đuôi file phải là png,jpg,jpeg');
            }
            unlink("public/source/image/slide/".$slide->hinhanh);
          
            $name= $file->getClientOriginalName();
            
            $hinhanh= str_random(4)."_".$name;
            $file->move("public/source/image/slide",$hinhanh);
            $slide->hinhanh=$hinhanh;
           //echo $hinhanh;
        }
       
        $slide->save();    
         return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công');

    }
      public function getxoa($id)
    {
        $slide= slide::find($id);
        $slide->delete();
        return redirect('admin/slide/danhsach')->with('thongbao','Xóa thành công');

    } 
}
