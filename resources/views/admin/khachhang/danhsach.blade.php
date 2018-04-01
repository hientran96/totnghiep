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
                                <th>Tên khách hàng</th>
                                <th>Giới tính</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Địa chỉ</th>
                        
                           
                            </tr>
                        </thead>
                        <tbody>

                         @foreach($khachhang as $kh)

                            <tr class="odd gradeX" align="center">
                                <td>{{$kh->id}}</td>
                                <td>{{$kh->hovaten}}</td>
                                <td>{{$kh->gioitinh}}</td>
                                <td>{{$kh->email}}</td>
                                <td>{{$kh->sdt}}</td>
                                <td>{{$kh->diachi}}</td>
                
                                
                              
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