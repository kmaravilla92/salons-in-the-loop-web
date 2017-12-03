@extends('frontsite.master')

@section('content')
	<section id="main-wrapper" class="inner register {{$type_details['form_class']}} register3">

		<div class="wrapper">
			<div class="content-section">
				<div class="title-holder">
					<h3>Sign Up for {{ucfirst($type)}}</h3>
				</div>
				<div class="content-holder">
					<h3>You have Successfully created an account</h3>
					<p>
						Verify your account now and go to your dashboard to continue to set up your profile @if(isset($type) && $type == 'professional') , create/edit your calendar, location (s), and edit account settings. @else . @endif
					</p>
				</div>
				<div class="btn-holder">
					<a href="#" class="btn btn-blue btn-slim">Setup my Profile</a>
				</div>
			</div>
		</div>
	</section>
@endsection