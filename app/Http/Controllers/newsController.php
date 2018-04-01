<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\news;

class newsController extends Controller
{
    public function getthem(){
        
        $news=news::all();
        return view('admin.news.them',['news'=>$news]);
    }
    public function getsua($id){
        
        $news=news::find($id);
        return view('admin.news.sua',['news'=>$news]);
    }

    public function getdanhsach(){
        $news= news::orderBy('id','DESC')->get();
        return view('admin.news.danhsach',['news'=>$news]);
    }
     public function postthem(Request $req)
    {
        $this->validate($req,[
            'tieude'=>'required|min:3',
            'tomtat'=>'required|min:3',
            'noidung'=>'required|min:3'

        ],[
            'tieude.required'=>'Vui lòng nhập tiêu đề tin tức',
            'tieude.min'=>'Tiêu đề phải chứa ít nhất 3 ký tự',
           
          
            'tomtat.required'=>'Bạn chưa nhập tóm tắt cho tin tức',
            'tomtat.min'=>'Tóm tắt loại phải chứa ít nhất 3 ký tự',
            'noidung.required'=>'Vui lòng nhập nội dung',
           'noidung.min'=>'Nội dung  phải chứa ít nhất 3 ký tự'

        ]);
        $news = new news;
     
        $news->tieude =$req->tieude;
        $news->tomtat=$req->tomtat;
        $news->noidung=$req->noidung;

        if($req->hasFile('hinhanh'))
        {
            $file=$req->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi!='png' && $duoi !='jpeg')
            {
                return redirect('admin/news/them')->with('loi','Đuôi file phải là png,jpg,jpeg');
            }
        
            $name= $file->getClientOriginalName();
            
            $hinhanh= str_random(4)."_".$name;
            $file->move("public/source/image/news",$hinhanh);
            $news->hinhanh=$hinhanh;
           //echo $hinhanh;
        }
        else
        {
            $news->hinhanh="";

        }
        $news->save();    
       return redirect('admin/news/them')->with('thongbao','Thêm thành công');
    }
    public function postsua(Request $req,$id){
        $news= news::find($id);
       $this->validate($req,[
         
            'tieude'=>'required|min:3',
            'tomtat'=>'required|min:3',
            'noidung'=>'required|min:3'
           
            //'hinhanh'=>'required',


        ],[
            
            'tieude.required'=>'Vui lòng nhập tiêu đề tin tức',
            'tieude.min'=>'Tiêu đề phải chứa ít nhất 3 ký tự',

           
            'tomtat.required'=>'Bạn chưa nhập tóm tắt',
            'tomtat.min'=>'Tóm tắt phải chứa ít nhất 3 ký tự',
            'noidung.required'=>'Vui lòng nhập nội dung',
            'noidung.min'=>'Nội dung phải chứa ít nhất 3 ký tự'
            
        


        ]);
     
        $news->tieude =$req->tieude;
        $news->tomtat=$req->tomtat;
        $news->noidung=$req->noidung;
        if($req->hasFile('hinhanh'))
        {
            $file=$req->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi!='png' && $duoi !='jpeg')
            {
                return redirect('admin/news/them')->with('loi','Đuôi file phải là png,jpg,jpeg');
            }
        
            $name= $file->getClientOriginalName();
            
            $hinhanh= str_random(4)."_".$name;
            $file->move("public/source/image/news",$hinhanh);
            unlink("public/source/image/news/".$news->hinhanh);
          
            $news->hinhanh=$hinhanh;
           //echo $hinhanh;
        }
        
        $news->save();    
        return redirect('admin/news/sua/'.$id)->with('thongbao','Sửa thành công');

    }
    //
    public function getxoa($id)
    {
        $news= news::find($id);
        $news->delete();
        return redirect('admin/news/danhsach')->with('thongbao','Xóa thành công');

    }
}
