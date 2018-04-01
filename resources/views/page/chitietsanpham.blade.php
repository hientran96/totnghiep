@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title" style="font-weight: bold;">Sản phẩm {{$sanpham->tensanpham}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Home</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				

					<div class="row">
						<div class="col-sm-4">
							<img width="500px" height="250px;" ; src="public/source/image/product/{{$sanpham->hinhanh}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title" style="font-weight: bold; color: red;font-size:25px;">{{$sanpham->tensanpham}}</p>
								<p class="single-item-price">
									@if($sanpham->giakhuyenmai==0)
												<span >{{number_format($sanpham->dongia)}} VND</span>
												@else
												<span class="flash-del">{{ number_format($sanpham->dongia)}} VND</span>
												<span class="flash-sale">{{ number_format($sanpham->giakhuyenmai)}} VND</span>
												@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{!!$sanpham->mota!!}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-options">	
								<a  class="add-to-cart" href="{{route('themvaogio',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i> </a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description" style="font-weight: bold;">Chi tiết</a></li>
							
						</ul>

						<div class="panel" id="tab-description">

							{!!$sanpham->chitiet!!}
						</div>
						
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự</h4>

						<div class="row">
							@foreach($sptuongtu as $sptt)
							
							<div class="col-sm-4">
								<div class="single-item">
									@if($sptt->giakhuyenmai!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
									<div class="single-item-header">
										<a href="product.html"><img src="public/source/image/product/{{$sptt->hinhanh}}" alt="" height="150px;"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sptt->tensanpham}}</p>
										<p class="single-item-price">
											@if($sptt->giakhuyenmai==0)
												<span >{{number_format($sptt->dongia)}} VND</span>
												@else
												<span class="flash-del">{{ number_format($sptt->dongia)}} VND</span>
												<span class="flash-sale">{{ number_format($sptt->giakhuyenmai)}} VND</span>
												@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themvaogio',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$sptt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$sptuongtu->links()}}</div>
					</div> <!-- .beta-products-list -->
				
				
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
