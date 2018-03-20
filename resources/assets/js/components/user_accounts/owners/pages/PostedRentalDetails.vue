<template>
	<div class="content-container app-client-req-details help-req req-release booked-rental ownerhelp-req">
		<div class="inner-title">
			<h3>My Posted Rentals Details
			</h3>
		</div>
		<Loader
			v-if="posted_rental.is_loading"
		>	
		</Loader>
		<div class="request-details" v-if="posted_rental.item != null">
			<div class="clearfix title-details">
				<div class="f-left">
					<p><span>Category </span>{{posted_rental.item.category_csv}}</p>
					<h3>{{posted_rental.item.title}} </h3>
					<label for=""><span>Posted</span> {{posted_rental.item.created_at}}</label>
				</div>
				<div class="f-right">
					<p>Rent Rate</p>
					<h5>$ {{posted_rental.item.rate_price}}</h5>
				</div>
				<div class="f-right space">
					<p>Spaces available</p>
					<div class="clearfix">
						<h5 class="f-right">{{posted_rental.item.number_of_spaces}}</h5>
						<div class="delete-space f-left">
							<a href="#" @click.prevent="deleteSpaces('all', posted_rental.item)">Delete all space(s)</a>
							<span> | </span>
							<a href="#" @click.prevent="deleteSpaces(1, posted_rental.item)">Delete 1 space</a>
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
					<ul v-if="posted_rental.item.requirements_decoded.length > 0">
						<li
							v-for="service_option in posted_rental.item.requirements_decoded"
							>
								{{service_option}}
							</li>
						<!-- <li>Must perform service in salon</li>
						<li>No partial payment fir this listing</li>
						<li>Must be licesed</li> -->
					</ul>
					<p
						v-if="!posted_rental.item.requirements_decoded.length"
					>
						No service options available.
					</p>
				</div>

				<div class="btn-holder write-review cancel">
					<a href="#" class="btn btn-red-b" @click.prevent="cancelRental">CANCEL RENTAL</a>
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
								<img 
									:src="posted_rental_application.professional.profile_pic" 
									:alt="posted_rental_application.professional.profile_pic"
								>
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
							<p>{{posted_rental_application.professional.profile.full_address}}</p>
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
							<a 
								href="#" 
								class="btn btn-blue-b"
								@click.prevent=""
								v-if="posted_rental_application.application_status == '1'"
								>
								Accepted
							</a>
						</div>
						<div class="description">
							<p>{{posted_rental_application.message_to_salon_owner}} </p>
						</div>
					</div>

				</div>
				<br><br><br>
				<div class="pagination-holder clearfix">
					<div class="pagination">
						<pagination 
							:records="posted_rental_applications.total"
							:perPage="posted_rental_applications.per_page"
							:countText="posted_rental_applications.countText"
							@paginate="setPage">
						</pagination>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios'
	import {Pagination} from 'vue-pagination-2'
	export default {
		data() {
			return {
				posted_rental: {
					is_loading: true,
					item: null
				},
				posted_rental_applications: {
					is_loading: true,
					items: [],
					current_page: 1,
					total: 0,
					per_page: settings.pagination.per_page,
					countText: 'Showing {from} to {to} of {count} Posted Rental Applications',
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

		components: {
			Pagination
		},

		methods: {

			setPage(page) {
				const vm = this;
				this.posted_rental_applications.current_page = page;
				this
					._fetchPostedRentalApplications()
					.then((response)=>{
						const data = response.data;
						vm.posted_rental_applications.items = data.data;
						vm.posted_rental_applications.total = data.total;
						vm.posted_rental_applications.is_loading = false;
					},(error)=>{
						vm.$toastr('error', 'Something went wrong. Please try again later.', 'Posted Requests List');
						vm.posted_rental_applications.is_loading = false;
					});
			},

			_fetchPostedRental() {
				return axios
						.get(
							apiBaseUrl + 'rest/owners/' + userId + '/space-rentals/' + this.$route.params.id
						);
			},

			_fetchPostedRentalApplications() {
				return axios
						.get(
							apiBaseUrl + 'rest/owners/' + userId + '/space-rentals/' + this.$route.params.id +'/applications',
							{
								params: {
									page: this.posted_rental_applications.current_page
								}
							}
						);
			},

			fetchData() {
				var vm = this;
				axios.all([
					this._fetchPostedRental(),
					this._fetchPostedRentalApplications()
				])
				.then(axios.spread(function(posted_rental, posted_rental_applications) {
					vm.posted_rental = {
						is_loading: false,
						item: posted_rental.data
					};

					vm.posted_rental_applications.items = posted_rental_applications.data.data;
					vm.posted_rental_applications.total = posted_rental_applications.data.total;
					vm.posted_rental_applications.is_loading = false;
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
			},

			cancelRental() {
				alert('FEATURE UNDER DEVELOPMENT');
			},

			deleteSpaces(qty, posted_rental) {
				if(qty == 'all'){
					posted_rental.number_of_spaces = 0
				}else{
					posted_rental.number_of_spaces -= 1;
				}

				// xhr here
			}
		}
	}
</script>