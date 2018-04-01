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
                              
                                <th>Tên khách hàng</th>
                                <th>Thông tin người dùng</th>
                                <th>Tổng tiền</th>
                                <th>Note</th>
                                <th>Trạng thái</th>
                                <th>Xóa</th>
                                <th>Chi tiết</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                         @foreach($hoadon as $d)

                            <tr class="odd gradeX" align="center">
                               
                                <td>{{$d->hovaten}}</td>
                                <td>Giới tính:
                                    {{$d->gioitinh}}</br>
                                    Số điện thoại:{{$d->sdt}}</br>
                                    Địa chỉ: {{$d->diachi}}</br>
                                    Hình thức thanh toán:{{$d->hinhthucthanhtoan}}</br>
                                    Ngày mua:{{$d->ngaymua}} 
                                </td>
                                <td>{{number_format($d->tongtien)}}</td>
                               
                                <td>{{$d->note}}</td>
                                <th>Đã duyệt</th>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/chitiethoadon/chitiet/{{$d->id}}">Chi tiết</a></td>
                                
                              
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