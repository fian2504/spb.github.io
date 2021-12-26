<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Blank Page - Ace Admin</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/ace-master/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/ace-master/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/ace-master/assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/ace-master/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/ace-master/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/ace-master/assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/ace-master/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/ace-master/assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/ace-master/assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="assets/ace-master/assets/css/daterangepicker.min.css" />
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/ace-master/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/ace-master/assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/ace-master/assets/js/html5shiv.min.js"></script>
		<script src="assets/ace-master/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">

        @include('layouts.navbar') 
        {{-- layouts --}}

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

		@include('layouts.sidebar')	
			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								@yield('content')
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder"></span>
							DISKOMINFO KARANGANYAR	
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/ace-master/assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/ace-master/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/ace-master/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/ace-master/assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/ace-master/assets/js/ace-elements.min.js"></script>
		<script src="assets/ace-master/assets/js/ace.min.js"></script>
		<script src="assets/ace-master/assets/js/daterangepicker.min.js"></script>
		<script src="assets/ace-master/assets/js/bootstrap-datepicker.min.js"></script>
		

		<!-- inline scripts related to this page -->
	</body>
</html>
