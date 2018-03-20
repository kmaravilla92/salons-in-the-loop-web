</section>
<footer class="page-footer">
	<div class="upper-footer">
		<a href="#top" class="scroll-top"><img src="/frontsite/images/scroll-top.png" alt=""></a>
		<div class="wrapper">
			<div class="footer-content">
				<h3>About Us</h3>
				<p><span style="color:#669ae4;">SalonsInTheLoop.com</span> will be the <br> leading site to connect salon <br> owners, salon professionals, and <br> clients across the world.</p>
				<a href="{{route('frontsite.guests.about-us')}}">Read more</a>
			</div>
			<div class="footer-content">
				<h3>Quick Links</h3>
				<ul>
					<li><a href="{{route('frontsite.guests.home')}}">Home </a></li>
					<li><a href="{{route('frontsite.guests.how-it-works')}}">How it Works </a></li>
					<li><a href="{{route('frontsite.guests.about-us')}}">About Us</a></li>
					<li><a href="{{route('frontsite.guests.contact-us')}}">Contact Us</a></li>
					<li><a href="{{route('frontsite.guests.user-registration.step-1')}}">Register</a></li>
				</ul>
			</div>
			<div class="footer-content">
				<h3>How can we help you</h3>
				<ul>
					<li>
						<a href="{{ route('frontsite.user.account', ['type'=>'client', 'extra'=>'#/search']) }}">
							Professionals Near Me
						</a>
					</li>
					<li>
						<a href="{{ route('frontsite.guests.user-registration.step-2', ['type'=>'owner']) }}">
							Send Service Request
						</a>
					</li>
					<li>
						<a href="{{ route('frontsite.user.account', ['type'=>'professional', 'extra'=>'#/owner/posted-rentals/search']) }}">
							Salon Booth Rental
						</a>
					</li>
					<li>
						<a href="{{ route('frontsite.guests.user-registration.step-2', ['type'=>'professional']) }}">
							Salon Jobs
						</a>
					</li>
				</ul>
			</div>
			<div class="footer-content">
				<h3>Contact Us</h3>
				<ul>
					<li>
						<div class="left-content">
							<p>Address: </p>
						</div>
						<div class="right-content">
							<p>Main Office 802 <br>
								Texas Parkway, <br>
								Stafford Texas Suite D</p>
						</div>
					</li>
					<li>
						<div class="left-content">
							<p>Phone: </p>
						</div>
						<div class="right-content">
							<p>281 969 8233 </p>
						</div>
					</li>
					<li>
						<div class="left-content">
							<p>Email: </p>
						</div>
						<div class="right-content">
							<a href="mailto:info@salonsintheloop.com?Subject=Hello" style="color:#7aace7;">info@salonsintheloop.com </a>
						</div>
					</li>
					<li>
						<div class="left-content">
							<p>Follow Us: </p>
						</div>
						<div class="right-content">
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i> </a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> </a>
							<a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i> </a>
							<a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i> </a>
							<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i> </a>
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> </a>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="wrapper">
			<div class="btn-holder">
				<a href="#"><img src="/frontsite/images/apple-store.png" alt=""></a>
				<a href="#"><img src="/frontsite/images/google-play.png" alt=""></a>
				<a href="#"><img src="/frontsite/images/sitl-scissor.png" alt=""></a>
			</div>
		</div>

	</div>
	<div class="bottom-footer">
		<p>Copyright ©2017 salonsintheloop.com All Rghts Reserved</p>
		<ul>
			<li><a href="{{route('frontsite.guests.privacy-policy')}}">Privacy Policy</a></li>
			<li><a href="{{route('frontsite.guests.terms-and-conditions')}}">Terms & Conditions</a></li>
		</ul>
	</div>
</footer>

<!-- POPUPS -->
<div id="role-holder" class="mfp-hide white-popup-block popup-holder role-popup">
	<h3>Select a Role</h3>
	<form action="{{route('frontsite.guests.user-registration.check-user-type')}}" method="POST">
	{{csrf_field()}}
	@if(Request::is('home'))
		<!-- <input type="hidden" name="is_search" value="1"> -->
	@endif
		<div class="role-container">
			<input type="radio" name="user[type]" value="owner" checked>
			<div class="round-container ease">
				<img src="/frontsite/images/role1.png" alt="">
			</div>
			<h3>Salon Owner</h3>
		</div>
		<div class="role-container">
			<input type="radio" name="user[type]" value="professional">
			<div class="round-container ease">
				<img src="/frontsite/images/role2.png" alt="">
			</div>
			<h3>Salon Professional</h3>
		</div>
		<div class="role-container">
			<input type="radio" name="user[type]" value="client">
			<div class="round-container ease">
				<img src="/frontsite/images/role3.png" alt="">
			</div>
			<h3>Client/Customer</h3>
		</div>

		<div class="btn-holder">
			<input type="submit" name="" value="Continue" class="btn btn-blue">
		</div>
	</form>
	<div class="signin-fb">
		<span>OR</span>
	</div>
	<div class="login-link">
		<p>If you already have account</p>
		<h2>Please <a href="#login-holder" class="popup-link">login here</a> </h2>
		<a href="#forgot-holder" class="popup-link">Forgot your password?</a>
	</div>
</div>

<div id="login-holder" class="mfp-hide white-popup-block popup-holder login-popup">
	<h1>USER <span>ROLE</span></h1>
	<div class="form-holder">
		<form action="{{route('frontsite.guests.user-auth.authenticate')}}" method="POST" class="ajaxify">
			{{csrf_field()}}
			<ul>
				<li>
					<label for="">Email Address</label>
					<input type="email" name="auth[email]" id="auth[email]" value="">
				</li>
				<li>
					<label for="">Password</label>
					<input type="password" name="auth[password]" name="auth[password]" value="">
				</li>
			</ul>
			<div class="btn-holder">
				<input type="submit" name="" value="Login" class="btn btn-blue">

			</div>
			<div class="signin-fb">
				<a href="#forgot-holder" class="popup-link">Forgot your password?</a>
				<span>OR</span>
			</div>
			<div class="login-link">
				<br>
				<!-- <button type="button" name="button"><img src="/frontsite/images/signin-fb.png" alt=""></button> -->
				<a href="{{route('auth.social.set-info',['facebook',isset($type) ? $type: 'unidentified'])}}" class="fb-login"><img src="{{asset('/frontsite/images/signin-fb.png')}}" alt=""></a>
			</div>
		</form>
	</div>
</div>

<div id="forgot-holder" class="mfp-hide white-popup-block popup-holder login-popup forgot-password">
	<h1>FORGOT <span>PASSWORD</span></h1>
	<form action="{{url('/password/email')}}" method="POST" id="user-forgot-password" class="ajaxify" data-validation-rules="client_sign_up_rules">
		{{csrf_field()}}
		<div class="form-holder">
			<ul>
				<li>
					<label for="">Email Address</label>
					<input type="text" name="email" id="fp-email" required>
				</li>
			</ul>
			<div class="btn-holder">
				<input type="submit" name="" value="Submit" class="btn btn-blue" data-orig-text="Submit">
			</div>
		</div>
	</form>
</div>
<!-- POPUPS -->
@if(Session::get('toastr'))
	@include('frontsite.components.toastr')
@endif
<script src="/frontsite/js/lib/jquery.min.js"></script>
<script src="/frontsite/js/lib/jquery-ui.min.js"></script>
<script src="/frontsite/js/lib/modernizr-latest.js"></script>
<script src="/frontsite/js/plugins.js"></script>
<script src="/frontsite/js/jquery.flexslider-min.js"></script>
<!-- FULL CALENDAR -->
<script src="/frontsite/js/lib/moment.min.js"></script>
<script src="/frontsite/js/fullcalendar.min.js"></script>
<!-- FULL CALENDAR -->
<script src="/frontsite/js/custom.js"></script>
<script src="/frontsite/js/jquery.magnific-popup.min.js"></script>
<script src="/frontsite/js/lib/jquery-validation/dist/jquery.validate.min.js"></script>
<script>
	$(function(){
		$('.popup-link').magnificPopup({
			type: 'inline',
			preloader: false
		});

		@if(Session::get('toastr'))
			@foreach(Session::get('toastr') as $key=>$value)
				showToaster('{{$key}}','{!! Session::get('toastr.'.$key) !!}');
			@endforeach
		@endif
	});
</script>
@if(isset($is_spa))
	<script src="{{ asset('js/app.js') }}"></script>
@endif
<script src="{{ asset('js/global.js') }}"></script>
@stack('css_tail')
@stack('js_tail')
<script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaInit&render=explicit" async defer>
</script>
</body>
</html>