@extends('master')
@section('content')
<div class="navbar-default sidebar" role="navigation">
    @include('submenu')
</div>

 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>{{$sanpham->tensanpham}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>
                            @endforeach
                            
                        </div>
                        @endif
                        @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                        <form action="admin/sanpham/sua/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <select class="form-control" name="loaisanpham">
                                    @foreach($loaiSP as $lsp)
                                    <option 
                                    @if($sanpham->loaisanpham->id == $lsp->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{$lsp->id}}">{{$lsp->tenloai}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="tensanpham" placeholder="" value="{{$sanpham->tensanpham}}" />
                            </div>
                            <div class="form-group">
                                <label>Đơn giá</label>
                                <input class="form-control" name="dongia" placeholder="" value="{{$sanpham->dongia}}" />
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mãi</label>
                                <input class="form-control" name="giakhuyenmai" placeholder="" value="{{$sanpham->giakhuyenmai}}" />
                            </div>
                            <div class="form-group">
                                <label>Đơn vị</label>
                                <input class="form-control" name="donvi" placeholder="" value="{{$sanpham->donvi}}" />
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <img width="70px;" src="public/source/image/product/{{$sanpham->hinhanh}}">
                                <input type="file" class="form-control" name="hinhanh" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name="mota" id="demo" class="form-control ckeditor" rows="3">
                                    {{$sanpham->mota}}
                                </textarea>
                            </div>
                             <div class="form-group">
                                <label>Chi tiết</label>
                                <textarea name="chitiet" id="demo" class="form-control ckeditor" rows="8">
                                    {{$sanpham->chitiet}}
                                </textarea>
                            </div>
                             <div class="form-group">
                                <label>Trạng thái</label>
                                <label class="radio-inline">
                                    <input name="new" value="0" 
                                    @if($sanpham->new==0){{"checked"}}
                                    @endif 
                                    type="radio">Mới
                                </label>
                                <label class="radio-inline">
                                    <input name="new" value="1" 
                                    @if($sanpham->new==1){{"checked"}}
                                    @endif type="radio">Cũ
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa sản phẩm</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
