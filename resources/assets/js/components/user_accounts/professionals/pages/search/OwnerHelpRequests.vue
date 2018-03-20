<template>
	<section id="main-wrapper" class="inner dashboard dashboard-pro client-req app-client-req-details app-req-listing help-req-listing" style="padding-bottom: 479px;">
		<div class="banner-container clearfix pro-bg banner-search">
			<div class="wrapper">
				<h3 class="f-left">Search Help Request</h3>
				<div class="search-holder f-right form-holder">
					<label for="">User Types For Help Request</label>
					<select class="" v-model="search.filter.professional_type">
						<option value="">Select</option>
						<option v-bind:value="professional_type" v-for="professional_type in professional_types">{{ professional_type }}
						</option>
					</select>
					<button 
						type="button" 
						name="button"
						@click.prevent="fetchPostedHelpRequests"
					>
						<i class="fa fa-search" aria-hidden="true"></i>
					</button>
				</div>
			</div>
		</div>
		<div class="wrapper">
			<div class="content-container app-client-req-details help-req booked-rental search-client-req-details search-listing search-for-rental">
				<div class="inner-title">
					<h3>Search Result(s) Found : <span style="color:#000000;">{{posted_help_requests.total}}</span>
						<div class="sort-holder f-right">
							<a class="sort-link">Sort by  <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
							<ul class="sort">
								<li><a href="#">All</a></li>
								<li><a href="#">Recent Post</a></li>
								<li><a href="#">Recommended</a></li>
								<li><a href="#">Near me</a></li>
							</ul>
						</div>
					</h3>
				</div>
				<div class="request-details search-help-req">
					<ul>
						<li>
							<div class="client col">
								<p>Client</p>
							</div>
							<div class="service-req col">
								<p>Services Request</p>
							</div>
							<div class="posted col">
								<p>Posted</p>
							</div>
							<div class="budget col t-left ">
								<p>Payment Amount</p>
							</div>
						</li>
						<li v-if="posted_help_requests.is_loading">
							<Loader
								v-if="posted_help_requests.is_loading"
								text="LOADING POSTED HELP REQUESTS ..."
							>	
							</Loader>
						</li>
						<li
							v-for="posted_help_request in posted_help_requests.items"
						>
							<div class="client-details">
								<div class="img-holder">
									<img 
										:src="posted_help_request.owner.profile_pic" 
										:alt="posted_help_request.owner.profile_pic">
								</div>
								<h5>{{posted_help_request.owner.profile.category_csv}}</h5>
								<h3>{{posted_help_request.owner.full_name}}</h3>
								<a 
									:href="'/profile-view/'+posted_help_request.owner.id+'/owner'" 
									class="btn btn-violet-b"
									target="_blank">
									See Profile
								</a>
							</div>
							<div class="clearfix title-details">

								<div class="f-left">
									<p><span>professional Types  </span>{{posted_help_request.category_csv}}</p>
									<h3>{{posted_help_request.title}} </h3>
									<label for=""><span>Posted</span> Today {{posted_help_request.created_at}}</label>
								</div>
								<div class="f-right budget">
									<p>Payment Amount</p>
									<h5>${{posted_help_request.weekly_total}}</h5>
								</div>

								<div class="f-right posted  t-left">
									<p>Today {{posted_help_request.created_at}}</p>

								</div>
								<div class="clearfix"></div>

								<div class="content">
									<p>{{posted_help_request.description}} </p>
								</div>
								<div class="content-listing">
									<div class="info">
										<ul>
											<li class="sched">
												<h3>Desired Date </h3>
												<p><i class="fa fa-calendar" aria-hidden="true"></i> {{posted_help_request.start_date}}</p>
												<span>-</span>
												<p><i class="fa fa-calendar" aria-hidden="true"></i> {{posted_help_request.end_date}}</p>
											</li>
											<li class="sched">
												<h3>Type / Rates</h3>
												<span>{{posted_help_request.rate_text}}  &nbsp;  -  &nbsp;{{posted_help_request.selected_days_text_short}} </span>
											</li>
											<li>
												<div class="btn-holder">
													<router-link 
														:to="{ name:'professional.owner.help-requests.search.details', params: { id:posted_help_request.id } }" 
														class="btn btn-blue">	
														SEE DETAILS
													</router-link>
												</div>
											</li>
											<li class="sched">
												<h3>Desired Time </h3>
												<p><i class="fa fa-clock-o" aria-hidden="true"></i> {{posted_help_request.start_time}}</p>
												<span>-</span>
												<p><i class="fa fa-clock-o" aria-hidden="true"></i> {{posted_help_request.end_time}}</p>
											</li>
											<li>
												<h3>Address</h3>
												<p><i class="fa fa-map-marker" aria-hidden="true"></i>  {{posted_help_request.full_address}}</p>
											</li>
										</ul>
									</div>
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
		</div>
	</section>
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
					countText: 'Showing {from} to {to} of {count} Owners Posted Requests',
				},
				search: {
					filter: {
						professional_type: ''
					},
					sort: 'all'
				},
				professional_types: settings.professional_types
			}
		},

		mounted() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			this.$root.main.show = false;

			$( ".sort-link" ).click(function() {
				$( ".sort" ).slideToggle( "slow", function() {
				// Animation complete.
				});
			});
		},

		destroyed() {
			this.$parent.sidebar.show = true;
			this.$parent.in_user_dashboard = true;
			this.$root.main.show = true;
		},

		created() {
			this.fetchPostedHelpRequests();
		},

		watch: {
			'$route': 'fetchPostedHelpRequests'
		},

		components: {
			Pagination
		},
		
		methods: {

			setPage(page) {
				this.posted_help_requests.current_page = page;
				this.fetchPostedHelpRequests();
			},

			fetchPostedHelpRequests() {
				var vm = this;
					// vm.is_loading = true;
					// vm.posted_requests = [];
					axios
						.get(
							apiBaseUrl + 'rest/posted-help-requests',
							{
								params: {
									'filters[professional_types]': vm.search.filter.professional_type,
									page: this.posted_help_requests.current_page,
								} 
							}
						)
						.then((response)=>{
							const data = response.data;
							vm.posted_help_requests.items = data.data;
							vm.posted_help_requests.total = data.total;
							vm.posted_help_requests.is_loading = false;
						},(error)=>{
							vm.posted_help_requests.is_loading = false;
							console.log('error', error);
							alert('Something went wrong. Please try again later');
						});
			},
		}
	}
</script>