@extends('master')

@section('content')
@include('page.slide')
<div class="container">
	
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<div style="text-align: center;font-weight: bold;color:#8B0000;"><h2>Sản Phẩm Mới</h2></div>
						
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($new_sanpham)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							

							@foreach($new_sanpham as $new)
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
											<span class="flash-del" style="font-size: 15px;">{{ number_format($new->dongia)}} VND</span>
											<span class="flash-sale">{{ number_format($new->giakhuyenmai)}} VND</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themvaogio',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$new_sanpham->links()}}</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<div style="text-align: center; font-weight: bold;color:#8B0000;"><h2>Sản Phẩm Khuyến mãi</h2></div>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($sanphamkhuyenmai)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($sanphamkhuyenmai as $SPKM)
							<div class="col-sm-3">
								<div class="single-item">
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$SPKM->id)}}"><img src="public/source/image/product/{{$SPKM->hinhanh}}" alt="" height="250px;"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$SPKM->tensanpham}}</p>
										<p class="single-item-price" >
											<span class="flash-del" style="font-size: 15px;">{{ number_format($SPKM->dongia)}} VND</span>
											<span class="flash-sale" >{{number_format($SPKM->giakhuyenmai)}} VND</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themvaogio',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$sanphamkhuyenmai->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->

		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div>
@endsection