<section id="main-wrapper" class="inner pro-profile owner-profile">
	<div class="banner-holder client-bg">
		<div class="wrapper">
			<div class="clearfix">
				<div class="f-right">
					
				</div>
			</div>
		</div>
	</div>
	<div class="profilev-holder">
		<div class="prof">
			<div class="img-over">
				<div class="img-holder">
					<img 
						src="{{ $profile['profile_pic']['path'] }}" 
						alt="{{ $profile['profile_pic']['name'] }}"
					>
				</div>
			</div>
			<div class="details clearfix">
				<h3>
					{{$profile['full_name']}}
				</h3>
			</div>
		</div>
		<div class="clearfix col-holders">
			<div class="left-content f-left">
				<div class="service-address">
					<p>{{$profile['client_profile']['full_address']}}</p>
					<h5><i class="fa fa-lock" aria-hidden="true"></i> Client profile is private</h5>
					@if(isset($profile_view_request) && $profile_view_request['status'] == '0')
						<a href="{{route('frontsite.guests.request-profile-view.cancel', ['user_id'=>$profile['id'],'user_type'=>$user_type,'profile_request_view_id'=>$profile_view_request['id']])}}" class="btn btn-blue">Cancel Request</a>
					@else
						<a href="{{route('frontsite.guests.request-profile-view', ['user_id'=>$profile['id'],'user_type'=>$user_type])}}" class="btn btn-blue">Request To View Profile</a>
					@endif
					<a href="#" class="link">BACK</a>
				</div>
			</div>
		</div>
	</div>
</section>

@section('main_container_css', 'salon-pro dashboard dashboard-client public-prof')