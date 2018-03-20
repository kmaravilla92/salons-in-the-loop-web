<template>
	<div class="content-container app-client-req-details client-appointment">
		<div class="inner-title">
			<h3>
				Booked Appointments
				<div class="sort-holder f-right">
					<a class="sort-link">Sort by  <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
					<ul class="sort">
						<li><a href="#">All</a></li>
						<li><a href="#">Upcoming Bookings</a></li>
						<li><a href="#">Past Bookings</a></li>
					</ul>
				</div>
			</h3>
		</div>
		<Loader
			v-if="appointments.is_loading"
		>
		</Loader>
		<div 
			class="request-details"
			v-for="appointment in appointments.items"
		>
			<ul>
				<li>
					<div class="client-holder">
						<div class="img-holder">
							<img 
								:src="appointment.client.profile_pic" 
								:alt="appointment.client.profile_pic">
						</div>
						<h3>{{appointment.client.full_name}}</h3>
						<p>
							{{appointment.client.full_address}}
						</p>
						<div class="rating">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</div>
						<a 
							:href="'/profile-view/'+appointment.client_id+'/client'" 
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
									:to="{name: 'professional.client.bookings.single', params: {id: appointment.id}}"
									class="btn btn-blue-b"
								>
									SEE DETAILS
								</router-link>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="pagination-holder clearfix">
			<div class="pagination">
				<pagination 
					:records="appointments.total"
					:perPage="appointments.per_page"
					:countText="appointments.countText"
					@paginate="setPage">
				</pagination>
			</div>
		</div>
	</div>
</template>

<script>
	import {Pagination} from 'vue-pagination-2'
	export default {
		data() {
			return {
				appointments: {
					is_loading: true,
					items: [],
					current_page: 1,
					total: 0,
					per_page: settings.pagination.per_page,
					countText: 'Showing {from} to {to} of {count} My Client Appointments',
				},
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
			'$route' : 'fetchAppointments'
		},

		components: {
			Pagination
		},

		methods: {
			
			setPage(page) {
				this.appointments.current_page = page;
				this.fetchAppointments();
			},

			_fetchAppointments() {
				return axios
						.get(
							apiBaseUrl + 'rest/professionals/' + userId + '/appointments',
							{
								params: {
									page: this.appointments.current_page
								}
							}
						);
			},

			fetchAppointments() {
				var vm = this;
				axios.all([
					this._fetchAppointments()
				])
				.then(axios.spread(function(appointments) {
					const data = appointments.data;
					vm.appointments.items = data.data;
					vm.appointments.total = data.total;
					vm.appointments.is_loading = false;
				}))
				.catch(function(error){
					vm.$toastr('error', 'Something went wrong. Please try again later.', 'Posted Requests List');
					vm.appointments.is_loading = false;
				});
			}
		}
	}
</script>