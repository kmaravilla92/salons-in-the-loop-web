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
						v-if="posted_help_request.is_loading"
						text="LOADING POSTED RENTAL DETAILS ..."
					>	
					</Loader>
					<div v-if="!posted_help_request.is_loading">
						<div class="client-details">
							<div class="img-holder">
								<img 
									:src="posted_help_request.item.owner.profile_pic" 
									:alt="posted_help_request.item.owner.profile_pic">
							</div>
							<h3> <span style="color:#88629a;">{{posted_help_request.item.owner.profile.category_csv}}</span> <br> {{posted_help_request.item.owner.full_name}}</h3>
							<a 
								:href="'/profile-view/'+posted_help_request.item.owner.id+'/owner'" 
								class="btn btn-violet-b"
								target="_blank">
								See Profile
							</a>
						</div>
						<div class="request-details">
							<div class="clearfix title-details">
								<div class="f-left">
									<p><span>User Types </span>{{posted_help_request.item.category_csv}}</p>
									<h3>{{posted_help_request.item.title}} </h3>
									<label for=""><span>Posted</span> {{posted_help_request.item.created_at}}</label>
								</div>
								<div class="f-right budget">
									<p>Weekly Total </p>
									<h5>${{posted_help_request.item.weekly_total}}</h5>
								</div>
							</div>
							<div class="content">
								<p>{{posted_help_request.item.description}}</p>
							</div>
							<div class="sched-requirement">
								<div class="schedule">
									<ul>
										<li>
											<h5>Schedule</h5>
											<p>{{posted_help_request.item.rate_text}}</p>
										</li>
										<li>
											<h5>Days</h5>
											<p>{{posted_help_request.item.selected_days_text_short}}</p>
										</li>
										<li>
											<h5>Desired Start Date</h5>
											<p><i class="fa fa-calendar" aria-hidden="true"></i> {{posted_help_request.item.start_date}}</p>
										</li>
										<li>
											<h5>Desired End Date</h5>
											<p><i class="fa fa-calendar" aria-hidden="true"></i> {{posted_help_request.item.end_date}}</p>
										</li>
										<li>
											<h5>Desired Start Time</h5>
											<p> <i class="fa fa-clock-o" aria-hidden="true"></i> {{posted_help_request.item.start_time}}</p>
										</li>
										<li>
											<h5>Desired End Time</h5>
											<p> <i class="fa fa-clock-o" aria-hidden="true"></i> {{posted_help_request.item.end_time}}</p>
										</li>
										<li>
											<h5>Address</h5>
											<p><i class="fa fa-map-marker" aria-hidden="true"></i>  {{posted_help_request.item.full_address}}</p>
										</li>
									</ul>
								</div>
								<div class="requirements">
									<h3>Requirements</h3>
									<ul v-if="posted_help_request.item.service_options_decoded.length > 0">
										<li
											v-for="service_option in posted_help_request.item.service_options_decoded"
											>
												{{service_option}}
											</li>
										<!-- <li>Must perform service in salon</li>
										<li>No partial payment fir this listing</li>
										<li>Must be licesed</li> -->
									</ul>
									<p
										v-if="!posted_help_request.item.service_options_decoded.length"
									>
										No service options available.
									</p>
								</div>
							</div>
						</div>
						<div class="btn-holder">
							<a href="#" class="btn btn-blue" @click.prevent="applyJob">APPLY FOR THIS JOB</a>
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
				posted_help_request: {
					item: {
						id: this.$route.params.id
					},
					is_loading: true
				},
				posted_help_request_application: null
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
							apiBaseUrl + 'rest/posted-help-requests/' + this.posted_help_request.item.id
						); 
			},
			_fetchProBooking() {
				return axios
						.get(
							apiBaseUrl + 'rest/posted-help-requests/' + this.posted_help_request.item.id
						); 
			},
			fetchData() {
				var vm = this;
					axios
						.all([
							this._fetchPostedRental(),
							this._fetchProBooking(),
						])
						.then(axios.spread(function(posted_help_request, posted_help_request_application){
							vm.posted_help_request.item = posted_help_request.data;
							// vm.posted_help_request_application = posted_help_request_application.data.application;
							vm.posted_help_request.is_loading = false;
						})).catch(function(error){
							vm.posted_help_request.is_loading = false;
							console.log('error', error);
            				alert('Something went wrong. Please try again later');
						});
			},

			applyJob() {
				alert('FEATURE UNDER DEVELOPMENT.')
			}
		}
	}
</script>