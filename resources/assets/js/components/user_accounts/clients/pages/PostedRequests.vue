<template>
	<div class="content-container app-client-req-details app-req-listing">
		<div class="inner-title">
			<h3>My Posted Requests</h3>
		</div>
		<div class="request-details">
			<Loader
				v-if="is_loading"
			>	
			</Loader>
			<ul v-if="!is_loading">
				<li v-for="posted_request in posted_requests.items">
					<div class="clearfix title-details">
						<div class="f-left">
							<p><span>User Types </span>{{ posted_request.professional_types_csv }}</p>
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
					</div>
					<div class="content-listing">
						<div class="info">
							<p><i class="fa fa-calendar" aria-hidden="true"></i> <!-- 10/26/2017 -->{{ posted_request.desired_date }}</p>
							<p><i class="fa fa-clock-o" aria-hidden="true"></i>  <!-- 11:15 pm --> {{ posted_request.desired_time }}</p>
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  <!-- Complete address goes here, Los Angeles, CA --> {{ posted_request.full_address }}</p>
						</div>
						<div class="pro-applied">
							<label for="">{{ posted_request.professionals_applied_count }}</label>
							<p> Professionals Applied</p>
						</div>
						<div class="btn-holder">
							<router-link v-bind:to="'/posted-requests/' + posted_request.id" class="btn btn-blue">	
								SEE DETAILS
							</router-link>
						</div>
					</div>
				</li>
				<li style="text-align: center;" v-if="!is_loading && no_posted_requests">No requests.</li>
			</ul>
			<div class="pagination-holder clearfix">
				<div class="pagination">
					<pagination 
						:records="posted_requests.total"
						:perPage="posted_requests.per_page"
						:countText="posted_requests.countText"
						@paginate="fetchData">
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
				is_loading: true,
				posted_requests: {
					items: [],
					total: 0,
					per_page: settings.pagination.per_page,
					countText: 'Showing {from} to {to} of {count} My Posted Requests',
				},
				no_posted_requests: false
			}
		},

		created() {
			this.fetchData(1);
		},

		watch: {
			'$route': 'fetchData'
		},

		components: {
			Pagination
		},

		methods: {
			fetchData(page) {
				var vm = this;
					vm.is_loading = true;
					axios
						// .get(apiBaseUrl + 'rest/posted-requests', {
						.get(apiBaseUrl + 'rest/users/'+userId+'/posted-requests', {
							params: {
								page: page
							}
						})
						.then((response)=>{
							vm.posted_requests.items = response.data.data;
							vm.posted_requests.total = response.data.total;
							vm.is_loading = false;
							vm.no_posted_requests = vm.posted_requests.items.length == 0;
						},(error)=>{
							vm.$toastr('error', 'Something went wrong. Please try again later.', 'Posted Requests List');
							vm.is_loading = false;
						});
			}
		},
	}
</script>