<template>
	<div class="content-container app-client-req-details help-req req-release booked-rental ownerhelp-req">
		<div class="inner-title">
			<h3>My Posted Rentals Details
			</h3>
		</div>
		<div class="request-details">
			<Loader
				v-if="posted_rental.is_loading"
				text="LOADING SPACE RENTAL DETAILS ..."
			>	
			</Loader>
			<div class="clearfix title-details">
				<div class="f-left">
					<p><span>Category </span>{{posted_rental.item.category}}</p>
					<h3>{{posted_rental.item.title}} </h3>
					<label for=""><span>Posted</span> {{posted_rental.item.created_at}}</label>
				</div>
				<div class="f-right">
					<p>Rent Rate</p>
					<h5>$ {{posted_rental.item.rate}}</h5>
				</div>
				<div class="f-right space">
					<p>Spaces available</p>
					<div class="clearfix">
						<h5 class="f-right">2</h5>
						<div class="delete-space f-left">
							<a href="#">Delete all space(s)</a>
							<span> | </span>
							<a href="#">Delete 1 space</a>
						</div>
					</div>

				</div>
			</div>
			<div class="content">
				<p>{{posted_rental.item.description}}</p>
			</div>
			<div class="sched-requirement">
				<div class="schedule">
					<ul>
						<li>
							<h5>Schedule</h5>
							<p>{{posted_rental.item.rate_price}}</p>
						</li>
						<li>
							<h5>Days</h5>
							<p>{{posted_rental.item.selected_days_text_short}}</p>
						</li>
						<li>
							<h5>Desired Start Date</h5>
							<p><i class="fa fa-calendar" aria-hidden="true"></i> {{posted_rental.item.start_date}}</p>
						</li>
						<li>
							<h5>Desired End Date</h5>
							<p><i class="fa fa-calendar" aria-hidden="true"></i> {{posted_rental.item.end_date}}</p>
						</li>
						<li>
							<h5>Desired Start Time</h5>
							<p> <i class="fa fa-clock-o" aria-hidden="true"></i> {{posted_rental.item.start_time}}</p>
						</li>
						<li>
							<h5>Desired End Time</h5>
							<p> <i class="fa fa-clock-o" aria-hidden="true"></i>  {{posted_rental.item.end_time}}</p>
						</li>
						<li>
							<h5>Address</h5>
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  {{posted_rental.item.full_address}}</p>
						</li>
					</ul>
				</div>
				<div class="requirements">
					<h3>Requirements</h3>
					<ul v-if="posted_rental.item.service_options_decoded.length > 0">
						<li
							v-for="service_option in posted_rental.item.service_options_decoded"
							>
								{{service_option}}
							</li>
						<!-- <li>Must perform service in salon</li>
						<li>No partial payment fir this listing</li>
						<li>Must be licesed</li> -->
					</ul>
					<p
						v-if="!posted_rental.item.service_options_decoded.length"
					>
						No service options available.
					</p>
				</div>
				</div>

				<div class="btn-holder write-review cancel">
					<a href="#" class="btn btn-red-b">CANCEL RENTAL</a>
				</div>
				
				<div class="pro-details owner-pro-details">
					<div class="status">
						<span>{{posted_rental.item.renters_count}}</span>
						<label for=""> Professionals Applied</label>
						<hr class="f-right">
					</div>

					<Loader
						v-if="posted_rental_applications.is_loading"
						text="LOADING POSTED HELP REQUEST APPLICATIONS ..."
					>	
					</Loader>
					<div class="pro-holder" v-for="posted_rental_application in postedRentalApplications(posted_rental.item)">
						<div class="img-holder">
							<div class="img-over">
								<img src="/frontsite/images/pro1.jpg" alt="">
							</div>
							<a 
								:href="'/profile-view/'+posted_rental_application.professional_id+'/professional'" 
								class="btn btn-red-b"
								target="_blank"
							>
									See Profile
							</a>
						</div>
						<div class="information help-req-owner">
							<h3>{{posted_rental_application.professional.full_name}}</h3>
							<p>Square Town, Square City, Colorado - CO, 11010</p>
							<div class="rating">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
							</div>
							<a 
								href="#" 
								class="btn btn-blue-b"
								@click.prevent="hireProApplication(posted_rental.item, posted_rental_application)"
								v-if="posted_rental_application.application_status != '1'"
								>
								Accept
							</a>
						</div>
						<div class="description">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit .esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat </p>
						</div>
					</div>

				</div>
				<br><br><br>
				<div class="pagination-holder clearfix">
					<div class="f-left">

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
		</div>
	</div>
</template>

<script>
	import axios from 'axios';

	export default {
		data() {
			return {
				posted_rental: {
					is_loading: true,
					item: null
				},
				posted_rental_applications: {
					is_loading: true,
					items: []
				}
			}
		},

		computed: {

			postedRentalHasHiredPro() {
				return this.posted_rental.item.hired_application > 0;
			},

			postedRentalCompleted() {
				return this.posted_rental.item.payment_released;
			},

			postedRentalBudgetBreakDown() {
				var budget = this.posted_rental.item.weekly_total;
				return {
					initial: parseFloat(budget * .10).toFixed(2),
					remaining: parseFloat(budget * .90).toFixed(2)
				}
			}
		},

		mounted() {

		},

		created() {
			this.fetchData();
		},

		watch: {
			'$route': 'fetchData'
		},

		methods: {

			_fetchpostedRental() {
				return axios
						.get(
							apiBaseUrl + 'rest/owners/' + userId + '/space-rentals/' + this.$route.params.id,
							{
								params: {
									recent_only: true
								}
							}
						);
			},

			_fetchpostedRentalApplications() {
				return axios
						.get(
							apiBaseUrl + 'rest/owners/' + userId + '/space-rentals/' + this.$route.params.id +'/applications',
							{
								params: {
									recent_only: true
								}
							}
						);
			},

			fetchData() {
				var vm = this;
				axios.all([
					this._fetchpostedRental(),
					this._fetchpostedRentalApplications()
				])
				.then(axios.spread(function(posted_rental, posted_rental_applications) {
					vm.posted_rental = {
						is_loading: false,
						item: posted_rental.data
					};
					vm.posted_rental_applications = {
						is_loading: false,
						items: posted_rental_applications.data
					};
				}))
				.catch(function(error){
					alert('Something went wrong. Please refresh your browser.');
					vm.posted_rental.is_loading = false;
					vm.posted_rental_applications.is_loading = false;
				});
			},

			_updatepostedRental(posted_rental){
				return axios
						.put(
							apiBaseUrl + 'rest/owners/' + userId + '/space-rentals/' + posted_rental.id,
							{
								hired_application: posted_rental.hired_application
							}
						)
			},

			_updateApplication(application) {
				return axios
						.put(
							apiBaseUrl + 'rest/owners/' + userId + '/space-rentals/' + this.$route.params.id +'/applications/' + application.id,
							{
								application_status: '1'
							}
						)
			},

			hireProApplication(posted_rental, application) {

				if(application.application_status == '1'){
					return false;
				}

				var vm = this;
					axios.all([
						this._updatepostedRental({
							id: posted_rental.id,
							hired_application: application.id
						}),
						this._updateApplication(application)
					])
					.then(axios.spread(function(update_posted_rental, update_application) {
						if(update_posted_rental.data.success){
							posted_rental.hired_application = application.id;
						}

						if(update_application.data.success){
							application.application_status = '1';
						}
					}))
					.catch(function(error){
						alert('Something went wrong. Please refresh your browser.' + error);
					});
			},

			postedRentalApplications(posted_rental) {
				if(!this.postedRentalHasHiredPro){
					return this.posted_rental_applications.items;
				}

				return this.posted_rental_applications.items.filter(function(application) {
					return application.id == posted_rental.hired_application;
				});
			},

			releaseFund(posted_rental){
				posted_rental.payment_released = true;
				console.log(posted_rental)
			}
		}
	}
</script>