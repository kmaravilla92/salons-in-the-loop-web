<template>
	<div class="content-container app-client-req-details help-req req-release booked-rental">
		<div class="inner-title">
			<h3>My Booked Rentals Details</h3>
		</div>
		<div class="request-details">
			<div class="clearfix title-details">
				<div class="f-left">
					<p><span>User Types </span>{{booked_rental.item.posted_rental.category_csv}}</p>
					<h3>{{booked_rental.item.posted_rental.title}} </h3>
					<label for=""><span>Posted</span> Today {{booked_rental.item.posted_rental.created_at}}</label>
				</div>
				<div class="f-right">
					<p>Rent Rate</p>
					<h5>${{booked_rental.item.posted_rental.rate_price}}</h5>
				</div>
				<div class="f-right space">
					<p>Spaces available</p>
					<h5>2</h5>
				</div>
			</div>
			<div class="content">
				<p>{{booked_rental.item.posted_rental.description}} </p>
			</div>
			<div class="sched-requirement">
				<div class="schedule">
					<ul>
						<li>
							<h5>Schedule</h5>
							<p>{{booked_rental.item.posted_rental.rate_text}}</p>
						</li>
						<li>
							<h5>Days</h5>
							<p>{{booked_rental.item.posted_rental.selected_days_short_text}}</p>
						</li>
						<li>
							<h5>Desired Start Date</h5>
							<p><i class="fa fa-calendar" aria-hidden="true"></i> {{booked_rental.item.posted_rental.start_date}}</p>
						</li>
						<li>
							<h5>Desired End Date</h5>
							<p><i class="fa fa-calendar" aria-hidden="true"></i> {{booked_rental.item.posted_rental.end_date}}</p>
						</li>
						<li>
							<h5>Desired Start Time</h5>
							<p> <i class="fa fa-clock-o" aria-hidden="true"></i> {{booked_rental.item.posted_rental.start_time}}</p>
						</li>
						<li>
							<h5>Desired End Time</h5>
							<p> <i class="fa fa-clock-o" aria-hidden="true"></i> {{booked_rental.item.posted_rental.end_time}}</p>
						</li>
						<li>
							<h5>Address</h5>
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  {{booked_rental.item.posted_rental.full_address}}</p>
						</li>
					</ul>
				</div>
				<div class="requirements">
					<h3>Requirements</h3>
					<ul v-if="booked_rental.item.posted_rental.requirements_decoded.length > 0">
						<li
							v-for="service_option in booked_rental.item.posted_rental.requirements_decoded"
							>
								{{service_option}}
							</li>
						<!-- <li>Must perform service in salon</li>
						<li>No partial payment fir this listing</li>
						<li>Must be licesed</li> -->
					</ul>
					<p
						v-if="!booked_rental.item.posted_rental.requirements_decoded.length"
					>
						No service options available.
					</p>
				</div>
				</div>

				<div class="btn-holder write-review cancel">
					<a href="#" class="btn btn-red-b" @click.prevent="cancelRental" v-if="!isCancelled">CANCEL RENTAL</a>
					<a href="#" class="btn btn-red-b" @click.prevent="" v-if="isCancelled">RENTAL CANCELLED</a>
				</div>
				
				<div class="pro-details">
					<div class="status" v-if="isHired">
						<i class="fa fa-check" aria-hidden="true"></i>
						<label for="">Selected by Salon Owner</label>
						<hr class="f-right">
					</div>
	
					<div class="status" v-if="!isHired">
						<i class="fa fa-exclamation-circle" aria-hidden="true" style="background: #cb4e4e;"></i>
						<label for="">Waiting for Salon Owner</label>
						<hr class="f-right">
					</div>

					<div class="booked-rental-holder clearfix sched-requirement">
						<div class="half-width f-left schedule">
							<ul>
								<li>
									<h5>Rental date</h5>
									<p> <i class="fa fa-clock-o" aria-hidden="true"></i> {{booked_rental.item.start_date}}            <span>- </span>       <i class="fa fa-clock-o" aria-hidden="true"></i>  {{booked_rental.item.end_date}}   </p>
								</li>
								<li>
									<h5>Desired End Time</h5>
									<p> <i class="fa fa-clock-o" aria-hidden="true"></i> {{booked_rental.item.start_time}} <span> - </span>   <i class="fa fa-clock-o" aria-hidden="true"></i> {{booked_rental.item.end_time}}</p>
								</li>
								<li>
									<h5>License</h5>
									<a 
										href="#"
										v-if="booked_rental.item.license_image_path"
									>
										License.jpg
									</a>
									<p v-if="!booked_rental.item.license_image_path">
										No License uploaded.
									</p>
								</li>
								<li>
									<h5>Allow Reoccur</h5>
									<p v-if="booked_rental.item.allow_reoccuring">
										<i class="fa fa-check" aria-hidden="true"></i>
										Repeat rental cycle till the duration end date
									</p>
									<p v-if="!booked_rental.item.allow_reoccuring">
										<i class="fa fa-close" aria-hidden="true"></i>
										No
									</p>
								</li>
							</ul>
						</div>
						<div class="half-width f-left schedule">
							<ul>
								<li class="message">
									<h5>Message for salon owner</h5>
									<p> {{booked_rental.item.message_to_salon_owner}} </p>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				pro_id: userId,
				rental_id: this.$route.params.rental_id,
				booked_rental: {
					item: [],
					is_loading: true,
				}
			}
		},

		mounted() {

		},

		created() {
			this.fetchBookedRental();
		},

		watch: {
			'$route': 'fetchBookedRental'
		},

		computed: {
			isCancelled() {
				return this.booked_rental.item.application_status == '2';
			},
			isHired() {
				return this.booked_rental.item.application_status == '1';
			}
		},

		methods: {
			fetchBookedRental() {
				const vm = this;
					axios(
						apiBaseUrl + 'rest/professionals/'+this.pro_id+'/posted-rentals/applications/' + this.rental_id
					)
					.then(function(response) {
						console.log(response.data);
						vm.booked_rental = {
							item: response.data,
							is_loading: false,
						};
					}, function(error) {
						vm.booked_rental.is_loading = false;
						console.log('error', error);
          				vm.$toastr('error', 'Something went wrong. Please try again later.', 'Booked Rental Details');
					});
			},
			
			cancelRental() {
				const vm = this,
					application_status = '2';
					axios
						.put(
							apiBaseUrl + 'rest/professionals/'+this.pro_id+'/posted-rentals/applications/' + this.rental_id, {
								application: {
									application_status: application_status
								}
							}
						)
						.then(function(response) {
							if(response.data.success){
								vm.booked_rental.item.application_status = application_status;
								vm.$toastr('success', 'Booked rental successfully updated.', 'Booked Rental Update');
							}
						}, function(error) {
		      				vm.$toastr('error', 'Something went wrong. Please try again later.', 'Booked Rental Update');
						});
			}
		}
	}
</script>