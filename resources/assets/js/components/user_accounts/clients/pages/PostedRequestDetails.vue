<template>
	<div class="content-container app-client-req-details req-release">
		<div class="inner-title">
			<h3>My Posted Requests Details</h3>
		</div>
		<div class="request-details">
			<Loader
				v-if="posted_request.is_loading"
			>	
			</Loader>
			<div
				v-if="posted_request.item && !posted_request.is_loading"
			>
				<div class="clearfix title-details">
					<div class="f-left" style="max-width: 75%;">
						<p><span>User Types </span>{{ posted_request.item.professional_types_csv }}</p>
						<h3>{{ posted_request.item.title }} </h3>
						<label for=""><span>Posted</span> <!-- Today10/26/2017 -->{{posted_request.item.created_at }}</label>
					</div>
					<div class="f-right">
						<p>Budget</p>
						<h5>$ {{ posted_request.item.budget }}</h5>
					</div>
				</div>
				<div class="content">
					<p>{{ posted_request.item.message }} </p>
					<label for=""><i class="fa fa-calendar" aria-hidden="true"></i> <!-- 10/26/2017 -->{{ posted_request.item.desired_date }}</label>
					<label for="">
						<i class="fa fa-clock-o" aria-hidden="true"></i>  
						{{ posted_request.item.desired_time }}   -   
						<i class="fa fa-clock-o" aria-hidden="true"></i>  
						{{ posted_request.item.desired_time }}       
					</label>
					<label for=""><i class="fa fa-map-marker" aria-hidden="true"></i>  <!-- Complete address goes here, Los Angeles, CA --> {{ posted_request.item.full_address }}</label>
				</div>
				
				<div v-if="!postedRequestHasHiredPro">
					<div class="cancellation">
						<p>See <a href="/terms-and-conditions" target="_blank">Cancellation</a> and <a href="/terms-and-conditions" target="_blank">Refund Policy</a>.</p>
					</div>
					<div class="btn-holder write-review">
						<a 
							href="#" 
							class="btn btn-red-b" 
							@click.prevent="cancelService(posted_request.item)"
							v-if="!postedRequestCancelled"
							>
								CANCEL SERVICE
						</a>
						<a 
							href="#" 
							class="btn btn-red-b" 
							@click.prevent=""
							v-if="postedRequestCancelled"
							>
								SERVICE CANCELLED
						</a>
					</div>
				</div>
			</div>
			<div class="pro-details owner-pro-details">
				<div class="status" v-if="!postedRequestHasHiredPro">
					<span>{{ posted_request_applications.total }}</span>
					<label for=""> Professionals Applied</label>
					<hr class="f-right">
				</div>

				<div class="status" v-if="postedRequestHasHiredPro">
					<i class="fa fa-check" aria-hidden="true"></i>
					<label for="">Hired</label>
					<hr class="f-right">
				</div>
				
				<Loader
					v-if="posted_request_applications.is_loading"
				>	
				</Loader>

				<div 
					class="pro-holder" 
					v-if="!posted_request_applications.is_loading"
					v-for="application in postedRequestApplications(posted_request.item)"
				>
					<div class="img-holder">
						<div class="img-over">
							<img 
								:src="application.professional.profile_pic" 
								:alt="application.professional.profile_pic"
							>
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
						<h3>{{application.professional.full_name}}</h3>
						<p>{{application.professional.pro_profile.full_address}}</p>
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
							v-if="!postedRequestCancelled"
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
							<p 
								class="f-right pending"
								v-if="!postedRequestCompleted"
							>
								Pending
							</p>
							<p 
								class="f-right"
								v-if="postedRequestCompleted"
							>
								<span>Released</span>
							</p>
						</li>
					</ul>
					<p class="total">Total: $ {{ posted_request.item.budget }}</p>
				</div>
			</div>

			<div 
				v-if="postedRequestCompleted"
			>
				<h3 class="full-width t-center" style="color:#347024;">POSTED REQUEST COMPLETED</h3>
				<div class="btn-holder write-review">
					<router-link 
						:to="{name:'client.write-a-review', params: { record_type: 'client_posted_requests', record_id: posted_request.item.id } }"
						class="btn btn-red-b">	
						WRITE REVIEW
					</router-link>
				</div>
			</div>
	
			<div 
				v-if="postedRequestHasHiredPro && !postedRequestCompleted"
			>
				<div class="cancellation">
					<p>
						See 
						<a 
							href="/terms-and-conditions" 
							target="_blank"
						>
							Cancellation
						</a> 
							and 
						<a 
							href="/terms-and-conditions" 
							target="_blank"
						>
							Refund Policy
						</a>.
					</p>
				</div>
				<div class="btn-holder write-review" >
					<a 
						href="#" 
						class="btn btn-red-b" 
						@click.prevent="cancelService(posted_request.item)"
						v-if="!postedRequestCancelled"
						>
							CANCEL SERVICE
					</a>
					<a 
						href="#" 
						class="btn btn-red-b" 
						@click.prevent=""
						v-if="postedRequestCancelled"
						>
							SERVICE CANCELLED
					</a>
					<!-- <a href="#" @click.prevent="cancelService(posted_request.item)" class="btn btn-red-b">CANCEL SERVICE</a> -->
					<a href="#" @click.prevent="releaseFund(posted_request.item)" class="btn btn-red-b">RELEASE FUND</a>
				</div>
			</div>
			<br><br><br>
			<div 
				class="pagination-holder clearfix"
				v-if="!postedRequestHasHiredPro"
			>
				<div class="pagination">
					<pagination 
						:records="posted_request_applications.total"
						:perPage="posted_request_applications.per_page"
						:countText="posted_request_applications.countText"
						@paginate="paginateApplications">
					</pagination>
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
				posted_request: {
					is_loading: true,
					item: null,
				},
				posted_request_applications: {
					is_loading: true,
					items: [],
					total: 0,
					per_page: settings.pagination.per_page,
					countText: 'Showing {from} to {to} of {count} My Posted Requests',
				}
			}
		},

		computed: {

			postedRequestCancelled() {
				return this.posted_request.item.status == 2;
			},

			postedRequestCompleted() {
				return this.posted_request.item.status == 3;
			},

			postedRequestHasHiredPro() {
				return this.posted_request.item.hired_application > 0;
			},

			postedRequestBudgetBreakDown() {
				var budget = this.posted_request.item.budget;
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

		components: {
			Pagination
		},

		methods: {

			_getPostedRequestDetails() {
					return axios
							.get(
								apiBaseUrl + 
								'rest/users/' +
								userId +
								'/posted-requests/' + 
								this.$route.params.id 
							);
			},

			_getPostedRequestApplications(page) {
				return axios
						.get(
							apiBaseUrl + 
							'rest/users/' +
							userId +
							'/posted-requests/' + 
							this.$route.params.id +
							'/applications',
							{
								params: {
									page: page
								}
							}
						);
			},

			paginateApplications(page) {
				const vm = this;
				vm.posted_request_applications.is_loading = true;
				this
					._getPostedRequestApplications(page)
					.then((response)=>{
						vm.posted_request_applications = {
							is_loading: false,
							items: response.data.data,
							total: response.data.total,
						};
					},(error)=>{
						vm.$toastr('error', 'Something went wrong. Please try again later.', 'Posted Request Details & Applications');
						vm.posted_request_applications = {
							is_loading: false,
						};
					});
			},

			fetchPostedRequestDetails() {

				var vm = this;

				var requests = [vm._getPostedRequestDetails(), vm._getPostedRequestApplications(1)];
					axios
						.all(requests)
						.then(axios.spread((details, applications)=>{
							vm.posted_request = {
								is_loading: false,
								item: details.data,
							};
							vm.posted_request_applications = {
								is_loading: false,
								items: applications.data.data,
								total: applications.data.total,
							};
						}),(error)=>{
							vm.$toastr('error', 'Something went wrong. Please try again later.', 'Posted Request Details & Applications');
							vm.posted_request = {
								is_loading: false,
							};
							vm.posted_request_applications = {
								is_loading: false,
							};
						});
			},

			_putPostedRequestDetails(vm, data) {
				return axios
						.put(
							apiBaseUrl + 
							'rest/users/' +
							userId +
							'/posted-requests/' +
							vm.posted_request.item.id,
							data
						);
			},

			_putHiredApplication(vm, application, data) {
				return axios
						.put(
							apiBaseUrl + 
							'rest/users/' +
							userId +
							'/posted-requests/' +
							vm.posted_request.item.id +
							'/applications/' +
							application.id,
							data
						);
			},

			hireProApplication(application, posted_request) {

				if(application.application_status == '1'){
					return false;
				}

				var vm = this;

				var requests = [
						vm._putPostedRequestDetails(vm, {hired_application: application.id}), 
						vm._putHiredApplication(vm, application, {application_status: '1'})
					];
					axios
						.all(requests)
						.then(axios.spread(function (details, applications) {
							if(details.data.success){
								posted_request.item.hired_application = application.id;
							}

							if(applications.data.success){
								application.application_status = '1';
							}
						}),(error)=>{
							vm.$toastr('error', 'Something went wrong. Please try again later.', 'Posted Request Details & Applications');
						});
			},

			postedRequestApplications(posted_request) {
				if(!this.postedRequestHasHiredPro){
					return this.posted_request_applications.items;
				}

				return this.posted_request_applications.items.filter(function(application) {
					return application.id == posted_request.hired_application;
				});
			},

			cancelService(posted_request) {
				const vm = this;
				const conf = confirm('Are you sure you want to do this ?');
				if(!conf){
					return false;
				}
				vm._putPostedRequestDetails(vm, {
					status: '2'
				}).then((response)=>{
					posted_request.status = 2;
					vm.$toastr('success', 'Service cancelled.', 'Service Cancellation');
				},(error)=>{
					vm.$toastr('error', 'Something went wrong. Please try again later.', 'Posted Request Details & Applications');
				});
			},

			releaseFund(posted_request) {
				const vm = this;
				const conf = confirm('Are you sure you want to do this ?');
				if(!conf){
					return false;
				}
				posted_request.status = 3;
				// vm._putPostedRequestDetails(vm, {
				// 	status: '3'
				// }).then((response)=>{
				// 	posted_request.status = 3;
				// 	vm.$toastr('success', 'Fund successfully release.', 'Fund Release');
				// },(error)=>{
				// 	vm.$toastr('error', 'Something went wrong. Please try again later.', 'Posted Request Details & Applications');
				// });
			}
		}
	}
</script>