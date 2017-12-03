<template>
	<section id="main-wrapper" class="inner dashboard dashboard-pro client-req app-client-req-details app-req-listing help-req-listing" style="padding-bottom: 479px;">

		<div class="banner-container clearfix pro-bg banner-search">
			<div class="wrapper">
				<h3 class="f-left">Search Client Request</h3>
				<div class="search-holder f-right form-holder">
					<label for="">User Types For Client Request</label>
					<select class="" v-model="search.filter.professional_type">
						<option value="">Select</option>
						<option v-bind:value="professional_type" v-for="professional_type in professional_types">{{ professional_type }}
						</option>
					</select>
					<button 
						type="button" 
						name="button"
						@click.prevent="fetchData"
					>
						<i class="fa fa-search" aria-hidden="true"></i>
					</button>
				</div>
			</div>
		</div>

		<div class="wrapper">
			<div class="content-container app-client-req-details help-req booked-rental search-client-req-details search-listing">
				<div class="inner-title">
					<h3>Search Result(s) Found : <span style="color:#000000;">{{postedRequests.length}}</span>
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
				<div class="request-details">
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
							<div class="budget col">
								<p>Budget</p>
							</div>
						</li>
						<li v-if="is_loading">
							<Loader
								v-if="is_loading"
								text="LOADING POSTED REQUESTS ..."
							>	
							</Loader>
						</li>
						<li v-for="posted_request in postedRequests">
							<div class="client-details">
								<div class="img-holder">
									<img 
										:src="posted_request.owner.profile_pic" 
										:alt="posted_request.owner.profile_pic">
								</div>
								<h3>{{ posted_request.owner.full_name }}</h3>
								<a 
									:href="'/profile-view/'+posted_request.owner.id+'/client'" 
									class="btn btn-red-b"
									target="_blank">
									See Profile
								</a>
							</div>
							<div class="clearfix title-details">

								<div class="f-left">
									<p><span>User Types </span>{{ posted_request.professional_types }}</p>
									<h3>{{ posted_request.title }} </h3>
									<label for=""><span>Posted</span> {{posted_request.created_at }}</label>
								</div>
								<div class="f-right budget">
									<p>Budget</p>
									<h5>$ {{ posted_request.budget }}</h5>
								</div>
								<div class="f-right posted">
									<p>{{posted_request.created_at }}</p>

								</div>
								<div class="clearfix"></div>

								<div class="content">
									<p>{{ posted_request.message }} </p>
								</div>
								<div class="content-listing">
									<div class="info">
										<ul>
											<li>
												<h3>Desired date</h3>
												<p><i class="fa fa-calendar" aria-hidden="true"></i> {{ posted_request.desired_date }}</p>
											</li>
											<li>
												<h3>Desired  time</h3>
												<p><i class="fa fa-clock-o" aria-hidden="true"></i>  {{ posted_request.desired_time }}</p>
											</li>
											<li>
												<h3>Servicing area</h3>
												<p><i class="fa fa-map-marker" aria-hidden="true"></i>  {{ posted_request.complete_address }}</p>
											</li>
										</ul>
									</div>

									<div class="btn-holder">
										<router-link 
											v-bind:to="'/clients/posted-requests/search/' + posted_request.id" 
											class="btn btn-blue">	
											SEE DETAILS
										</router-link>
									</div>
							</div>

							</div>
						</li>
					</ul>
					<div class="pagination-holder clearfix" v-if="postedRequests.length > 10">
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
		</div>
	</section>
</template>

<script>

	const sorts = {
		all: function() {

		},
		recent_post: function() {

		},
		recommended: function() {

		},
		near_me: function() {

		}
	}

	export default {
		data() {
			return {
				is_loading: true,
				posted_requests: [],
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
			// $('#main-wrapper').addClass('client-req app-client-req-details app-req-listing help-req-listing');

			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			this.$root.main.show = false;
			// $('.pro-bg.banner-search').show();

			$( ".sort-link" ).click(function() {
				$( ".sort" ).slideToggle( "slow", function() {
				// Animation complete.
				});
			});
		},

		destroyed() {
			// $('#main-wrapper').removeClass('client-req app-client-req-details app-req-listing help-req-listing');
			this.$parent.sidebar.show = true;
			this.$parent.in_user_dashboard = true;
			this.$root.main.show = true;
			// $('.pro-bg.banner-search').hide();
		},
		
		created() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			this.$root.main.show = false;
			// $('.pro-bg.banner-search').show();

			this.fetchData();
		},

		watch: {
			'$route': 'fetchData'
		},

		computed: {
			postedRequests() {
				console.log('postedRequests');
				// if(this.search.filter.professional_type == ''){
				// 	return this.posted_requests;
				// }
				return this
						.posted_requests;
						// .filter(function(posted_request) {
						// 	return (posted_request.professional_types||'').split(',').indexOf(this.search.filter.professional_type) > -1;
						// }.bind(this));
			}
		},

		methods: {
			fetchData() {
				var vm = this;
					vm.is_loading = true;
					vm.posted_requests = [];
					axios
						.get(
							apiBaseUrl + 'rest/posted-requests',
							{
								params: {
									'filters[professional_types]': vm.search.filter.professional_type
								} 
							}
						)
						.then(function(response){
							vm.posted_requests = response.data;
							vm.is_loading = false;
						}).catch(function(){
							vm.is_loading = false;
						});
			},
		}
	}
</script>