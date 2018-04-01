@extends('master')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sanpham)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								

								@foreach($sanpham as $new)
								<div class="col-sm-3">
									<div class="single-item">
										@if($new->giakhuyenmai!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif

										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$new->id)}}"><img src="public/source/image/product/{{$new->hinhanh}}" alt="" height="250px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->tensanpham}}</p>
											<p class="single-item-price">
												@if($new->giakhuyenmai==0)
												<span >{{number_format($new->dongia)}} VND</span>
												@else
												<span class="flash-del">{{ number_format($new->dongia)}} VND</span>
												<span class="flash-sale">{{ number_format($new->giakhuyenmai)}} VND</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themvaogio',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Chi tiết<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

					
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection