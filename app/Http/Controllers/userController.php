<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use Hash;


class userController extends Controller
{
    //
    public function getdanhsach(){
    	$user=User::all();
    	return view('admin.user.danhsach',['user'=>$user]);
        
    }
	public function getthem(){
    	return view('admin.user.them');
    }

    public function getsua($id){
        $user= User::find($id);
        return view('admin.user.sua',['user'=>$user]);
       
    }
    public function getdoithongtin($id){
        $user= User::find($id);
        return view('admin.user.doithongtin',['user'=>$user]);
       
    }
   
     public function postthem(Request $req)
    {
        $this->validate($req,[
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:3|max:50',
            're_password'=>'required|same:password'
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng ít nhất 3 ký tự',
            'email.required'=>'Tên email không được bỏ trống',
            'email.email'=>'Vui lòng nhập đúng định dạng email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Password không được bỏ trống',
            'password.min'=>'Password chứa ít nhất 3 ký tự',
            'password.max'=>'Password chứa tối đa 50 ký tự',
            're_password.required'=>'Vui lòng nhập lại password',
            're_password.same'=>'Mật khẩu nhập lại chưa khớp'
        ]);
        $user = new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=bcrypt($req->password);
        $user->quyen =$req->quyen;
        $user->save();
        return redirect('admin/user/them')->with('thongbao','Thêm thành công');
      
    }
     public function postsua(Request $req,$id)
    {
         $this->validate($req,[
            'name'=>'required|min:3'
            //'email'=>'required|email|unique:users,email',
           
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng ít nhất 3 ký tự'
        ]);
        $user= User::find($id);
        $user->name=$req->name;
        $user->email=$req->email;
    
        $user->quyen =$req->quyen;
        
        $user->save();
         return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa thành công');
        

    }
    public function postdoithongtin(Request $req,$id)
    {
         $this->validate($req,[
            'name'=>'required|min:3'
            //'email'=>'required|email|unique:users,email',
           
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng ít nhất 3 ký tự'
        ]);
     
         $user= User::find($id);
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=bcrypt($req->password);
       $user->quyen =$req->quyen;
        
        $user->save();
         return redirect('admin/user/doithongtin/'.$id)->with('thongbao','Đã đổi thông tin thành thành công');
        

    }
      public function getxoa($id)
    {
       $user= User::find($id); 
        $soluong = User::where('quyen', '=', 1)->count();
       //  return  $soluong;
        if($soluong<=1 && $user->quyen==1)
            return redirect('admin/user/danhsach')->with('thongbao','Không được xóa admin cuối');
        else
        {
            $user->delete();
           return redirect('admin/user/danhsach')->with('thongbao','Xóa người dùng thành công');
        }

    }   
    public function getlogin()
    {
        return view('login');
    }
    public function postlogin(Request $req)
    {   
       $this->validate($req,[
            'email'=>'required',
            'password'=>'required|min:3|max:50'
        ],[
            'email.required'=>'Vui lòng nhập email',
            'password.required'=>'Vui lòng nhập mật khẩu',
             'password.min'=>'Mật khẩu chứa ít nhất 3 ký tự',
             'password.max'=>'Mật khẩu không quá 50 ký tự'
        ]);
      
        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password]))
        {
               return redirect('admin/loaiSP/danhsach')->with('thongbao','đăng nhập thành công');
        }
        else
        { 

           return redirect()->back()->with('thongbao','đăng nhập không thành công');
        }
    }
    public function getlogout()
    {
        Auth::logout();
        return redirect('login');
    }

}




