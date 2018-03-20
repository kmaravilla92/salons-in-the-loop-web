<template>
	<section id="main-wrapper" class="inner dashboard dashboard-pro client-req" style="padding-bottom: 479px;">
		<div class="banner-container clearfix pro-bg">
			<div class="wrapper">
				<p class="f-left">Help Request</p>
				<router-link
					:to="{ name: 'professional.owner.help-requests.search' }"
					class="f-right"
				>
					Back to <span style="color:#ffb1b1;">Search Listing</span>
				</router-link>
			</div>
		</div>
		<div class="wrapper">
			<div class="content-container app-client-req-details help-req booked-rental search-client-req-details search-help search-rental">
				<div class="client-req-holder">
					<Loader
						v-if="posted_rental.is_loading"
						text="LOADING POSTED RENTAL DETAILS ..."
					>	
					</Loader>
					<div v-if="!posted_rental.is_loading">
						<div class="client-details">
							<div class="img-holder">
								<img 
										:src="posted_rental.item.owner.profile_pic" 
										:alt="posted_rental.item.owner.profile_pic"
									>
							</div>
							<h3> <span style="color:#88629a;">Salon Business</span> <br> Maggie Cui</h3>
							<a href="#" class="btn btn-violet-b">See Profile</a>
						</div>
						<div class="request-details">
							<div class="clearfix title-details">
								<div class="f-left">
									<p><span>User Types </span>{{posted_rental.item.category_csv}}</p>
									<h3>{{posted_rental.item.title}} </h3>
									<label for=""><span>Posted</span> {{posted_rental.item.created_at}}</label>
								</div>
								<div class="f-right">
									<p>Daily Rate </p>
									<h5>${{posted_rental.item.rate_price}}</h5>
								</div>
								<div class="f-right space">
									<p>Spaces available</p>
									<h5>{{posted_rental.item.number_of_available_spaces}}</h5>
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
											<p>{{posted_rental.item.rate_text}}</p>
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
											<p> <i class="fa fa-clock-o" aria-hidden="true"></i> {{posted_rental.item.end_time}}</p>
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
									</ul>
									<p
										v-if="!posted_rental.item.requirements_decoded.length"
									>
										No service options available.
									</p>
								</div>
							</div>
						</div>
						<div class="cancellation form-holder">
							<div class="checkbox">
								<input type="checkbox" name="" value="" v-model="agree">
								<span></span>
							</div><p>By checking this, you indicate that you have read and agree to the <a href="/terms-and-conditions" target="_blank">Cancellation</a> and <a href="/terms-and-conditions" target="_blank">Refund Policy</a>.</p>
						</div>
						<div class="btn-holder write-review">
							<a href="#" class="btn btn-blue" @click.prevent="bookRental">BOOK RENTAL</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	export default {
		data() {
			return {
				user_id: userId,
				posted_rental: {
					item: {
						id: this.$route.params.id
					},
					is_loading: true
				},
				posted_rental_application: null,
				agree: false,
			}
		},

		mounted() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			this.$root.main.show = false;
		},

		destroyed() {
			this.$parent.sidebar.show = true;
			this.$parent.in_user_dashboard = true;
			this.$root.main.show = true;
		},

		created() {
			this.fetchData();
		},

		watch: {
			'$route': 'fetchData'
		},

		methods: {
			_fetchPostedRental() {
				return axios
						.get(
							apiBaseUrl + 'rest/posted-rentals/' + this.posted_rental.item.id
						); 
			},
			_fetchProBooking() {
				return axios
						.get(
							apiBaseUrl + 'rest/posted-rentals/' + this.posted_rental.item.id
						); 
			},
			fetchData() {
				var vm = this;
					axios
						.all([
							this._fetchPostedRental(),
							this._fetchProBooking(),
						])
						.then(axios.spread((posted_rental, posted_rental_application)=>{
							vm.posted_rental.item = posted_rental.data;
							// vm.posted_rental_application = posted_rental_application.data.application;
							vm.posted_rental.is_loading = false;
						}),(error)=>{
							vm.posted_rental.is_loading = false;
            				vm.$toastr('error', 'Something went wrong. Please try again later.', 'Rental Details');
						})
			},
			
			bookRental() {
				if(!this.agree){
					alert('You must acknowledge the agreenment first before you can proceed.');
					return false;
				}

				this.$parent.$router.push({
					name: 'professional.owner.posted-rentals.book.step-1',
					params: {
						posted_rental_id: this.posted_rental.item.id
					}
				});
			}
		}
	}
</script>