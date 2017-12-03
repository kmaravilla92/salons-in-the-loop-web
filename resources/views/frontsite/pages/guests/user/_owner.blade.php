@section('main_container_css', 'salon-pro dashboard')

<section id="main-wrapper" class="inner pro-profile owner-profile">
	<div class="banner-holder owner-bg-dark">
		<div class="wrapper">
			<div class="clearfix">
				<div class="f-right">

					<a href="{{ route('frontsite.user.account', ['user_type' => 'owner']) }}#dashboard" class="btn btn-white-b">Back to <span style="color:#aad1ff;">Owner Dashboard</span></a>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper">
		<div class="profilev-holder">
			<div class="prof">
				<div class="img-over">
					<div class="img-holder">
						<img src="{{ $profile['profile_pic']['path'] }}" alt="{{ $profile['profile_pic']['path'] }}">
					</div>
				</div>

				<div class="details clearfix">
					<h3>
						@php
							$categories = implode(',', $profile['owner_profile']['category_decoded']);
							if(empty($categories)){
								$categories = 'None';
							}
						@endphp
						<span><span>Category:</span> {{$categories}}</span> <br>
						{{$profile['owner_profile']['business_name']}}
					</h3>

					<h2>
						<i class="fa fa-phone" aria-hidden="true"></i> 
						<a href="tel:{{$profile['phone_number']}}">
							{{$profile['phone_number']}}
						</a>
					</h2>
				</div>
			</div>
			<div class="clearfix col-holders">
				<div class="left-content f-left">
					<div class="service-address">
						<h3>Owner</h3>
						<p>{{$profile['owner_profile']['title']}} {{$profile['owner_profile']['name']}}</p> <br>
						<h3>Servicing Address</h3>
						<p>{{$profile['owner_profile']['full_address']}}</p>

					</div>
					<div class="content-listing my-photos">
						<h3>GALLERY</h3>
						<div class="popup-gallery">
							<!-- <a href="/frontsite/images/gallery1.jpg" title="Hair Salon Sample"><img src="/frontsite/images/gallery1.jpg"></a> -->
							@forelse($profile['gallery_photos'] as $photo)
								<a href="{{$photo['path']}}" title="{{$photo['name']}}">
									<img src="{{$photo['path']}}">
								</a>
							@empty
								No photos available.
							@endforelse
						</div>
						<!-- <div class="pagination">
							<a href="#">First</a>
							<a href="#">Previous</a>
							<a href="#">1</a>
							<a href="#">2</a>
							<a href="#">3</a>
							<a href="#">Next</a>
							<a href="#">Last</a>
						</div> -->
					</div>
				</div>
				<div class="right-content f-right">
					<div class="general-desc cancellation content-listing">
						<h3>General Space Description</h3>
						<p>{{$profile['owner_profile']['general_space_description']}}</p>
					</div>
					<div class="general-desc cancellation content-listing">
						<h3>Rules and Procedures</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque </p>
					</div>
					<div class="contact content-listing">
						<h3>Mobile Number</h3>
						<h2>
							<i class="fa fa-phone" aria-hidden="true"></i> 
							<a href="tel:{{$profile['phone_number']}}">
								{{$profile['phone_number']}}
							</a>
						</h2>
					</div>
					<div class="social-media content-listing">
						<h3>SOCIAL MEDIA</h3>
						<div class="link-holder">
							<a href="#"><i class="fa fa-facebook" aria-hidden="true" style="color:#1c2b85;"></i></a>
							<a href="#"><i class="fa fa-instagram" aria-hidden="true" style="color:#562e16;"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true" style="color#1196c2;"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>