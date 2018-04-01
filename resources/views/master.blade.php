<!doctype html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		 <meta name="description" content="Đồ án tốt nghiệp bán linh-phụ kiện">
    <meta name="author" content="">
		<title>Linh-Phụ kiện</title>
		<base href="{{asset('')}}">
		<link rel="shortcut icon" type="image/x-icon" href="public/source/image/Logo.ico" />
		<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="public/source/assets/dest/css/font-awesome.min.css">
		<link rel="stylesheet" href="public/source/assets/dest/vendors/colorbox/example3/colorbox.css">
		<link rel="stylesheet" href="public/source/assets/dest/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="public/source/assets/dest/rs-plugin/css/responsive.css">
		<link rel="stylesheet" title="style" href="public/source/assets/dest/css/style.css">
		<link rel="stylesheet" href="public/source/assets/dest/css/animate.css">
		<link rel="stylesheet" title="style" href="public/source/assets/dest/css/huong-style.css">
		<link href="public/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
		 <link href="public/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	    <!-- MetisMenu CSS -->
	    <link href="public/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

	    <!-- Custom CSS -->
	    <link href="public/dist/css/sb-admin-2.css" rel="stylesheet">

	    <!-- DataTables CSS -->
	    <link href="public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
	   
	</head>	<body>
		@include('header')
		 <!-- #header -->
		@yield('submenu')
		<div class="rev-slider">
		@yield('content')
		</div> <!-- .container -->
		@include('footer')
		 <!-- #footer -->
		<div class="copyright" style="background-color:#302226;">
			<div class="container">
				<p class="pull-left">Hientran (&copy;) 2018 An Giang University</p>
				<p class="pull-right pay-options">
					<a href="https://www.facebook.com/LinhKienVietAG/"><img src="public/source/image/if_facebook_317746.ico" alt="" width="20px;" /></a>
					<a href="https://oa.zalo.me/home"><img src="public/source/image/zalo.ico" alt="" width="20px;" /></a>
					<a href="https://www.youtube.com/channel/UCdwKC_u_cUO6gXdcwBAIHgg?view_as=subscriber"><img src="public/source/image/youtube.ico" alt="" width="20px;" /></a>
					<a href="https://www.instagram.com/"><img src="public/source/image/instagram.ico" alt="" width="20px;" /></a>
				</p>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .copyright -->


	<script src="public/source/assets/dest/js/jquery.js"></script>
	<script src="public/bower_components/jquery/dist/jquery.min.js"></script>


	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

	<script src="public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<script src="public/source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="public/source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>

	<script src="public/source/assets/dest/vendors/animo/Animo.js"></script>
	<script src="public/source/assets/dest/vendors/dug/dug.js"></script>
	<script src="public/source/assets/dest/js/waypoints.min.js"></script>
	<script src="public/source/assets/dest/js/wow.min.js"></script>


	<!-- Metis Menu Plugin JavaScript -->

	<script src="public/source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="public/source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="public/bower_components/metisMenu/dist/metisMenu.min.js"></script>
	

	<!--customjs-->
	<script src="public/dist/js/sb-admin-2.js"></script>
	<script src="public/source/assets/dest/js/custom2.js"></script>
	<script src="public/source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<!-- DataTables JavaScript -->
	<script src="public/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="public/source/assets/dest/js/scripts.min.js"></script>
    
	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
	
		
	</body>
</html>