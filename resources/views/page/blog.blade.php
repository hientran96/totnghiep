@extends('master')
@section('content')
<div class="container" >
	<div class="row">
		<div class="col-sm-12">
			<div class="beta-products-list">

				<h1 class="text-center wow fadeInDown">Tin công nghệ</h1>
				<div class="space60">&nbsp;</div>
				<div class="row">

					@foreach($news as $n)
					<div class="col-sm-4">
						<div class="single-item">
						  	<div class="single-item-header"><a href="{{route('tinchitiet',$n->id)}}">
						  	  <img class="card-img-top" src="public/source/image/news/{{$n->hinhanh}}" alt="" height="150px;"></a>
						  	</div>
							 <div class="single-item-body">
							    <p class="single-item-title" style="font-weight: bold; color: red;">{{$n->tieude}}</p>
							    <p class="card-text">{!!$n->tomtat!!}</p>
							</div>
							<div class="single-item-caption">
								<a href="{{route('tinchitiet',$n->id)}}" class="btn btn-primary">Xem thêm</a>   
							 </div>
						</div>
						<div class="space60">&nbsp;</div>
						<div class="space60">&nbsp;</div>
					</div>

					@endforeach
				</div>
				<div class="row">{{$ne->links()}}</div>
			</div>
		</div> 
	</div>		
</div><!-- #content -->
@endsection
			
