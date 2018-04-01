
<div id="header">

	<div class="header-body">
		<div class="container beta-relative">
			<div class="pull-left">
				<a href="{{route('trangchu')}}" id="logo"><img src="public/source/image/Logo.png" width="200px" alt=""></a>
			</div>
			<div class="pull-right beta-components space-left ov">
				<div class="space10">&nbsp;</div>
				<div class="beta-comp" >
					<form role="search" method="get" id="searchform" action="{{route('search')}}" style="width:500px;">
				        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." style=" border-radius: 15px; border-color:#F62817; border-width:2px;" />
				        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
					</form>
				</div>
				<div class="beta-comp">
					@if(Session::has('cart'))
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (
								@if(Session::has('cart'))
								{{Session('cart')->totalQty}}
								@else Trống 
								@endif
								) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								
								@foreach($sanphamtronggio as $SPTG)
								<div class="cart-item">
								
									<div class="media">
										<a class="pull-left" href="#"><img src="public/source/image/product/{{$SPTG['item']['hinhanh']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$SPTG['item']['tensanpham']}}</span>
											<span class="cart-item-options">Size: XS; Colar: Navy</span>
											<span class="cart-item-amount">{{$SPTG['qty']}}*<span>
												@if($SPTG['item']['giakhuyenmai']==0)
												{{number_format($SPTG['item']['dongia'])}}
												@else
												{{number_format($SPTG['item']['giakhuyenmai'])}}
												@endif
										</span></span>
										@if($SPTG['qty']>1)
										
											<a class="bnt" href="{{route('xoa1sanpham',$SPTG['item']['id'])}}" ><i class="fa fa-times">Xóa 1</i></a>
											<a class="bnt" href="{{route('xoagiohang',$SPTG['item']['id'])}}" ><i class="fa fa-times">Xóa hết</i></a>
										
										@else
										<a class="bnt" href="{{route('xoagiohang',$SPTG['item']['id'])}}" ><i class="fa fa-times">Xóa</i></a>
										@endif
										</div>
										
									</div>
								</div>
								@endforeach
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}} VND</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					@endif <!-- .cart -->
					</div>
			</div>
			<marquee scrollamount="200" scrolldelay="1800" style="height: 30px; ">
				<span style="color: red; font-size: 25px;">Giá Sốc - Uy Tín - Chất Lượng</span>
			</marquee>
			<div class="clearfix"></div>
		</div> 
		<!-- .container -->

	</div> <!-- .header-body -->
	<div class="header-bottom" style="background-color: #463E3F;">
		<div class="container">
			<a class="visible-xs beta-menu-toggle pull-right" href="trangchu"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
			<div class="visible-xs clearfix"></div>
			<nav class="main-menu">
				<ul class="l-inline ov">
					
					<li  style="margin-left:-80px; "><a style="text-decoration: none;"><img src="public/source/image/iconmenu.ico"  height="16px;" " >&nbsp; Danh mục sản phẩm</a>
						<ul class="sub-menu">
							@foreach($loaisanpham as $loai)
							<li><a href="{{route('loaisanpham',$loai->id)}}" style="text-decoration: none;">{{$loai->tenloai}}</a></li>
							@endforeach
							
						</ul>

					</li>
					<li><a href="{{route('trangchu')}}" style="text-decoration: none;"><img src="public/source/image/if_home_48_10317.ico"  height="20px;" width=:"80px;">&nbsp;Trang chủ</a></li>
					<li><a href="{{route('gioithieu')}}" style="text-decoration: none;">Giới thiệu</a></li>

					<li><a href="{{route('blog')}}" style="text-decoration: none;">Blog</a></li>
					<li><a href="{{route('lienhe')}}" style="text-decoration: none;">Liên hệ</a></li>
				
						
						@if(Auth::user())
				
						<li><a href="{{route('trangchu')}}" style="margin-left: 230px;">{{Auth::user()->name}}</a>
							<ul class="sub-menu" style="margin-left: 230px;">
								<li><a href="admin/loaiSP/danhsach">Quản lý</a></li>
								
									<li><a href="admin/user/doithongtin/{{Auth::user()->id}}">Đổi thông tin</a></li>
							
								<li><a href="logout">Logout</a></li>
							</ul>
						</li>
						@else
						
					<!-- <a href="login" style="font-weight: bold;color: #0000ff; text-decoration: none;" ><img src="public/source/image/line.ico" style="width:30px;height: 20px;margin-left: 280px;"><blink>Hotline</blink>ss</a> -->
						@endif
					
				</ul>
					
				
			

				<div class="clearfix"></div>
			</nav>
		</div> <!-- .container -->
	</div> <!-- .header-bottom -->
</div>
