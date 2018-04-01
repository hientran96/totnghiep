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
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                       @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Loại sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                 <th>giá khuyến mãi</th>
                                <th>Đơn vị</th>
                                 <th>Hình ảnh</th>
                                <th>Trạng thái</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($sanpham as $sp)
                            <tr class="odd gradeX" align="center">
                                <td>{{$sp->id}}</td>
                                <td>{{$sp->loaisanpham->tenloai}}</td>
                                <td>{{$sp->tensanpham}}</td>
                                
                                <td>{{$sp->dongia}}</td>
                                <td>{{$sp->giakhuyenmai}}</td>
                                <td>{{$sp->donvi}}</td>
                                <td><img width="70px;" src="public/source/image/product/{{$sp->hinhanh}}"><br>{{$sp->hinhanh}}</td>
                                <td>
                                    @if($sp->new==0)
                                        {{"Mới"}}
                                    @else
                                        {{"Cũ"}}
                                    @endif
                               </td>
                               
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/sanpham/xoa/{{$sp->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/sua/{{$sp->id}}">Edit</a></td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection