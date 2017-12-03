@extends('frontsite.master')

@section('content')
	<section id="main-wrapper" class="inner about">
		<div class="title-holder">
			<div class="wrapper">
				<h3>Contact Us</h3>
			</div>
		</div>
		<div class="wrapper">
			<div class="content-section contact-content">
				<h3>Keep In touch with us</h3>
				<div class="contact-infos">
					<ul>
						<li>
							<div class="img-holder">
								<img src="/frontsite/images/contact-ico1.png" alt="">
							</div>
							<div class="content-holder">
								<p>Main Office 802 Texas Parkway, Stafford Texas Suite D</p>
							</div>
						</li>
						<li>
							<div class="img-holder">
								<img src="/frontsite/images/contact-ico2.png" alt="">
							</div>
							<div class="content-holder">
								<p>8324625333</p>
							</div>
						</li>
						<li>
							<div class="img-holder">
								<img src="/frontsite/images/contact-ico3.png" alt="">
							</div>
							<div class="content-holder">
								<p>info@salonsintheloop.com </p>
							</div>
						</li>
					</ul>
				</div>
				<h5>Send us a message</h5>
				<div class="form-holder">
					<form action="{{route('frontsite.guests.contact-us.post')}}" method="POST" class="ajaxify">
						{{csrf_field()}}
						<ul class="clearfix">
							<li class="half-width f-left">
								<input type="text" name="contact[first_name]" value="" placeholder="First Name" required>
							</li>
							<li class="half-width f-left">
								<input type="text" name="contact[last_name]" value="" placeholder="Last Name" required>
							</li>
							<li class="half-width f-left">
								<input type="email" name="contact[email]" value="" placeholder="Email" required>
							</li>
							<li class="half-width f-left">
								<input type="text" name="contact[number]" value="" placeholder="Phone" required>
							</li>
							<li class="full-width f-left">
								<textarea name="contact[message]" placeholder="Message"></textarea>
							</li>
						</ul>
						<div class="btn-holder">
							<button class="btn btn-blue">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection