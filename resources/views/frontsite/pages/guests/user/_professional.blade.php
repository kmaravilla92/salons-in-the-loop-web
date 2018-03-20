@section('main_container_css', 'salon-pro dashboard')

<section id="main-wrapper" class="inner pro-profile">
	<div class="banner-holder pro-bg">
		<div class="wrapper">
			<div class="clearfix">
				<div class="f-right">
					@if(!$is_self_viewing)
						<a href="#">Block Professional</a>
					@endif
					@if($is_self_viewing)
						<a href="{{ route('frontsite.user.account', ['user_type' => 'professional']) }}#dashboard" class="btn btn-white-b">Back to <span style="color:#aad1ff;">My Dashboard</span></a>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper">
		<div class="profilev-holder">
			<div class="prof">
				<div class="img-over">
					<div class="img-holder">
						<img src="{{ $profile['profile_pic']['path'] }}" alt="">
					</div>
					<div class="status-holder"><img src="/frontsite/images/online-status.png" alt=""></div>
				</div>

				<div class="details">
					<h3>
						<span>ONLINE</span> <br>
						{{ $profile['full_name'] }}
					</h3>
					<p>
						{{ 
							collect($profile['pro_profile']['category_decoded'])->implode(' / ')	
						}}
					</p>
					<h2><i class="fa fa-phone" aria-hidden="true"></i> {{ $profile['phone_number'] }}</h2>
				</div>
			</div>
			<div class="clearfix col-holders">
				<div class="left-content f-left">
					<div class="service-address">
						<h3>Servicing Address</h3>
						<p>See the booking calendar for the address</p>
						<div class="rating">
							<span>{{$review_rating_count = $profile['pro_profile']['review_rating_count']}}</span>
							OVERALL
							@for($i = 0; $i < $review_rating_count; $i++)
								<i class="fa fa-star" aria-hidden="true"></i>
							@endfor
							<a href="#">See <label for="">{{ count($profile['reviews']) }} reviews</label></a>
						</div>
					</div>
					<div class="content-listing my-photos">
						<h3>My Photos</h3>
						<div class="popup-gallery">
							@isset($profile['pro_photos'])
								@foreach($profile['pro_photos'] as $photo)
									<a 
										href="{{ $photo['path'] }}" 
										title="{{ $photo['path'] }}">
											<img 
												src="{{ $photo['path'] }}">
									</a>
								@endforeach
							@endisset
							@empty($profile['pro_photos'])
								<p>NO PHOTOS</p>
							@endempty
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
					<div class="content-listing reviews">
						<h3>REVIEWS <span class="f-right">{{ count($profile['reviews']) }} Reviews</span></h3>
						@forelse($profile['reviews'] as $review)
							<div class="review-holder">
								<div class="title-holder">
									<div class="img-holder">
										<img src="/frontsite/images/client1.jpg" alt="">
									</div>
									<div class="content-holder clearfix">
										<h2 class="f-left">Accusata complectitur at duo </h2>
										<p class="f-right">$100.00 </h3>
										<div class="clearfix"></div>
										<div class="rating f-left">
											<span>{{$review['overall_rating_formatted']}}</span>
											OVERALL
											@for($i = 0; $i < $review['overall_rating']; $i++)
												<i class="fa fa-star" aria-hidden="true"></i>
											@endfor
										</div>
										<p class="f-right review-p">Reviewed {{$review['created_at']}}</h3>
									</div>
									<div class="review-content">
										<p>{{$review['feedback']}}</p>
										<label for="">Reviewed by <a href="">Alexa Snowe</a></label>
									</div>
									<div class="current-look">
										<div class="img-holder">
											<img src="/frontsite/images/client2.jpg" alt="">
										</div>
										<div class="content">
											<h2>My Current look!</h2>
											<label for="">Reviewed by <a href="">Alexa Snowe</a></label>
											<h1> <img src="/frontsite/images/logo2.png" alt=""> SalonsInThe Loop.com</h1>
										</div>

									</div>
								</div>
							</div>
						@empty
							<p style="text-align: center;">No reviews available.</p>
						@endforelse
						<!-- <div class="review-holder">
							<div class="title-holder">
								<div class="img-holder">
									<img src="/frontsite/images/client1.jpg" alt="">
								</div>
								<div class="content-holder clearfix">
									<h2 class="f-left">Accusata complectitur at duo </h2>
									<p class="f-right">$100.00 </h3>
									<div class="clearfix"></div>
									<div class="rating f-left">
										<span>5.0</span>
										OVERALL
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>

									</div>
									<p class="f-right review-p">Reviewed 10/2/2016</h3>
								</div>
								<div class="review-content">
									<p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris "</p>
									<label for="">Reviewed by <a href="">Alexa Snowe</a></label>
								</div>
								<div class="current-look">
									<div class="img-holder">
										<img src="/frontsite/images/client2.jpg" alt="">
									</div>
									<div class="content">
										<h2>My Current look!</h2>
										<label for="">Reviewed by <a href="">Alexa Snowe</a></label>
										<h1> <img src="/frontsite/images/logo2.png" alt=""> SalonsInThe Loop.com</h1>
									</div>

								</div>
							</div>
						</div>
						<div class="review-holder">
							<div class="title-holder">
								<div class="img-holder">
									<img src="/frontsite/images/client1.jpg" alt="">
								</div>
								<div class="content-holder clearfix">
									<h2 class="f-left">Accusata complectitur at duo </h2>
									<p class="f-right">$100.00 </h3>
									<div class="clearfix"></div>
									<div class="rating f-left">
										<span>5.0</span>
										OVERALL
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>

									</div>
									<p class="f-right review-p">Reviewed 10/2/2016</h3>
								</div>
								<div class="review-content">
									<p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris "</p>
									<label for="">Reviewed by <a href="">Alexa Snowe</a></label>
								</div>
								<div class="current-look">
									<div class="img-holder">
										<img src="/frontsite/images/client2.jpg" alt="">
									</div>
									<div class="content">
										<h2>My Current look!</h2>
										<label for="">Reviewed by <a href="">Alexa Snowe</a></label>
										<h1> <img src="/frontsite/images/logo2.png" alt=""> SalonsInThe Loop.com</h1>
									</div>
								</div>
							</div>
						</div> -->
					</div>
				</div>
				<div class="right-content f-right">
					@if(!$is_self_viewing)
						<div class="btn-holder">
							<a href="/account/client#/book-appointment/{{$profile['id']}}/step-1" class="btn btn-blue ra-book-appointment" data-required_user_type="client">Book Appointment</a>
							<a href="/account/client#/{{$profile['id']}}/waiting-list/sign-in/step-1" class="btn btn-blue-b ra-waiting-list" data-required_user_type="client">Waiting List Sign in</a>
							<a href="/account/professional#/calendar/view/{{$profile['id']}}" class="btn btn-red full-width">View Calendar and location</a>
						</div>
					@endif
					<div class="service-listing content-listing">
						<h3>My Services</h3>
						<ul>
							@forelse($profile['pro_services'] as $i => $pro_service)
							<li class="clearfix" @if($i > 4) style="display: none;" @endif>
								<p class="f-left">{{ $pro_service['service_name'] }}
									<span>{{ $pro_service['duration'] }} minutes</span>
								 </p>
								 <p class="f-right">$ {{ $pro_service['price'] }}</p>
							</li>
							@empty
							<li class="clearfix">
								No service listed.
							</li>
							@endforelse
						</ul>
						@if(count($profile['pro_services']) > 5)
							<div class="btn-holder">
								<br>
								<a href="#" class="btn btn-blue" id="view-more-services">VIEW MORE</a>
							</div>
						@endif
					</div>
					<div class="service-hours content-listing">
						<h3>View Service Hours</h3>
						<ul>
							@foreach($profile['pro_service_hours']['service_hours_decoded'] as $day => $service_hour)
								<li>
									<p>{{$day}}</p>
									@if($service_hour['is_open'] == 'no')
										<p class="close">Close</p>
									@else
										<p>{{$service_hour['start_time']}} - {{$service_hour['end_time']}}</p>
									@endif
								</li>
							@endforeach
						</ul>
					</div>
					<div class="cancellation content-listing">
						<h3>CANCELLATION POLICY FOR {{$profile['full_name']}}</h3>
						<p>{{$profile['pro_profile']['cancellation_policy']}}</p>
					</div>
					<div class="contact content-listing">
						<h3>Mobile Number</h3>
						<h2><i class="fa fa-phone" aria-hidden="true"></i> {{ $profile['phone_number'] }}</h2>
					</div>
					<div class="social-media content-listing">
						<h3>Social Media</h3>
						<div class="link-holder">
							@php
								$social_media = config('settings.professionals.social_media');
							@endphp
							@foreach($social_media as $social)
								@php
									$link = $profile['pro_profile']['social_link_' . $social['name']];
								@endphp
								@if(!empty(trim($link)))
									<a href="{{$link}}" target="_blank"><i class="fa fa-{{$social['name']}}" aria-hidden="true" style="color:{{$social['color']}};"></i></a>
								@endif
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@push('js_tail')
<script>
	$(function() {
		var loaded_all = false,
			INITIAL_MAX_INDEX = 4,
			LIMIT = $('.service-listing li').length,
			current_index = 5;
		$('#view-more-services').on('click', function() {
			if(!loaded_all){
				$('.service-listing li:gt('+INITIAL_MAX_INDEX+')').show();
			}else{
				$('.service-listing li:gt('+INITIAL_MAX_INDEX+')').hide();
			}
			
			if($('.service-listing li:not(:visible)').length == 0){
				loaded_all = true;
				$(this).text('VIEW LESS');
			}else{
				$(this).text('VIEW MORE');
				loaded_all = false;
			}

			return false;
		});
	});
</script>
@endpush