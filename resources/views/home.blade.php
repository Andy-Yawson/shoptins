<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Shoptins | Choose</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.8704dbd.png') }}">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

	<!-- Theme CSS - Includes Bootstrap -->
	<link href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.css')}}" rel="stylesheet">
	<link href="{{asset('first/css/creative.min.css')}}" rel="stylesheet">
	<style>
			ul.logo li{
				list-style: none;
				display: inline-block;
				padding: 10px;
			}
	</style>
</head>

<body id="page-top">

<!-- Masthead -->
<header class="masthead">
	<div class="container h-100">
		<div class="row h-100 align-items-center justify-content-center text-center">
			<div class="col-lg-10 align-self-end">
				<h1 class="text-uppercase text-white font-weight-bold">Shop unlimited with ease</h1>
				<hr class="divider my-4">
			</div>
			<div class="col-lg-8 align-self-baseline">
				<div align="center" class="mt-2 mb-4">
					<ul class="logo">
						<li><img src="{{ asset('first/img/amazon.jpg') }}" width="100px" height="40px" class="img-responsive img-thumbnail"></li>
						<li><img src="{{ asset('first/img/ebay.jpg') }}" width="100px" height="40px" class="img-responsive img-thumbnail"></li>
						<li><img src="{{ asset('first/img/fan-milk.jpg') }}" width="100px" height="40px" class="img-responsive img-thumbnail"></li>
						<li><img src="{{ asset('first/img/nestle.jpg') }}" width="100px" height="40px" class="img-responsive img-thumbnail"></li>
					</ul>
				</div>
				<a class="btn btn-primary btn-xl js-scroll-trigger mr-3" href="{{ route('user.int.order') }}">Shop International</a>
				<a class="btn btn-success btn-xl js-scroll-trigger" href="{{ route('user.welcome') }}">Shop Local</a>
			</div>
		</div>
	</div>
</header>

</body>
</html>

