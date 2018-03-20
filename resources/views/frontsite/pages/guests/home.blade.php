@extends('frontsite.master')

@section('content')
	<section id="main-wrapper" class="homepage">
		<div class="slider-home">
			<ul class="slides">
				<li class="banner-holder bg fullscreen" style="background-image:url('/frontsite/images/slider1.jpg');" data-img-width="1440" data-img-height="784">
				</li>
				<li class="banner-holder bg fullscreen" style="background-image:url('/frontsite/images/slider2.jpg');" data-img-width="1440" data-img-height="784">
				</li>
				<li class="banner-holder bg fullscreen" style="background-image:url('/frontsite/images/slider3.jpg');" data-img-width="1440" data-img-height="784">
				</li>
			</ul>
			<div class="content-holder center-div">
				<h3>Get Connected <img src="/frontsite/images/scissor-ico.png" alt="">Get Noticed</h3>
				<p>Beauty platform that connects clients and salon owners  <br> to salon professionals anytime anywhere.</p>
				<!-- <hr> -->
				<a href="#role-holder" class="popup-link">I am a <span>Select a user type</span></a>
			</div>
			<div class="connect">
				<div class="wrapper">
					<p>CONNECT WITH US</p>
					<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				</div>
				<img src="/frontsite/images/mouse.png" alt="" class="center-div">
			</div>
		</div>
		<div class="explore-section section">
			<div class="title-holder">
				<h3>Explore <span>the Marketplace</span></h3>
			</div>
			<div class="wrapper">
				<div class="listing-holder ">
					<a 
						href="{{ route('frontsite.user.account', ['type'=>'client', 'extra'=>'#/search']) }}" 
						class="market-holder"
					>
						<img src="/frontsite/images/find-a-pro.png" alt="">
						<div class="content-holder ease">
							<h5 class="">Find a Professional</h5>
						</div>
					</a>
					<a 
						href="{{ route('frontsite.guests.user-registration.step-2', ['type'=>'client']) }}" 
						class="market-holder"
					>
						<img src="/frontsite/images/name-my-own-price.png" alt="Name My Own Price">
						<div class="content-holder ease">
							<h5 class="">Name My Own Price</h5>
						</div>
					</a>
					<a 
						href="{{ route('frontsite.user.account', ['type'=>'client', 'extra'=>'#/search']) }}" 
						class="market-holder"
					>
						<img src="/frontsite/images/waiting-listi.png" alt="Waiting List Sign In">
						<div class="content-holder ease">
							<h5 class="">Waiting List Sign In</h5>
						</div>
					</a>
					<a 
						href="{{ route('frontsite.user.account', ['type'=>'professional', 'extra'=>'#/owner/posted-rentals/search']) }}" 
						class="market-holder"
					>
						<img src="/frontsite/images/find-booth-rental.png" alt="Find Booth Rental">
						<div class="content-holder ease">
							<h5 class="">Find Booth Rentals</h5>
						</div>
					</a>
					<a 
						href="{{ route('frontsite.guests.user-registration.step-2', ['type'=>'owner']) }}" 
						class="market-holder"
					>
						<img src="/frontsite/images/list-space-rental.png" alt="List Space Rental">
						<div class="content-holder ease">
							<h5 class="">List Rental Space</h5>
						</div>
					</a>
					<a 
						href="{{ route('frontsite.guests.user-registration.step-2', ['type'=>'professional']) }}" 
						class="market-holder"
					>
						<img src="/frontsite/images/get-salon-help.png" alt="Get Salon Jobs">
						<div class="content-holder ease">
							<h5 class="">Get Salon Jobs</h5>
						</div>
					</a>
					<a 
						href="{{ route('frontsite.user.account', ['type'=>'professional', 'extra'=>'#/owner/posted-rentals/search']) }}" 
						class="market-holder"
					>
						<img src="/frontsite/images/find-pop-up-space.png" alt="Find Pop Up Space">
						<div class="content-holder ease">
							<h5 class="">Find Pop Up Space</h5>
						</div>
					</a>
					<a class="market-holder">
						<img src="/frontsite/images/nearby-professional.png" alt="Nearby Profesisonal">
						<div class="content-holder ease">
							<h5 class="">Nearby Professionals</h5>
						</div>
					</a>
					<a 
						href="{{ route('frontsite.guests.user-registration.step-2', ['type'=>'professional']) }}" 
						class="market-holder"
					>
						<img src="/frontsite/images/mobile-business.png" alt="For the Travelling Stylist">
						<div class="content-holder ease">
							<h5 class="">For the Travelling Stylist</h5>
						</div>
					</a>

				</div>
			</div>

		</div>
		<div class="featured-pro section">
			<div class="title-holder">
				<h3>Our Featured <span>Professionals</span></h3>
			</div>
			<div class="listing-holder">
				<div class="pro-holder">
					<div class="img-holder">
						<img src="/frontsite/images/pro1.jpg" alt="">
					</div>
					<h3>Jessica Mathew</h3>
					<h5>Nails</h5>
					<p>Square Town, Square City, Colorado - CO, 11010</p>
					<div class="rating-holder">
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
					</div>
					<a href="#" class="btn btn-grey-b">See My Profile</a>
				</div>
				<div class="pro-holder">
					<div class="img-holder">
						<img src="/frontsite/images/pro2.jpg" alt="">
					</div>
					<h3>Reynolds Moore</h3>
					<h5>Barber</h5>
					<p>Square Town, Square City, Colorado - CO, 11010</p>
					<div class="rating-holder">
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
					</div>
					<a href="#" class="btn btn-grey-b">See My Profile</a>
				</div>
				<div class="pro-holder">
					<div class="img-holder">
						<img src="/frontsite/images/pro3.jpg" alt="">
					</div>
					<h3>Anna Capre</h3>
					<h5>Hairstylist</h5>
					<p>Square Town, Square City, Colorado - CO, 11010</p>
					<div class="rating-holder">
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
					</div>
					<a href="#" class="btn btn-grey-b">See My Profile</a>
				</div>
				<div class="pro-holder">
					<div class="img-holder">
						<img src="/frontsite/images/pro4.jpg" alt="">
					</div>
					<h3>Eren Jaeger</h3>
					<h5>Makeup Artist</h5>
					<p>Square Town, Square City, Colorado - CO, 11010</p>
					<div class="rating-holder">
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
					</div>
					<a href="#" class="btn btn-grey-b">See My Profile</a>
				</div>
			</div>
		</div>
		<div class="waiting-works">
			<div class="half-width f-left">
				<div class="content center-div">
					<h3>How <span>Waiting List</span> Works</h3>
					<a 
						href="{{ route('frontsite.user.account', ['type'=>'client', 'extra'=>'#/search']) }}" 
						class="btn btn-red"
					>
						Book Now!
					</a>
					<a href="#" class="btn btn-violet">Watch how it works</a>
				</div>
			</div>
			<div class="half-width f-right">
				<a href="#" class="center-div"><img src="/frontsite/images/play-video.png" alt=""></a>
			</div>
		</div>
		<div class="waiting-works popup-section">
			<div class="half-width f-left">
				<a href="#" class="center-div"><img src="/frontsite/images/play-video.png" alt="" style="opacity:0;"></a>
			</div>
			<div class="half-width f-right">
				<div class="content center-div">
					<h3>How <span>Popup Rental</span> Works</h3>

					<a href="#" class="btn btn-red">Watch how it works</a>
					<a href="{{ route('frontsite.user.account', ['type'=>'professional', 'extra'=>'#/owner/posted-rentals/search']) }}" class="btn btn-violet">Search now!</a>
				</div>
			</div>
		</div>
		<div class="waiting-works send-section">
			<div class="half-width f-left">
				<div class="content center-div">
					<h3>How <span>Send a Request</span> Works</h3>

					<a href="#login-holder" class="btn btn-red popup-link">Help Request</a>
					<a href="#" class="btn btn-violet">Watch how it works</a>
				</div>
			</div>
			<div class="half-width f-right">
				<a href="#" class="center-div"><img src="/frontsite/images/play-video.png" alt=""></a>
			</div>
		</div>
		<div class="get-connected section">
			<div class="content-holder">
				<h3>Get <span style="color:#4f81bb;">Connected</span>, Get <span style="color:#e42d2d;">Noticed</span></h3>
				<a href="{{ route('frontsite.guests.user-registration.step-1') }}" class="btn btn-violet">Create Your Account Now!</a>
			</div>
		</div>
	</section>
@endsection