@section('main_container_css', 'salon-pro dashboard dashboard-client')

<section id="main-wrapper" class="inner pro-profile owner-profile">
	<div class="banner-holder client-bg">
		<div class="wrapper">
			<div class="clearfix">
				<div class="f-right">
					<a href="{{ route('frontsite.user.account', ['user_type' => 'client']) }}#dashboard" class="btn btn-white-b">Back to <span style="color:#aad1ff;">Clients  Dashboard</span></a>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper">
		<div class="profilev-holder">
			<div class="prof">
				<div class="img-over">
					<div class="img-holder" style="background: #fff;">
						<img src="{{ $profile['profile_pic']['path'] }}" alt="">
					</div>
				</div>

				<div class="details clearfix">
					<h3>
						<span></span><br>
						{{ $profile['full_name'] }}
					</h3>


				</div>
			</div>
			<div class="clearfix col-holders">
				<div class="left-content f-left">
					<div class="service-address">

						<!-- <p>Square Town, Square City, <br> Colorado - CO, 11010</p> -->
						<p>{{ $profile['client_profile']['full_address'] }}</p>


					</div>
					<div class="content-listing my-photos">
						<h3>My Current Look</h3>
						<div class="popup-gallery">
							@isset($profile['current_look_photos'])
								@foreach($profile['current_look_photos'] as $photo)
									<a 
										href="{{ $photo['path'] }}" 
										title="{{ $photo['path'] }}">
											<img 
												src="{{ $photo['path'] }}">
									</a>
								@endforeach
							@endisset
							@empty($profile['current_look_photos'])
								<p>NO PHOTOS</p>
							@endempty
							<!-- <a href="/frontsite/images/current1.jpg" title="Hair Salon Sample"><img src="/frontsite/images/current1.jpg"></a>
							<a href="/frontsite/images/current2.jpg" title="Hair Salon Sample"><img src="/frontsite/images/current2.jpg"></a>
							<a href="/frontsite/images/current3.jpg" title="Hair Salon Sample"><img src="/frontsite/images/current3.jpg"></a>
							<a href="/frontsite/images/current4.jpg" title="Hair Salon Sample"><img src="/frontsite/images/current4.jpg"></a>
							<a href="/frontsite/images/current2.jpg" title="Hair Salon Sample"><img src="/frontsite/images/current2.jpg"></a>
							<a href="/frontsite/images/current3.jpg" title="Hair Salon Sample"><img src="/frontsite/images/current3.jpg"></a>
							<a href="/frontsite/images/current1.jpg" title="Hair Salon Sample"><img src="/frontsite/images/current1.jpg"></a>
							<a href="/frontsite/images/current4.jpg" title="Hair Salon Sample"><img src="/frontsite/images/current4.jpg"></a> -->
						</div>
						<br><br>
						<h3>My Desired Look</h3>
						<div class="popup-gallery">
							@isset($profile['desired_look_photos'])
								@foreach($profile['desired_look_photos'] as $photo)
									<a 
										href="{{ $photo['path'] }}" 
										title="{{ $photo['path'] }}">
											<img 
												src="{{ $photo['path'] }}">
									</a>
								@endforeach
							@endisset
							@empty($profile['desired_look_photos'])
								<p>NO PHOTOS</p>
							@endempty
							<!-- <a href="/frontsite/images/current1.jpg" title="Hair Salon Sample"><img src="/frontsite/images/current1.jpg"></a>
							<a href="/frontsite/images/current2.jpg" title="Hair Salon Sample"><img src="/frontsite/images/current2.jpg"></a>
							<a href="/frontsite/images/current3.jpg" title="Hair Salon Sample"><img src="/frontsite/images/current3.jpg"></a>
							<a href="/frontsite/images/current4.jpg" title="Hair Salon Sample"><img src="/frontsite/images/current4.jpg"></a>
							<a href="/frontsite/images/current2.jpg" title="Hair Salon Sample"><img src="/frontsite/images/current2.jpg"></a>
							<a href="/frontsite/images/current3.jpg" title="Hair Salon Sample"><img src="/frontsite/images/current3.jpg"></a>
							<a href="/frontsite/images/current1.jpg" title="Hair Salon Sample"><img src="/frontsite/images/current1.jpg"></a>
							<a href="/frontsite/images/current4.jpg" title="Hair Salon Sample"><img src="/frontsite/images/current4.jpg"></a> -->

						</div>

					</div>

				</div>
				<div class="right-content f-right">
					<h2>Client Intake information</h2>
					<div class="general-desc cancellation content-listing">
						<h3>List of allergies or health related issues that may affect your service.</h3>
						<ul class="profile-listing">
							@if(isset($profile['client_profile']) && isset($profile['client_profile']['allergy_list']))
								@foreach($profile['client_profile']['allergy_list'] as $allergy)
									<li>{{ $allergy['title'] }} </li>
								@endforeach
							@endif
						</ul>
					</div>
					<div class="general-desc cancellation content-listing">
						<h3>List any color formulas or chemicals used</h3>
						<ul class="profile-listing">
							@if(isset($profile['client_profile']) && isset($profile['client_profile']['chemical_list']))
								@foreach($profile['client_profile']['chemical_list'] as $chemical)
									<li>{{ $chemical['title'] }} </li>
								@endforeach
							@endif
						</ul>
					</div>
					<div class="contact content-listing">
						<h3>Likes When Receiving Services</h3>
						<ul class="profile-listing">
							@if(isset($profile['client_profile']) && isset($profile['client_profile']['likes']))
								@foreach($profile['client_profile']['likes'] as $like)
									<li>{{ $like['title'] }} </li>
								@endforeach
							@endif
						</ul>
					</div>
					<div class="social-media content-listing">
						<h3>Dislikes When Receiving Services</h3>
						<ul class="profile-listing">
							@if(isset($profile['client_profile']) && isset($profile['client_profile']['dislikes']))
								@foreach($profile['client_profile']['dislikes'] as $dislike)
									<li>{{ $dislike['title'] }} </li>
								@endforeach
							@endif
						</ul>
					</div>
				</div>

			</div>

		</div>
	</div>
</section>