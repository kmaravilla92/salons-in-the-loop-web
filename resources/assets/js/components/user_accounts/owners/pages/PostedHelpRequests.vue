<template>
	<div class="content-container app-client-req-details app-req-listing help-req-listing ownerhelp-req">
		<div class="inner-title">
			<h3>My Posted Help Request
			</h3>

		</div>
		<div class="request-details">
			<Loader
				v-if="posted_help_requests.is_loading"
				text="LOADING RECENT POSTED HELP REQUESTS ..."
			>	
			</Loader>
			<ul>
				<li v-for="posted_help_request in posted_help_requests.items">
					<div class="clearfix title-details">
						<div class="f-left">
							<p><span>Professional Types </span>{{posted_help_request.category_csv}}</p>
							<h3>{{ posted_help_request.title }}</h3>
							<label for=""><span>Posted</span> {{posted_help_request.created_at}}</label>
						</div>
						<div class="f-right">
							<p>Weekly Total</p>
							<h5>$ {{posted_help_request.weekly_total}}</h5>
						</div>
					</div>
					<div class="content">
						<p>{{posted_help_request.description}} </p>
					</div>
					<div class="content-listing">
						<ul class="info">

							<li>
								<h5>Desired Date</h5>
								<p>
									<i class="fa fa-calendar" aria-hidden="true"></i> 
									{{posted_help_request.start_date}}
									<span>-</span> 
									<i class="fa fa-calendar" aria-hidden="true"></i> 
									{{posted_help_request.end_date}}
								</p>
							</li>
							<li>
								<h5>Type / Rates</h5>
								<p> 
									{{posted_help_request.rate_text}}   
									<span>-</span> 
									<!-- Mon   Tue   Wed  Thu   Fri   Sat -->  
									{{posted_help_request.selected_days_text_short}} 
								</p>
							</li>
							<li>
								<h5>Desired Time</h5>
								<p> 
									<i class="fa fa-clock-o" aria-hidden="true"></i> 
									{{posted_help_request.start_time}}
									<span>-</span> 
									<i class="fa fa-clock-o" aria-hidden="true"></i> 
									{{posted_help_request.end_time}}
								</p>
							</li>
							<li>
								<h5>Address</h5>
								<p><i class="fa fa-map-marker" aria-hidden="true"></i>  {{posted_help_request.full_address}}</p>
							</li>
						</ul>
						<div class="btn-holder">
							<div class="pro-applied">
								<label for="">{{posted_help_request.professionals_applied_count}}</label>
								<p>Professionals Applied</p>
							</div>
							<router-link 
								:to="{name:'owner.posted-help-requests.details', params: { id: posted_help_request.id } }"
								class="btn btn-blue">
								SEE DETAILS
							</router-link>
						</div>
					</div>
				</li>
			</ul>
			<div class="pagination-holder clearfix">
				<div class="pagination">
					<pagination 
						:records="posted_help_requests.total"
						:perPage="posted_help_requests.per_page"
						:countText="posted_help_requests.countText"
						@paginate="setPage">
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
				posted_help_requests: {
					is_loading: true,
					items: [],
					current_page: 1,
					total: 0,
					per_page: settings.pagination.per_page,
					countText: 'Showing {from} to {to} of {count} My Posted Help Requests',
				},
			}
		},

		mounted() {

		},

		created() {
			this.fetchData();
		},

		watch: {
			'$route' : 'fetchData'
		},

		components: {
			Pagination
		},

		methods: {

			setPage(page) {
				this.posted_help_requests.current_page = page;
				this.fetchData();
			},

			_fetchPostedHelpRequests() {
				return axios
						.get(
							apiBaseUrl + 'rest/owners/' + userId + '/help-requests', {
								params: {
									page: this.posted_help_requests.current_page
								}
							}
						);
			},

			fetchData() {
				var vm = this;
				axios.all([
					this._fetchPostedHelpRequests()
				])
				.then(axios.spread(function(posted_help_requests) {
					const data = posted_help_requests.data
					vm.posted_help_requests.items = data.data;
					vm.posted_help_requests.total = data.total;
					vm.posted_help_requests.is_loading = false;
				}))
				.catch(function(error){
					vm.$toastr('error', 'Something went wrong. Please try again later.', 'Posted Help Requests List');
					vm.posted_help_requests.is_loading = false;
				});
			}
		}
	}
</script>