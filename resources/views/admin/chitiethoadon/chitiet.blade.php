@extends('master')
@section('content')
<div class="navbar-default sidebar" role="navigation">
    @include('submenu')
</div>
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn hàng
                            <small>{{$hoadon->hovaten}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                       @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                   
                    <label>Số điện thoại:  </label>
                    {{$hoadon->sdt}}</br>
                    <label>Email:  </label>
                    {{$hoadon->email}}</br>
                     <label>Sản phẩm: </label>
                    @foreach($chitiethoadon as $ct)
                </br><img width="70px;" src="public/source/image/product/{{$ct->hinhanh}}">
                    &nbsp;
                    {{$ct->tensanpham}} &nbsp;
                    <label>Số lượng: </label>
                    {{$ct->soluong}}&nbsp;
                    <label>Đơn giá: </label> 
                    {{number_format($ct->dongia)}}VND</br>

                    @endforeach
                     </br><label>Tổng tiền: </label>
                    {{number_format($hoadon->tongtien)}}
                    </br><label>Note: </label>
                    {{$hoadon->note}}
                

                        
                </div>
                    
               
                    
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection