<template>
	<div class="content-container">
		<div class="menu-content">
			<div class="inner-title">
				<h3>What Would you like to do?</h3>
			</div>
			<ul>
				<li>
					<router-link :to="{ name: 'professional.clients-posted-requests-search' }">
						<div class="img-holder">
							<img src="/frontsite/images/search-ico.png" alt="">
						</div>
						<p class="ease">Search <br> Client’s Request</p>
					</router-link>
				</li>
				<li>
					<router-link :to="{ name: 'professional.owner.help-requests.search' }">
						<div class="img-holder">
							<img src="/frontsite/images/search-ico.png" alt="">
						</div>
						<p class="ease">Search <br> Help Request</p>
					</router-link>
				</li>
				<li>
					<router-link :to="{ name: 'professional.owner.posted-rentals.search' }">
						<div class="img-holder">
							<img src="/frontsite/images/search-ico.png" alt="">
						</div>
						<p class="ease">Search <br> For Rentals</p>
					</router-link>
				</li>

				<li>
					<router-link :to="{ name: 'professional.owner.booked-rentals' }">
						<div class="img-holder">
							<img src="/frontsite/images/rental-ico.png" alt="">
						</div>
						<br>
						<p class="ease">My Rentals</p>
					</router-link>
				</li>
				<li>
					<a href="#">
						<div class="noti-count ease">
							<p>16</p>
						</div>
						<div class="img-holder">
							<img src="/frontsite/images/appointment-ico.png" alt="">
						</div>
						<p class="ease">Client <br> Appointments</p>
					</a>
				</li>
			</ul>
		</div>
		
		<div class="clearfix">
			<div class="width-70 f-left listing-left">
				<div class="inner-title">
					<h3>Recent Client Request Applied 
						<router-link 
							:to="{ name: 'professional.client.posted-requests.applied' }"
							:class="{ 'f-right': true }"
							>						
							SEE ALL
						</router-link>
					</h3>
				</div>
				<Loader
					v-if="applied_client_request.is_loading"
				>
				</Loader>
				<ul class="db-listing" v-if="!applied_client_request.is_loading">
					<li
						v-for="applied_client_request_item in applied_client_request.items"
					>
						<div class="img-holder">
							<img 
								:src="applied_client_request_item.posted_request.client.profile_pic" 
								:alt="applied_client_request_item.posted_request.client.profile_pic"
							>
						</div>
						<div class="content-holder">
							<router-link 
							:to="{ name: 'professional.clients-posted-requests.applied.details', params: { id: applied_client_request_item.posted_request.id } }"
							>
								{{applied_client_request_item.posted_request.title}}
							</router-link>
							<p><span>Category:</span> {{applied_client_request_item.posted_request.professional_types_csv}}</p>
							<p><span>Date:</span> {{applied_client_request_item.posted_request.created_at}}</p>
							<p>${{applied_client_request_item.posted_request.budget}}</p>
						</div>
						<div class="btn-holder">
							<router-link 
							:to="{ name: 'professional.clients-posted-requests.applied.details', params: { id: applied_client_request_item.posted_request.id } }"
							class="btn btn-blue-b btn-slim"
							>						
								See details
							</router-link>
						</div>
					</li>
				</ul>
				<div class="inner-title">
					<h3>
						Recent Salon Jobs Applied
						<router-link 
							:to="{ name: 'professional.owner.help-requests.applied' }"
							:class="{ 'f-right': true }"
							>						
							SEE ALL
						</router-link>
					</h3>
				</div>
				<Loader
					v-if="applied_owner_help_request.is_loading"
				>
				</Loader>
				<ul class="db-listing recent-jobs" v-if="!applied_owner_help_request.is_loading">
					<li
						v-for="applied_owner_help_request_item in applied_owner_help_request.items"
					>
						<div class="img-holder">
							<img 
								:src="applied_owner_help_request_item.posted_help_request.owner.profile_pic" 
								:alt="applied_owner_help_request_item.posted_help_request.owner.profile_pic"
							>
						</div>
						<div class="content-holder">
							<router-link 
							:to="{ name: 'professional.clients-posted-requests.applied.details', params: { id: applied_owner_help_request_item.posted_help_request.id } }"
							>
								{{applied_owner_help_request_item.posted_help_request.title}}
							</router-link>
							<p><span>Category:</span> {{applied_owner_help_request_item.posted_help_request.professional_types_csv}}</p>
							<p><span>Date:</span> {{applied_owner_help_request_item.posted_help_request.created_at}}</p>
							<p>${{applied_owner_help_request_item.posted_help_request.weekly_total}}</p>
						</div>
						<div class="btn-holder">
							<router-link 
							:to="{ name: 'professional.owner.help-requests.applied.details', params: { id: applied_owner_help_request_item.posted_help_request.id } }"
							class="btn btn-blue-b btn-slim"
							>						
								See details
							</router-link>
						</div>
					</li>
				</ul>
			</div>
			<div class="width-30 f-right listing-right">
				<div class="inner-title">
					<h3>Pending Jobs</h3>
				</div>
				<ul class="pending-job">
					<li>
						<div class="img-holder">
							<img src="/frontsite/images/client1.jpg" alt="">
						</div>
						<div class="content-holder">
							<a href="#">Service title goes right here, dolor sit elit ut  Ipsum</a>
							<p>Client: <a href="#">Alexa Snowe</a></p>
							<p>LA 10/2/2016</p>
						</div>
					</li>
					<li>
						<div class="img-holder">
							<img src="/frontsite/images/client1.jpg" alt="">
						</div>
						<div class="content-holder">
							<a href="#">Service title goes right here, dolor sit elit ut  Ipsum</a>
							<p>Client: <a href="#">Alexa Snowe</a></p>
							<p>LA 10/2/2016</p>
						</div>
					</li>
					<li>
						<div class="img-holder">
							<img src="/frontsite/images/client1.jpg" alt="">
						</div>
						<div class="content-holder">
							<a href="#">Service title goes right here, dolor sit elit ut  Ipsum</a>
							<p>Client: <a href="#">Alexa Snowe</a></p>
							<p>LA 10/2/2016</p>
						</div>
					</li>
					<li>
						<div class="img-holder">
							<img src="/frontsite/images/client1.jpg" alt="">
						</div>
						<div class="content-holder">
							<a href="#">Service title goes right here, dolor sit elit ut  Ipsum</a>
							<p>Client: <a href="#">Alexa Snowe</a></p>
							<p>LA 10/2/2016</p>
						</div>
					</li>
				</ul>
				<a href="#" class="pending-link">SEE ALL</a>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				user_id: userId,
				applied_client_request: {
					items: [],
					is_loading: true
				},
				applied_owner_help_request: {
					items: [],
					is_loading: true
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
			_fetchAppliedClientRequests() {
				return axios
			          .get(
			            apiBaseUrl + 'rest/professionals/'+this.user_id+'/client/posted-requests/applications',
			            {
			            	params: {
			            		recent_only: true
			            	}
			            }
			          )
			},

			_fetchAppliedOwnerHelpRequests() {
				return axios
			          .get(
			            apiBaseUrl + 'rest/professionals/'+this.user_id+'/owner/posted-help-requests/applications',
			            {
			            	params: {
			            		recent_only: true
			            	}
			            }
			          )
			},

			fetchData() {
				var vm = this;
					axios
						.all([
							this._fetchAppliedClientRequests(),
							this._fetchAppliedOwnerHelpRequests(),
						])
						.then(axios.spread(function(applied_client_request, applied_owner_help_request){
							vm.applied_client_request = {
								items: applied_client_request.data.data,
								is_loading: false
							};

							vm.applied_owner_help_request = {
								items: applied_owner_help_request.data.data,
								is_loading: false
							};
						})).catch(function(error){
							console.log('error', error);
            				vm.$toastr('error', 'Something went wrong. Please try again later.', 'Dashboard Listing');
            				vm.applied_client_request.is_loading = false;
            				vm.applied_owner_help_request.is_loading = false;
						});
			},
		}
	}
</script>