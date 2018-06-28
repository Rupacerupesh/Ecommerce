<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Tivatheme HTML5">
	<meta name="keywords" content="HTML5">
	<meta name="author" content="tivatheme">
	<title>Funky Yak</title>	
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/access/bootstrap.css')}}" media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/access/style.css')}}" media="all">	
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/access/font-awesome.min.css')}}" media="all">
	<script src="{{ asset('vendor/access/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
	<link href='https://fonts.googleapis.com/css?family=Poppins:400,600,700,500,300' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="{{ asset('vendor/favicon.ico')}}" type="image/x-icon">
	<!--[if lt IE 9]>
	<script src="{{ asset('css/respond.min.js')}}"></script>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>		
	<![endif]-->
	<script>
	$(document).ready(function() {
		$(".button").click(function() {
			$('html,body').animate({
				scrollTop: $(".content-container").offset().top},
				'slow');
		});
	});
	</script>
</head>
<body>
	<section class="content-container">	
    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-danger">
                {{ session()->get('success_message') }}
            </div>
        @endif


        @if (session()->has('registered_message'))
            <div class="alert alert-success">
                {{ session()->get('registered_message') }}
            </div>
        @endif

    </div>


		<div class="container">
			<div class="decs-content text-center">
				<div class="titleLandingpage">
					<h3>Welcome to funky yak</h3>
				</div>
			</div>
			<div class="row content">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 demo">
					<a href="{{ route('landing-page')}}">
					<h2 class="text-heading"><a href="{{ route('Retail')}}">For retail </h2>
						<span class="image-bg">
							<img src="images/demo-1.jpg"></span>
							<span class="glare"></span>
						</span>
					</a>
					</a>
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 demo">
					<a href="{{ route('Wholesale')}}">
					<h2 class="text-heading"><a href="{{ route('Wholesale')}}">For Wholesale </h2>
						<span class="image-bg">
							<img src="images/demo-1.jpg"></span>
							<span class="glare"></span>
						</span>
					</a>
					</a>
				</div>
				
			</div>
		</div>
	</section>
	<div class="footer-link">
		<div class="container">
			<div class="text-center">
				<p class="text-footer">Handcrafted love from Nepal &hearts;</p>
			</div>
		</div>
	</div>
</body>

</html>

