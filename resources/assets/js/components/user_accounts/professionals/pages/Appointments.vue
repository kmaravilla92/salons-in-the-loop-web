<template>
	<div class="content-container app-client-req-details client-appointment">
		<div class="inner-title">
			<h3>My Appointments
				<div class="sort-holder f-right">
					<a class="sort-link">Sort by  <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
					<ul class="sort">
						<li><a href="#">All</a></li>
						<li><a href="#">Upcoming Appointments</a></li>
						<li><a href="#">Past Appointments</a></li>
					</ul>
				</div>
			</h3>

		</div>
		<div class="request-details">
			<ul>
				<li>
					<div class="client-holder">
						<div class="img-holder">
							<img src="/frontsite/images/client1-big.jpg" alt="">
						</div>
						<div class="social-media">
							<a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-mobile" aria-hidden="true"></i></a>
						</div>
						<h3>Alexa Snowe</h3>
						<p>
							Square Town, Square City, <br> Colorado - CO, 11010
						</p>
						<div class="rating">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</div>
						<a href="#" class="btn btn-red-b">See Profile</a>
					</div>
					<div class="content">
						<div class="title">
							<h3>Booked Appointment</h3>
							<p>June 29, 2017</p>
						</div>
						<div class="services">
							<h3><i class="fa fa-scissors" aria-hidden="true"></i> Services</h3>
							<div class="service-holder">
								<h3>Hair Cut <span>$100</span></h3>
								<p>$0 for 45 minutes </p>
							</div>
							<div class="service-holder">
								<h3>Hair Cut <span>$100</span></h3>
								<p>$0 for 45 minutes </p>
							</div>
						</div>
						<div class="time-location">
							<ul>
								<li>
									<h3 class="time"><i class="fa fa-clock-o" aria-hidden="true"></i>Time</h3>
									<h3 class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i>Location</h3>
								</li>
								<li>
									<p class="time">Morning <br> 7:30 - 8:00</p>
									<p class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i> Square town, Square city</p>
								</li>
								<li>
									<p class="time">Morning <br> 7:30 - 8:00</p>
									<p class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i> Square town, Square city</p>
								</li>
							</ul>
							<div class="total">
								<h3>    Services(s) total time /booked time </h3>
								<h2>90 min / 90 min</h2>
							</div>
						</div>
						<div class="total-holder">
							<div class="col">
								<h2>Total Amount :  <span>$ 200</span></h2>
							</div>
							<div class="col">
								<h3><span>2</span> Booked Services</h3>
							</div>
							<div class="col">
								<router-link to="/appointments/1" class="btn btn-blue-b">
									SEE DETAILS
								</router-link>
								<a href="#" class="link">Cancel</a>
							</div>
						</div>
					</div>
				</li>

			</ul>


		</div>
		<div class="request-details">
			<ul>
				<li>
					<div class="client-holder">
						<div class="img-holder">
							<img src="/frontsite/images/client1-big.jpg" alt="">
						</div>
						<div class="social-media">
							<a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-mobile" aria-hidden="true"></i></a>
						</div>
						<h3>Alexa Snowe</h3>
						<p>
							Square Town, Square City, <br> Colorado - CO, 11010
						</p>
						<div class="rating">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</div>
						<a href="#" class="btn btn-red-b">See Profile</a>
					</div>
					<div class="content">
						<div class="title">
							<h3>Booked Appointment</h3>
							<p>June 29, 2017</p>
						</div>
						<div class="services">
							<h3><i class="fa fa-scissors" aria-hidden="true"></i> Services</h3>
							<div class="service-holder">
								<h3>Hair Cut <span>$100</span></h3>
								<p>$0 for 45 minutes </p>
							</div>
							<div class="service-holder">
								<h3>Hair Cut <span>$100</span></h3>
								<p>$0 for 45 minutes </p>
							</div>
						</div>
						<div class="time-location">
							<ul>
								<li>
									<h3 class="time"><i class="fa fa-clock-o" aria-hidden="true"></i>Time</h3>
									<h3 class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i>Location</h3>
								</li>
								<li>
									<p class="time">Morning <br> 7:30 - 8:00</p>
									<p class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i> Square town, Square city</p>
								</li>
								<li>
									<p class="time">Morning <br> 7:30 - 8:00</p>
									<p class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i> Square town, Square city</p>
								</li>
							</ul>
							<div class="total">
								<h3>    Services(s) total time /booked time </h3>
								<h2>90 min / 90 min</h2>
							</div>
						</div>
						<div class="total-holder">
							<div class="col">
								<h2>Total Amount :  <span>$ 200</span></h2>
							</div>
							<div class="col">
								<h3><span>2</span> Booked Services</h3>
							</div>
							<div class="col">
								<router-link to="/appointments/1" class="btn btn-blue-b">
									SEE DETAILS
								</router-link>
								<a href="#" class="link">Cancel</a>
							</div>
						</div>
					</div>
				</li>

			</ul>


		</div>
		<div class="request-details">
			<ul>
				<li>
					<div class="client-holder">
						<div class="img-holder">
							<img src="/frontsite/images/client1-big.jpg" alt="">
						</div>
						<div class="social-media">
							<a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-mobile" aria-hidden="true"></i></a>
						</div>
						<h3>Alexa Snowe</h3>
						<p>
							Square Town, Square City, <br> Colorado - CO, 11010
						</p>
						<div class="rating">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</div>
						<a href="#" class="btn btn-red-b">See Profile</a>
					</div>
					<div class="content">
						<div class="title">
							<h3>Booked Appointment</h3>
							<p>June 29, 2017</p>
						</div>
						<div class="services">
							<h3><i class="fa fa-scissors" aria-hidden="true"></i> Services</h3>
							<div class="service-holder">
								<h3>Hair Cut <span>$100</span></h3>
								<p>$0 for 45 minutes </p>
							</div>
							<div class="service-holder">
								<h3>Hair Cut <span>$100</span></h3>
								<p>$0 for 45 minutes </p>
							</div>
						</div>
						<div class="time-location">
							<ul>
								<li>
									<h3 class="time"><i class="fa fa-clock-o" aria-hidden="true"></i>Time</h3>
									<h3 class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i>Location</h3>
								</li>
								<li>
									<p class="time">Morning <br> 7:30 - 8:00</p>
									<p class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i> Square town, Square city</p>
								</li>
								<li>
									<p class="time">Morning <br> 7:30 - 8:00</p>
									<p class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i> Square town, Square city</p>
								</li>
							</ul>
							<div class="total">
								<h3>    Services(s) total time /booked time </h3>
								<h2>90 min / 90 min</h2>
							</div>
						</div>
						<div class="total-holder">
							<div class="col">
								<h2>Total Amount :  <span>$ 200</span></h2>
							</div>
							<div class="col">
								<h3><span>2</span> Booked Services</h3>
							</div>
							<div class="col">
								<router-link to="/appointments/1" class="btn btn-blue-b">
									SEE DETAILS
								</router-link>
								<a href="#" class="link">Cancel</a>
							</div>
						</div>
					</div>
				</li>

			</ul>


		</div>
		<div class="request-details">
			<ul>
				<li>
					<div class="client-holder">
						<div class="img-holder">
							<img src="/frontsite/images/client1-big.jpg" alt="">
						</div>
						<div class="social-media">
							<a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-mobile" aria-hidden="true"></i></a>
						</div>
						<h3>Alexa Snowe</h3>
						<p>
							Square Town, Square City, <br> Colorado - CO, 11010
						</p>
						<div class="rating">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</div>
						<a href="#" class="btn btn-red-b">See Profile</a>
					</div>
					<div class="content">
						<div class="title">
							<h3>Booked Appointment</h3>
							<p>June 29, 2017</p>
						</div>
						<div class="services">
							<h3><i class="fa fa-scissors" aria-hidden="true"></i> Services</h3>
							<div class="service-holder">
								<h3>Hair Cut <span>$100</span></h3>
								<p>$0 for 45 minutes </p>
							</div>
							<div class="service-holder">
								<h3>Hair Cut <span>$100</span></h3>
								<p>$0 for 45 minutes </p>
							</div>
						</div>
						<div class="time-location">
							<ul>
								<li>
									<h3 class="time"><i class="fa fa-clock-o" aria-hidden="true"></i>Time</h3>
									<h3 class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i>Location</h3>
								</li>
								<li>
									<p class="time">Morning <br> 7:30 - 8:00</p>
									<p class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i> Square town, Square city</p>
								</li>
								<li>
									<p class="time">Morning <br> 7:30 - 8:00</p>
									<p class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i> Square town, Square city</p>
								</li>
							</ul>
							<div class="total">
								<h3>    Services(s) total time /booked time </h3>
								<h2>90 min / 90 min</h2>
							</div>
						</div>
						<div class="total-holder">
							<div class="col">
								<h2>Total Amount :  <span>$ 200</span></h2>
							</div>
							<div class="col">
								<h3><span>2</span> Booked Services</h3>
							</div>
							<div class="col">
								<router-link to="/appointments/1" class="btn btn-blue-b">
									SEE DETAILS
								</router-link>
								<a href="#" class="link">Cancel</a>
							</div>
						</div>
					</div>
				</li>

			</ul>


		</div>


		<div class="pagination-holder clearfix">
			<div class="f-left">
				<p>Showing 8 out of 8 of Client Appointment</p>
			</div>
			<div class="pagination f-right">
				<a href="#">First</a>
				<a href="#">Previous</a>
				<a href="#">1</a>
				<a href="#">2</a>
				<a href="#">3</a>
				<a href="#">Next</a>
				<a href="#">Last</a>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		mounted() {
			
		}
	}
</script>