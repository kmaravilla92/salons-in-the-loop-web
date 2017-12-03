@extends('frontsite.master')

@section('content')
	<section id="main-wrapper" class="inner register register2 {{$type_details['form_class']}}">
		<div class="title-holder header-title">
			<h3>Sign Up for Salon {{ucfirst($type)}}</h3>
		</div>
		<div class="wrapper">
			<div class="content-section">
				<div class="notice-cont">
				</div>
				<div class="signin-fb">
					<!-- <button type="button" name="button"><img src="/frontsite/images/signin-fb.png" alt=""></button> -->
					<a href="{{route('auth.social.set-info',['facebook',isset($type) ? $type: 'unidentified'])}}" class="fb-login"><img src="{{asset('/frontsite/images/signin-fb.png')}}" alt=""></a>
					<label>We won't post on your wall without <br> your permission.</label>
					<span>OR</span>
					@if(isset($type))
						@if($type == 'client')
							<p>Enter your account information below</p>
						@endif
						@if($type == 'professional')
							<p>Sign up for traveling stylist or stylist on demand that provide services at multiple servicing locations.</p>
						@endif
						@if($type == 'owner')
							<p>Enter your account information below. STOP!  If you are a mobile stylist on demand, then you need to go back and create a professional account to show your daily locations.  Owner accounts are for listing space.</p>
						@endif
					@endif
				</div>
				<div class="form-holder">
					<form action="{{route('frontsite.guests.user-registration.register')}}" method="POST" id="user-registration" class="ajaxify" data-validation-rules="sign_up_rules">
						{{csrf_field()}}
						<input type="hidden" name="user[type]" value="{{$type}}">
						<ul class="clearfix">
							<li class="half-width f-left">
								<label for="">First Name</label>
								<input type="text" name="user[first_name]" id="user[first_name]" value="" required>
							</li>
							<li class="half-width f-left">
								<label for="">Last Name</label>
								<input type="text" name="user[last_name]" id="user[last_name]" value="" required>
							</li>
							<li class="half-width f-left">
								<label for="">Email</label>
								<input type="email" name="user[email]" id="user[email]" value="" required>
							</li>
							<li class="half-width f-left">
								<label for="">Phone Number</label>
								<input type="text" name="user[phone_number]" id="user[phone_number]" value="" required>
							</li>
							<li class="half-width f-left">
								<label for="">Password</label>
								<input type="password" name="user[password]" id="user[password]" value="" required>
							</li>
							<li class="half-width f-left">
								<label for="">Confirm Password</label>
								<input type="password" name="user[password_confirmation]" id="user[password_confirmation]" value="" required>
							</li>
							<li class="full-width f-left agreement">
								<div class="checkbox-holder">
									<div class="checkbox">
										<input type="checkbox" name="user[accept_agreement]" id="user[accept_agreement]" value="1" required>
										<span></span>
										<label for="" class="ease"></label>
									</div>
									<p>By checking this, you indicate that you have read and agree <br> to the <a href="{{route('frontsite.guests.terms-and-conditions')}}" target="_blank">Terms of Use</a> and <a href="{{route('frontsite.guests.privacy-policy')}}" target="_blank">Privacy Policy</a>.</p>
								</div>
							</li>
							<li class="full-width f-left">
								<div class="captcha-holder">
									<!-- <img src="/frontsite/images/captcha.png" alt=""> -->
									@include('frontsite.components.recaptcha')
									<!-- <input type="text" class="hidden_recaptcha required" name="hidden_recaptcha" id="hidden_recaptcha" required>
									<div class="g-recaptcha" data-sitekey="{{ config('app.recaptcha.sitekey') }}"></div> -->
								</div>
							</li>
						</ul>
						<div class="btn-holder">
							<input type="submit" name="" value="Continue" class="btn  btn-blue">
						</div>
						<div class="login-link">
							<p>If you already have account</p>
							<h3>Please <a href="#login-holder" class="popup-link">login</a></h3>
							<a href="#forgot-holder" class="popup-link">Forgot your password?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection
