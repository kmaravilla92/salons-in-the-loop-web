<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="{{ app()->getLocale() }}"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>

<link rel="stylesheet" href="/frontsite/css/normalize.css">
<link rel="stylesheet" href="/frontsite/css/font-awesome.min.css">
<link rel="stylesheet" href="/frontsite/css/font-awesome-animation.min.css">
<link rel="stylesheet" href="/frontsite/css/flexslider.css">
<link rel="stylesheet" href="/frontsite/css/style_2.css">
<link rel="stylesheet" href="/frontsite/css/style.css">
<link rel="stylesheet" href="/frontsite/css/select2.min.css">
<link rel="stylesheet" href="/frontsite/css/magnific-popup.css">

<!-- FULL CALEDAR -->
<link rel="stylesheet" href="/frontsite/css/fullcalendar.min.css">
<!-- FULL CALEDAR -->

<!--[if lt IE 9]> <script src="/frontsite/js/css3-mediaqueries.js"></script> <![endif]-->
<script src="/frontsite/js/html5.js"></script>
@yield('js_head')
<link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
@stack('css_head')
<script>
	var apiBaseUrl = "{{ config('app.api.base_uri') }}";
	var userId = "{{session('sitl.user.id', 0)}}";
	var user = {!! json_encode($laravel_user) !!};
	var settings = {
		professional_types: {!! json_encode(config('settings.professional_types')) !!}
	};
</script>
</head>
<body rel="home-page">
<input type="hidden" name="user_type" id="user_type" value="{{session('sitl.user.type','client')}}">
<section id="main-container" class="@yield('main_container_css', '')">
	<div class="dashboard">
		<header class="clearfix inner">
			<div class="header-wrapper">
				<div class="clearfix">
					<div class="logo-holder f-left">
						<a href="{{route('frontsite.guests.home')}}"><img src="/frontsite/images/logo-inner.png"  alt=""></a>
					</div>
					@if(!$laravel_user)
						<ul class="f-right search-nav">
							<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
							<li><a href="#login-holder" class="popup-link">Login</a></li>
							<li><a href="{{ route('frontsite.guests.user-registration.step-1') }}">Sign Up</a></li>
						</ul>
					@else
						<ul class="f-right search-nav">
							<li>
								<div class="img-holder">
									<img src="{{ $laravel_user['profile_pic']['path'] }}" alt="">
								</div>
							</li>
							<li class="welcome">
								<p>Welcome <a href="{{ route('frontsite.user.account', ['user_type' => session('sitl.user.type','client')]) }}#dashboard">{{ $laravel_user['first_name'] }}</a></p>
							</li>
							<li>
								<a href="" class="noti-holder">
									<img src="/frontsite/images/noti-ico.png" alt="">
									<div class="noti-count ease">
										<p>16</p>
									</div>
								</a>
							</li>
							<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
							<li><a href="{{ route('frontsite.guests.user-auth.logout') }}">Logout</a></li>
						</ul>	
					@endif
				</div>
				@include('frontsite.partials.global.top_navigation')
			</div>
		</header>
	</div>