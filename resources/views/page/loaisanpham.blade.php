@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm </h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Home</a> / <span>Loại sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loai as  $l)
							<li><a href="{{route('loaisanpham',$l->id)}}">{{$l->tenloai}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($SP_theoloai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($SP_theoloai as $SP)
								<div class="col-sm-4">
									<div class="single-item">
										@if($SP->giakhuyenmai!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$SP->id)}}"><img src="public/source/image/product/{{$SP->hinhanh}}" alt="" height="250px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$SP->tensanpham}}</p>
											<p class="single-item-price">
												@if($SP->giakhuyenmai!=0)
												
												
												<span class="flash-del">{{ number_format($SP->dongia)}} VND</span>
												<span class="flash-sale">{{ number_format($SP->giakhuyenmai)}} VND</span>
												@else

												<span >{{number_format($SP->dongia)}} VND</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($SP_khac)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($SP_khac as $SPK)
								<div class="col-sm-4">
									<div class="single-item">
										@if($SPK->giakhuyenmai!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="product.html"><img src="public/source/image/product/{{$SPK->hinhanh}}" alt="" height="250px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$SPK->tensanpham}}</p>
											<p class="single-item-price">
												@if($SPK->giakhuyenmai!=0)
												
												
												<span class="flash-del">{{ number_format($SPK->dongia)}} VND</span>
												<span class="flash-sale">{{ number_format($SPK->giakhuyenmai)}} VND</span>
												@else

												<span >{{number_format($SPK->dongia)}} VND</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{$SP_khac->links()}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> 
@endsection