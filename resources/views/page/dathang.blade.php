	@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="trangchu">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	     
	<div class="container">
		<div id="content">
            @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
			<form action="{{route('dathang')}}" method="POST" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
						<div style="color: red;font-weight: bold; text-align: center; font-size: 30px;">Đặt hàng</div>
						<div class="space20">&nbsp;</div>
					<div class="col-sm-6">
					<h3>Thông tin khách hàng</h3>
					<div class="space20">&nbsp;</div>
						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" id="hovaten" name="hovaten" placeholder="Họ tên" required>
						</div>
						<div class="form-block">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gioitinh" value="Nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gioitinh" value="Nữ" style="width: 10%"><span>Nữ</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required placeholder="">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="adress" name="diachi" placeholder="" required>
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="sdt" name="sdt" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="note" name="note"></textarea>
						</div>
						
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
										@if(Session::has('cart'))
										@foreach($sanphamtronggio as $SPTG)
									<!--  one item	 -->
										<div class="media">
											<img width="15%" src="public/source/image/product/{{$SPTG['item']['hinhanh']}}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$SPTG['item']['tensanpham']}}</p>
												
												<span class="color-gray your-order-info">Số lượng: {{$SPTG['qty']}}</span>
												<span class="color-gray your-order-info">Đơn giá: {{number_format($SPTG['price']/$SPTG['qty'])}} VND</span>
											</div>
										</div>
									<!-- end one item -->
									@endforeach
									@endif
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}} VND @else 0 VND @endif</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="hinhthucthanhtoan" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn vui kiểm tra đơn hàng đầy đủ rồi mới tiến hành thanh toán tiền cho nhân viên giao hàng.
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="hinhthucthanhtoan" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" >
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Trần Thị Mỹ Hiền
											<br>- Ngân hàng Vietcombank, Chi nhánh Long Xuyên, An Giang
										</div>						
									</li>
									
								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection