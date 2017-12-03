@extends('frontsite.master')

@section('content')
	<section id="main-wrapper" class="inner register">

		<div class="wrapper">
			<div class="content-section">
				<form action="{{route('frontsite.guests.user-registration.check-user-type')}}" method="POST">
					{{csrf_field()}}
					<div class="title-holder">
						<h3>Select a role</h3>
					</div>
					<div class="role-container">
						<div class="role-holder">
							<input type="radio" name="user[type]" value="owner" checked>
							<div class="img-holder ease">
								<img src="/frontsite/images/reg1.png" alt="">
							</div>
							<p>Salon Owner</p>
						</div>
						<div class="role-holder">
							<input type="radio" name="user[type]" value="professional">
							<div class="img-holder ease">
								<img src="/frontsite/images/reg2.png" alt="">
							</div>
							<p>Salon Professional</p>
						</div>
						<div class="role-holder">
							<input type="radio" name="user[type]" value="client">
							<div class="img-holder ease">
								<img src="/frontsite/images/reg3.png" alt="">
							</div>
							<p>Client/Customer</p>
						</div>
					</div>
					<div class="btn-holder">
						<!-- <a href="#" class="btn btn-blue btn-slim">Continue</a> -->
						<button class="btn btn-blue btn-slim">Continue</button>
					</div>
				</form>
			</div>
		</div>
	</section>
@endsection