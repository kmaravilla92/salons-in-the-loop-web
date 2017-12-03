<template>
	<div class="content-container app-client-req-details app-req-listing">
		<div class="inner-title">
			<h3>My Posted Requests
			</h3>
		</div>
		<div class="request-details">
			<Loader
				v-if="is_loading"
				text="LOADING POSTED REQUESTS ..."
			>	
			</Loader>
			<ul>
				<li v-for="posted_request in posted_requests">
					<div class="clearfix title-details">
						<div class="f-left">
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
					</div>
					<div class="content-listing">
						<div class="info">
							<p><i class="fa fa-calendar" aria-hidden="true"></i> <!-- 10/26/2017 -->{{ posted_request.desired_date }}</p>
							<p><i class="fa fa-clock-o" aria-hidden="true"></i>  <!-- 11:15 pm --> {{ posted_request.desired_time }}</p>
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  <!-- Complete address goes here, Los Angeles, CA --> {{ posted_request.complete_address }}</p>
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
				<div class="f-left">
					<p>Showing {{ posted_requests.length }} out of {{ posted_requests.length }} of My Posted Requests</p>
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
				posted_requests: [],
				no_posted_requests: false
			}
		},
		created() {
			this.fetchData();
		},
		watch: {
			'$route': 'fetchData'
		},
		methods: {
			fetchData() {
				var vm = this;
					axios
						.get(apiBaseUrl + 'rest/users/'+userId+'/posted-requests')
						.then(function(response){
							vm.posted_requests = response.data;
							vm.is_loading = false;
							vm.no_posted_requests = vm.posted_requests.length == 0;
						}).catch(function(){
							vm.is_loading = false;
						});
			}
		},
	}
</script>