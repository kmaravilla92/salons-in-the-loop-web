<template>
	<div class="content-container app-client-req-details help-req req-release">
		<div class="inner-title">
			<h3>My Help Request Details</h3>
		</div>

		<div class="request-details">
			<Loader
				v-if="posted_help_request.is_loading"
			>	
			</Loader>
			<div v-if="!posted_help_request.is_loading">
				<div class="clearfix title-details">
					<div class="f-left">
						<p><span>User Types </span>{{posted_help_request.item.category_csv}}</p>
						<h3>{{posted_help_request.item.title}} </h3>
						<label for=""><span>Posted</span> Today {{posted_help_request.item.created_at}}</label>
					</div>
					<div class="f-right">
						<p>Rate Amount</p>
						<h5>$ {{posted_help_request.item.weekly_total}}</h5>
					</div>
				</div>
				<div class="content">
					<p>{{posted_help_request.item.description}} </p>
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
								<p> <i class="fa fa-clock-o" aria-hidden="true"></i>  {{posted_help_request.item.end_time}}</p>
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

				<div v-if="!postedRequestHasHiredPro">
					<div class="cancellation">
						<p>See <a href="/terms-and-conditions" target="_blank">Cancellation</a> and <a href="terms-and-conditions" target="_blank">Refund Policy</a>.</p>
					</div>
					<div class="btn-holder write-review">
						<a href="#" class="btn btn-red-b" @click.prevent="cancelService">CANCEL SERVICE</a>
					</div>
				</div>

			</div>
			<div class="pro-details owner-pro-details">
				<div class="status" v-if="!postedRequestHasHiredPro">
					<span>{{posted_help_request.item.professionals_applied_count}}</span>
					<label for=""> Professionals Applied</label>
					<hr class="f-right">
				</div>

				<div class="status" v-if="postedRequestHasHiredPro">
					<i class="fa fa-check" aria-hidden="true"></i>
					<label for="">Hired</label>
					<hr class="f-right">
				</div>

				<Loader
					v-if="posted_help_request_applications.is_loading"
					text="LOADING POSTED HELP REQUEST APPLICATIONS ..."
				>	
				</Loader>
				<div class="pro-holder" v-for="posted_help_request_application in postedHelpRequestApplications(posted_help_request.item)">
					<div class="img-holder">
						<div class="img-over">
							<img src="/frontsite/images/pro1.jpg" alt="">
						</div>
						<a 
							:href="'/profile-view/'+posted_help_request_application.professional_id+'/professional'" 
							class="btn btn-red-b"
							target="_blank"
						>
								See Profile
						</a>
					</div>
					<div class="information help-req-owner">
						<h3>{{posted_help_request_application.professional.full_name}}</h3>
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
							@click.prevent="hireProApplication(posted_help_request.item, posted_help_request_application)"
							v-if="posted_help_request_application.application_status != '1'"
							>
							Hire this pro
						</a>
					</div>
					<div class="description">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit .esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat </p>
					</div>
				</div>

				<p
					v-if="!postedHelpRequestApplications(posted_help_request.item).length"
					>
					No applications available
				</p>

				<div class="payment" v-if="postedRequestHasHiredPro">
					<ul>
						<li class="clearfix">
							<p class="f-left">Amount</p>
							<p class="f-right">Status</p>
						</li>
						<li class="clearfix">
							<p class="f-left">$ {{ postedRequestBudgetBreakDown.initial }}</p>
							<p class="f-right"><span>Released</span></p>
						</li>
						<li class="clearfix">
							<p class="f-left">$ {{ postedRequestBudgetBreakDown.remaining }}</p>
							<p 
								class="f-right pending"
								v-if="!posted_help_request.item.payment_released">
								Pending		
							</p>
							<p 
								class="f-right"
								v-if="posted_help_request.item.payment_released">
								<span>Released</span>		
							</p>
						</li>
					</ul>
					<p class="total">Total: $ {{ posted_help_request.item.weekly_total }}</p>
				</div>
			</div>

			<div v-if="postedRequestHasHiredPro">
				<div 
					class="cancellation" 
					v-if="!postedRequestCompleted"
				>
					<p>
						See 
						<a 
							href="#" 
							@click.prevent=""
						>
							Cancellation
						</a> 
							and 
						<a 
							href="#" 
							@click.prevent=""
						>
							Refund Policy
						</a>.
					</p>
				</div>
				<div class="btn-holder write-review">
					<a 
						href="#" 
						@click.prevent="cancelService" 
						class="btn btn-red-b"
						v-if="!postedRequestCompleted">
						CANCEL SERVICE		
					</a>
					<a 
						href="#" 
						@click.prevent="releaseFund(posted_help_request.item)" 
						class="btn btn-red-b"
						v-if="!postedRequestCompleted">
						RELEASE FUND
					</a>
					<a 
						href="#" 
						@click.prevent="" 
						class="btn btn-red-b" 
						v-if="postedRequestCompleted">
						WRITE REVIEW
					</a>
				</div>
			</div>

			<br><br><br>
			<!-- <div class="pagination-holder clearfix" v-if="posted_help_request_applications.items.length > 10">
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
			</div> -->
		</div>
	</div>
</template>

<script>
	import axios from 'axios';

	export default {
		data() {
			return {
				posted_help_request: {
					is_loading: true,
					item: null
				},
				posted_help_request_applications: {
					is_loading: true,
					items: []
				}
			}
		},

		computed: {

			postedRequestHasHiredPro() {
				return this.posted_help_request.item.hired_application > 0;
			},

			postedRequestCompleted() {
				return this.posted_help_request.item.payment_released;
			},

			postedRequestBudgetBreakDown() {
				var budget = this.posted_help_request.item.weekly_total;
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

			_fetchPostedHelpRequest() {
				return axios
						.get(
							apiBaseUrl + 'rest/owners/' + userId + '/help-requests/' + this.$route.params.id,
							{
								params: {
									recent_only: true
								}
							}
						);
			},

			_fetchPostedHelpRequestApplications() {
				return axios
						.get(
							apiBaseUrl + 'rest/owners/' + userId + '/help-requests/' + this.$route.params.id +'/applications',
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
					this._fetchPostedHelpRequest(),
					this._fetchPostedHelpRequestApplications()
				])
				.then(axios.spread(function(posted_help_request, posted_help_request_applications) {
					vm.posted_help_request = {
						is_loading: false,
						item: posted_help_request.data
					};
					vm.posted_help_request_applications = {
						is_loading: false,
						items: posted_help_request_applications.data
					};
				}))
				.catch(function(error){
					alert('Something went wrong. Please refresh your browser.');
					vm.posted_help_request.is_loading = false;
					vm.posted_help_request_applications.is_loading = false;
				});
			},

			_updatePostedHelpRequest(posted_help_request){
				return axios
						.put(
							apiBaseUrl + 'rest/owners/' + userId + '/help-requests/' + posted_help_request.id,
							{
								hired_application: posted_help_request.hired_application
							}
						)
			},

			_updateApplication(application) {
				return axios
						.put(
							apiBaseUrl + 'rest/owners/' + userId + '/help-requests/' + this.$route.params.id +'/applications/' + application.id,
							{
								application_status: '1'
							}
						)
			},

			hireProApplication(posted_help_request, application) {

				if(application.application_status == '1'){
					return false;
				}

				var vm = this;
					axios.all([
						this._updatePostedHelpRequest({
							id: posted_help_request.id,
							hired_application: application.id
						}),
						this._updateApplication(application)
					])
					.then(axios.spread(function(update_posted_help_request, update_application) {
						if(update_posted_help_request.data.success){
							posted_help_request.hired_application = application.id;
						}

						if(update_application.data.success){
							application.application_status = '1';
						}
					}))
					.catch(function(error){
						alert('Something went wrong. Please refresh your browser.' + error);
					});
			},

			postedHelpRequestApplications(posted_help_request) {
				if(!this.postedRequestHasHiredPro){
					return this.posted_help_request_applications.items;
				}

				return this.posted_help_request_applications.items.filter(function(application) {
					return application.id == posted_help_request.hired_application;
				});
			},

			releaseFund(posted_help_request){
				posted_help_request.payment_released = true;
				console.log(posted_help_request)
			},

			cancelService(){
				alert('Successfully cancelled.');
			}
		}
	}
</script>