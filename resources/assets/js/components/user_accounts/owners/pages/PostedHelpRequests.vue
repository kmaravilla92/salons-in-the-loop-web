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
							<p><span>Professional Types </span>{{posted_help_request.category}}</p>
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
			<div class="pagination-holder clearfix" v-if="posted_help_requests.items.length > 10">
				<div class="f-left">
					<p>Showing 8 out of 8 of My Posted Help Request</p>
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
				posted_help_requests: {
					is_loading: true,
					items: []
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

		methods: {

			_fetchPostedHelpRequests() {
				return axios
						.get(
							apiBaseUrl + 'rest/owners/' + userId + '/help-requests'
						);
			},

			fetchData() {
				var vm = this;
				axios.all([
					this._fetchPostedHelpRequests()
				])
				.then(axios.spread(function(posted_help_requests) {
					vm.posted_help_requests = {
						is_loading: false,
						items: posted_help_requests.data
					};
				}))
				.catch(function(error){
					alert('Something went wrong. Please refresh your browser.');
					vm.posted_help_requests.is_loading = false;
				});
			}
		}
	}
</script>