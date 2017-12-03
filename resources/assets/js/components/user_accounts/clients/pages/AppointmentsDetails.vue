<template>
	<div class="content-container app-client-req-details client-appointment booking-details">
		<div class="inner-title">
			<h3>My Booked Details</h3>

		</div>
		<h2>BOOKING DETAILS <span class="f-right">June 29, 2017</span></h2>
		<div class="request-details">
			<div class="services-holder">
				<ul>
					<li>
						<div class="services col">
							<p><i class="fa fa-scissors" aria-hidden="true"></i> Services</p>
						</div>
						<div class="notes col">
							<p><i class="fa fa-file-o" aria-hidden="true"></i> Additional Notes</p>
						</div>
						<div class="fee col">
							<p>Service Fee</p>
						</div>
					</li>
					<li>
						<div 
							class="details-holder"
							v-for="(selected_service, index) in appointment.selected_services"
						>
							<div class="services col">
								<h3>{{ selected_service.pro_service.service_name }}  <span>$ {{ selected_service.pro_service.price }}</span></h3>
								<p>$ {{ selected_service.pro_service.price }} for {{ selected_service.pro_service.duration }} minutes </p>
							</div>
							<div class="notes col">
								<p>
									{{ selected_service.additional_notes }}
								</p>
							</div>
							<div class="fee col">
								<h3>$ {{ selected_service.pro_service.price }}</h3>
							</div>
						</div>
						<div class="details-holder" v-if="appointment && appointment.selected_services.length == 0">
							No services
						</div>
					</li>
					<li>
						<div class="time-location">
							<ul>
								<li class="clearfix">
									<h3 class="time f-left"><i class="fa fa-clock-o" aria-hidden="true"></i>Time</h3>
									<h3 class="loc f-right"><i class="fa fa-map-marker" aria-hidden="true"></i>Location</h3>
								</li>
								<li 
									class="clearfix"
									v-for="(time, index) in appointment.selected_datetime"
								>
									<!-- <p class="time f-left">Morning <br> 7:30 - 8:00</p> -->
									<p class="time f-left">
										{{ time.booking_date_time }}
									</p>
									<p class="loc f-right">
										<i class="fa fa-map-marker" aria-hidden="true"></i> 
										{{ time.location }}
									</p>
								</li>
								<li class="clearfix" v-if="appointment && appointment.selected_datetime.length == 0">
									No schedule
								</li>
								<!-- <li class="clearfix">
									<p class="time f-left">Morning <br> 7:30 - 8:00</p>
									<p class="loc f-right"><i class="fa fa-map-marker" aria-hidden="true"></i> Square town, Square city</p>
								</li> -->
							</ul>
							<div class="total">
								<h3>    Services(s) total time /booked time </h3>
								<h2>90 min / 90 min</h2>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="total-holder">
				<div class="col">
					<h2>Total Amount :  <span>$ {{ appointment.total_price }}</span></h2>
				</div>
				<div class="pro-details">
					<div class="status">
						<i class="fa fa-check" aria-hidden="true"></i>
						<label for="">Hired</label>
						<hr class="f-right">
					</div>

					<div class="pro-holder">
						<div class="img-holder">
							<div class="img-over">
								<img src="/frontsite/images/pro2.jpg" alt="">
							</div>
							<a 
								:href="'/profile-view/'+appointment.professional.id+'/professional'" 
								class="btn btn-red-b">
								See Profile
							</a>
						</div>
						<div class="information">
							<h3>{{ appointment.professional.full_name }}</h3>
							<p>Square Town, Square City, Colorado - CO, 11010</p>
							<div class="rating">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
							</div>
						</div>
						<div class="description">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit .esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat </p>
						</div>
					</div>
					<div class="payment">
						<ul>
							<li class="clearfix">
								<p class="f-left">Amount</p>
								<p class="f-right">Status</p>
							</li>
							<li class="clearfix">
								<p class="f-left">$ {{ appointment.total_price }}</p>
								<p class="f-right"><span>Released</span></p>
							</li>
						</ul>
						<p class="total">Total: $ {{ appointment.total_price }}</p>
					</div>
				</div>
			</div>
			<div class="btn-holder write-review">
				<a href="#" class="btn btn-red-b" @click.prevent="">WRITE REVIEW</a>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios';
	export default {
		data() {
			return {
				user_id: userId,
				is_loading: true,
				appointment: {
					selected_services: [],
					selected_datetime: []
				}
			}
		},

		created() {
			this.fetchData();
		},

		watch: {
			'$route': 'fetchData'
		},

		methods: {
			fetchData() {
				var vm = this;
				axios
					.get(apiBaseUrl + 'rest/users/'+userId+'/appointments/' + this.$route.params.id)
					.then(function(response){
						vm.appointment = response.data;
						vm.is_loading = false;
					});
			},
		}
	}
</script>