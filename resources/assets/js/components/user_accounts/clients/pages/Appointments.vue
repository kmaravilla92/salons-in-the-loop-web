<template>
	<div class="content-container app-client-req-details client-appointment">
		<div class="inner-title">
			<h3>My Appointments
				<div class="sort-holder f-right">
					<a class="sort-link">Sort by  <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
					<ul class="sort">
						<li><a href="#" @click.prevent="">All</a></li>
						<li><a href="#" @click.prevent="">Upcoming Appointments</a></li>
						<li><a href="#" @click.prevent="">Past Appointments</a></li>
					</ul>
				</div>
			</h3>
		</div>
		<Loader
			v-if="is_loading"
			text="LOADING RECENT POSTED REQUESTS ..."
		>	
		</Loader>
		<div 
			class="request-details" 
			v-for="(appointment, index) in appointments"
			:key="index"
		>
			<ul>
				<li>
					<div class="client-holder">
						<div class="img-holder">
							<img 
								:src="appointment.professional.profile_pic" 
								:alt="appointment.professional.profile_pic">
						</div>
						<div class="social-media">
							<a href="#" @click.prevent=""><i class="fa fa-phone" aria-hidden="true"></i></a>
							<a href="#" @click.prevent=""><i class="fa fa-mobile" aria-hidden="true"></i></a>
						</div>
						<h3>{{appointment.professional.full_name}}</h3>
						<p>
							{{appointment.professional.profile.full_address}}
						</p>
						<div class="rating">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</div>
						<a 
							:href="'/profile-view/'+appointment.professional_id+'/professional'" 
							class="btn btn-red-b"
							target="_blank"
						>
							See Profile
						</a>
					</div>
					<div class="content">
						<div class="title">
							<h3>Booked Appointment</h3>
							<p>{{ appointment.created_at }}</p>
						</div>
						<div class="services">
							<h3><i class="fa fa-scissors" aria-hidden="true"></i> Services</h3>
							<div 
								class="service-holder"
								v-for="(service, index) in appointment.limited_selected_services"
								v-if="service.pro_service"
							>
								<h3>{{ service.pro_service.service_name }} <span>$ {{ service.pro_service.price }}</span></h3>
								<p>$ {{ service.pro_service.price }} for {{ service.pro_service.duration }} minutes </p>
							</div>
							<p v-if="appointment.limited_selected_services.length == 0">No services</p>
						</div>
						<div class="time-location">
							<ul>
								<li>
									<h3 class="time"><i class="fa fa-clock-o" aria-hidden="true"></i>Time</h3>
									<h3 class="loc"><i class="fa fa-map-marker" aria-hidden="true"></i>Location</h3>
								</li>
								<li 
									v-for="(time, index) in appointment.limited_selected_time"
								>
									<!-- <p class="time">Morning <br> 7:30 - 8:00</p> -->
									<p class="time">
										{{ time.booking_date_time }}
									</p>
									<p class="loc">
										<i class="fa fa-map-marker" aria-hidden="true"></i> 
										{{ time.location }}
									</p>
								</li>
								<li v-if="appointment.limited_selected_time.length == 0">No services</li>
							</ul>
							<div class="total">
								<h3>    Services(s) total time /booked time </h3>
								<h2>90 min / 90 min</h2>
							</div>
						</div>
						<div class="total-holder">
							<div class="col">
								<h2>Total Amount :  <span>$ {{ appointment.total_price }}</span></h2>
							</div>
							<div class="col">
								<h3><span>{{ appointment.selected_services.length }}</span> Booked Services</h3>
							</div>
							<div class="col">
								<router-link 
									:to="'/appointments/'+appointment.id+''" 
									class="btn btn-blue-b">
									SEE DETAILS
								</router-link>
								<a 
									href="#" 
									class="link"
									@click.prevent="cancelAppointment(appointment)"
								>
									{{appointment.status == 1 ? 'Cancel' : 'Canceled'}}
								</a>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>

		<div class="pagination-holder clearfix" v-if="appointments.length > 10">
			<div class="f-left">
				<p>Showing {{ appointments.length }} out of {{ appointments.length }} of Client Appointment</p>
			</div>
			<div class="pagination f-right">
				<a href="#" @click.prevent="">First</a>
				<a href="#" @click.prevent="">Previous</a>
				<a href="#" @click.prevent="">1</a>
				<a href="#" @click.prevent="">2</a>
				<a href="#" @click.prevent="">3</a>
				<a href="#" @click.prevent="">Next</a>
				<a href="#" @click.prevent="">Last</a>
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
				appointments: []
			}
		},

		mounted() {
			$( ".sort-link" ).click(function() {
				$( ".sort" ).slideToggle( "slow", function() {
					// Animation complete.
				});
			});
		},

		created() {
			this.fetchAppointments();
		},

		watch: {
			'$route': 'fetchAppointments'
		},

		methods: {
			fetchAppointments() {
				var vm = this;
				axios
					.get(apiBaseUrl + 'rest/users/'+userId+'/appointments')
					.then(function(response){
						vm.appointments = response.data;
						vm.is_loading = false;
					});
			},

			cancelAppointment(appointment) {
				appointment.status = 2;
				this.$toastr('success', 'Appointment successfully cancelled.', 'Cancel Appointment')
			}
		},
	}
</script>