@extends('master')
@section('content')
<div class="navbar-default sidebar" role="navigation">
    @include('submenu')
</div>

 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">News
                            <small>Thêm</small>
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
                        <form action="admin/news/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                         
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="tieude" placeholder="" />
                            </div>
                          <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" class="form-control" name="hinhanh" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea name="tomtat" id="demo" class="form-control ckeditor" rows="3"></textarea>
                            </div>
                             <div class="form-group">
                                <label>Nội dung</label>
                                <textarea name="noidung" id="demo" class="form-control ckeditor" rows="8"></textarea>
                            </div>
                          
                            <button type="submit" class="btn btn-default">Thêm News</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
