<template>
	<div class="content-container app-client-req-details help-req search-client-req-details">
		<div class="client-req-holder">
			<Loader
				v-if="is_loading"
				text="LOADING POSTED REQUESTS ..."
			>	
			</Loader>
			<div v-if="!is_loading">
				<div class="client-details">
					<div class="img-holder">
						<img 
							:src="posted_request.owner.profile_pic" 
							:alt="posted_request.owner.profile_pic"
						>
					</div>
					<h3>{{posted_request.owner.full_name}}</h3>
					<a 
						:href="'/profile-view/'+posted_request.owner.id+'/client'" 
						class="btn btn-red-b"
						target="_blank">
						See Profile
					</a>
				</div>
				<div class="request-details">
					<div class="clearfix title-details">
						<div class="f-left">
							<p><span>User Types </span>{{ posted_request.professional_types_csv }}</p>
							<h3>{{ posted_request.title }} </h3>
							<label for=""><span>Posted</span> {{posted_request.created_at }}</label>
						</div>
						<div class="f-right">
							<p>Budget</p>
							<h5>$ {{ posted_request.budget }}</h5>
						</div>
					</div>
					<div class="content">
						<p>{{ posted_request.message }}</p>
					</div>
					<div class="sched-requirement">
						<div class="schedule">
							<ul>
								<li>
									<h5>Schedule</h5>
									<p>Daily</p>
								</li>
								<li>
									<h5>Days</h5>
									<p>Sun Mon</p>
								</li>
								<li>
									<h5>Desired Start Date</h5>
									<p><i class="fa fa-calendar" aria-hidden="true"></i> {{ posted_request.desired_date }}</p>
								</li>
								<li>
									<h5>Desired End Date</h5>
									<p><i class="fa fa-calendar" aria-hidden="true"></i> {{ posted_request.desired_date }}</p>
								</li>
								<li>
									<h5>Desired Start Time</h5>
									<p> <i class="fa fa-clock-o" aria-hidden="true"></i> {{ posted_request.desired_time }}</p>
								</li>
								<li>
									<h5>Desired End Time</h5>
									<p> <i class="fa fa-clock-o" aria-hidden="true"></i>  {{ posted_request.desired_time }}</p>
								</li>
								<li>
									<h5>Address</h5>
									<p><i class="fa fa-map-marker" aria-hidden="true"></i>  {{ posted_request.full_address }}</p>
								</li>
							</ul>
						</div>
						<div class="requirements">
							<h3>Requirements</h3>
							<ul v-if="posted_request.service_options_decoded">
								<li
									v-for="service_option in posted_request.service_options_decoded"
									>
										{{service_option}}
									</li>
								<!-- <li>Must perform service in salon</li>
								<li>No partial payment fir this listing</li>
								<li>Must be licesed</li> -->
							</ul>
							<p
								v-if="!posted_request.service_options_decoded.length"
							>
								No service options available.
							</p>
						</div>
					</div>
					<div class="img-listing">
						<div class="img-title">
							<h3>My Current Look</h3>
						</div>

						<a 
							v-for="current_look_photo in posted_request.current_look_photos"
							:href="current_look_photo" 
							class="img-holder">
							<img 
								:src="current_look_photo.path" 
								:alt="current_look_photo.path">
						</a>


					</div>
					<div class="img-listing">
						<div class="img-title">
							<h3>My Desired Look</h3>
						</div>

						<a 
							v-for="current_look_photo in posted_request.desired_look_photos"
							:href="current_look_photo" 
							class="img-holder">
							<img 
								:src="current_look_photo.path" 
								:alt="current_look_photo.path">
						</a>
					</div>
				</div>
				<div 
					class="btn-holder"
					v-if="posted_request!=null">
					<a 
						href="#" 
						class="btn btn-blue"
						@click.prevent="applyForThisService(userId, posted_request.id)"
						v-if="!proHasApplied"
					>
						APPLY FOR THIS JOB
					</a>
					<a
						class="btn btn-blue"
						@click.prevent="cancelApplication(posted_request_application)"
						v-if="proHasApplied"
						>
						CANCEL APPLICATION	
					</a>
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
				userId: userId,
				is_loading: true,
				posted_request: null,
				posted_request_application: null,
				proApplied: false
			}
		},

		mounted() {
			$('#main-wrapper').addClass('client-req');

			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			$('.pro-bg.cprs').show();
		},

		destroyed() {
			$('#main-wrapper').removeClass('client-req');
			this.$parent.sidebar.show = true;
			this.$parent.in_user_dashboard = true;
			$('.pro-bg.cprs').hide();
		},
		
		created() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			$('.pro-bg.cprs').show();

			this.fetchData();
		},

		computed: {
			proHasApplied() {
				return this.posted_request_application != null;
			}
		},

		watch: {
			'$route': 'fetchData'
		},

		methods: {
			_fetchPostedRequest() {
				return axios
						.get(
							apiBaseUrl + 'rest/posted-requests/' + this.$route.params.id
						);
			},
			_fetchProApplication() {
				return axios
						.get(
							apiBaseUrl + 'rest/professionals/'+this.userId +'/client/posted-requests/'+this.$route.params.id+'/applications'
						);
			},

			fetchData() {
				var vm = this;
					axios
						.all([
							this._fetchPostedRequest(),
							this._fetchProApplication(),
						])
						.then(axios.spread(function(posted_request, posted_request_application){
							vm.posted_request = posted_request.data;
							vm.posted_request_application = posted_request_application.data.application;
							vm.is_loading = false;
						})).catch(function(){
							vm.is_loading = false;
						});
			},

			applyForThisService(professional_id, posted_request_id) {
				var vm = this;
					axios
						.post(
							apiBaseUrl + 'rest/professionals/'+professional_id+'/client/posted-requests/applications',
							{
								application: {
									professional_id: professional_id,
									posted_request_id: posted_request_id,
									proposal: 'POSTED REQUEST APPLICATION FROM USER:' + professional_id,
									application_status: '0',
									status: '0'
								}
							}
						)
						.then(function(response) {
							if(response.data.success){
								vm.posted_request_application = response.data.application;
								vm.$toastr('success', 'You have successfully applied for this job, we will notify you if you are accepted. We\'ll keep you in the loop.', 'Job Application');
							}
						}, function(error) {
							vm.$toastr('success', 'Something went wrong. Please try again later.', 'Job Application');
						});
			},
			
			cancelApplication(application) {
				if(application==null){
					alert('Unable to cancel right now. Please try again later.');
					vm.$toastr('error', 'Unable to cancel right now. Please try again later.', 'Job Application Cancellation');
					return false;
				}
				var conf = confirm('Are you sure you want to do this ?');
					if(!conf) return false;

				var vm = this;
					axios
						.delete(
							apiBaseUrl + 'rest/professionals/'+application.professional_id+'/client/posted-requests/applications/' + application.id
						)
						.then(function(response) {
							if(response.data.success){
								vm.posted_request_application = null;
								vm.$toastr('success', 'Application successfully cancelled', 'Job Application Cancellation');
							}
						}, function(error) {
							vm.$toastr('error', 'Something went wrong. Please try again later.', 'Job Application Cancellation');
						});
			}
		}
	}
</script>