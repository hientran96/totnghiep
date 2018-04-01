@extends('master')
@section('content')
<div style="background-color: white;">
	<div class="container">
		<div id="content">
			<div style="text-align: center;"><h1>{{$news->tieude}}</h1></div>
		<div class="space20">&nbsp;</div>
			<div style="text-align: center;"><p>{!!$news->noidung!!}</p>	</div>		
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
