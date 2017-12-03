<template>
	<div class="content-container app-client-req-details req-release">
		<div class="inner-title">
			<h3>My Posted Requests Details</h3>
		</div>
		<Loader
			v-if="is_loading"
			text="LOADING POSTED REQUESTS ..."
		>	
		</Loader>
		<div class="request-details" v-if="!is_loading">
			<div class="clearfix title-details">
				<div class="f-left" style="max-width: 75%;">
					<p><span>User Types </span>{{ posted_request.professional_types }}</p>
					<h3>{{ posted_request.title }} </h3>
					<label for=""><span>Posted</span> <!-- Today10/26/2017 -->{{posted_request.created_at }}</label>
				</div>
				<div class="f-right">
					<p>Budget</p>
					<h5>$ {{ posted_request.budget }}</h5>
				</div>
			</div>
			<div class="content">
				<p>{{ posted_request.message }} </p>
				<label for=""><i class="fa fa-calendar" aria-hidden="true"></i> <!-- 10/26/2017 -->{{ posted_request.desired_date }}</label>
				<label for="">
					<i class="fa fa-clock-o" aria-hidden="true"></i>  
					{{ posted_request.desired_time }}   -   
					<i class="fa fa-clock-o" aria-hidden="true"></i>  
					{{ posted_request.desired_time }}       
				</label>
				<label for=""><i class="fa fa-map-marker" aria-hidden="true"></i>  <!-- Complete address goes here, Los Angeles, CA --> {{ posted_request.complete_address }}</label>
			</div>
			
			<div v-if="!postedRequestHasHiredPro">
				<div class="cancellation">
					<p>See <a href="#">Cancellation</a> and <a href="#">Refund Policy</a>.</p>
				</div>
				<div class="btn-holder write-review">
					<a href="#" class="btn btn-red-b">CANCEL SERVICE</a>
				</div>
			</div>

			<div class="pro-details owner-pro-details">
				<div class="status" v-if="!postedRequestHasHiredPro">
					<span>{{ posted_request_applications.length }}</span>
					<label for=""> Professionals Applied</label>
					<hr class="f-right">
				</div>

				<div class="status" v-if="postedRequestHasHiredPro">
					<i class="fa fa-check" aria-hidden="true"></i>
					<label for="">Hired</label>
					<hr class="f-right">
				</div>

				<div 
					class="pro-holder" 
					v-for="application in postedRequestApplications(posted_request)"
				>
					<div class="img-holder">
						<div class="img-over">
							<img src="/frontsite/images/pro1.jpg" alt="">
						</div>
						<a 
							:href="'/profile-view/'+application.professional_id+'/professional'" 
							class="btn btn-red-b"
							target="_blank"
						>
								See Profile
						</a>
					</div>
					<div class="information help-req-owner">
						<h3>{{ application.professional.full_name }}</h3>
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
							@click.prevent="hireProApplication(application, posted_request)"
						>
							{{  application.application_status == '1' ? 'Hired' : 'Hire this pro' }}
						</a>
					</div>
					<div class="description">
						<p>{{ application.proposal }} </p>
					</div>
				</div>
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
							<p class="f-right pending">Pending</p>
						</li>
					</ul>
					<p class="total">Total: $ {{ posted_request.budget }}</p>
				</div>
			</div>
	
			<div v-if="postedRequestHasHiredPro">
				<div class="cancellation">
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
					<a href="#" @click.prevent="" class="btn btn-red-b">CANCEL SERVICE</a>
					<a href="#" @click.prevent="" class="btn btn-red-b">RELEASE FUND</a>
				</div>
			</div>

			<br><br><br>
			<div class="pagination-holder clearfix" v-if="posted_request_applications.length > 10">
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
</template>

<script>
	import axios from 'axios';
	export default {
		data() {
			return {
				is_loading: true,
				posted_request: [],
				posted_request_applications: []
			}
		},

		computed: {

			postedRequestHasHiredPro() {
				return this.posted_request.hired_application > 0;
			},

			postedRequestBudgetBreakDown() {
				var budget = this.posted_request.budget;
				return {
					initial: parseFloat(budget * .10).toFixed(2),
					remaining: parseFloat(budget * .90).toFixed(2)
				}
			}
		},

		created() {
			this.fetchPostedRequestDetails();
		},

		watch: {
			'$route': 'fetchPostedRequestDetails'
		},

		methods: {

			fetchPostedRequestDetails() {

				var vm = this;

				function getPostedRequestDetails(vm) {
					return axios
							.get(
								apiBaseUrl + 
								'rest/users/' +
								userId +
								'/posted-requests/' + 
								vm.$route.params.id 
							);
				}

				function getPostedRequestApplications(vm) {
					return axios
							.get(
								apiBaseUrl + 
								'rest/users/' +
								userId +
								'/posted-requests/' + 
								vm.$route.params.id +
								'/applications'
							);
				}

				
				var requests = [getPostedRequestDetails(vm), getPostedRequestApplications(vm)];
					axios
						.all(requests)
						.then(axios.spread(function (details, applications) {
							vm.posted_request = details.data;
							vm.posted_request_applications = applications.data;
							vm.is_loading = false;
						}));
			},

			hireProApplication(application, posted_request) {

				if(application.application_status == '1'){
					return false;
				}

				var vm = this;

				function putPostedRequestDetails(vm, data) {
					return axios
							.put(
								apiBaseUrl + 
								'rest/users/' +
								userId +
								'/posted-requests/' +
								application.posted_request_id,
								data
							);
				}

				function putHiredApplication(vm, data) {
					return axios
							.put(
								apiBaseUrl + 
								'rest/users/' +
								userId +
								'/posted-requests/' +
								application.posted_request_id +
								'/applications/' +
								application.id,
								data
							);
				}

				var requests = [
						putPostedRequestDetails(vm, {hired_application: application.id}), 
						putHiredApplication(vm, {application_status: '1'})
					];
					axios
						.all(requests)
						.then(axios.spread(function (details, applications) {
							console.log(details, application);
							if(details.data.success){
								posted_request.hired_application = application.id;
							}

							if(applications.data.success){
								application.application_status = '1';
							}
						}));
			},

			postedRequestApplications(posted_request) {
				if(!this.postedRequestHasHiredPro){
					return this.posted_request_applications;
				}

				return this.posted_request_applications.filter(function(application) {
					return application.id == posted_request.hired_application;
				});
			}
		}
	}
</script>