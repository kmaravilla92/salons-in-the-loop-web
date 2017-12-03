<template>
	<section id="main-wrapper" class="inner dashboard dashboard-pro client-req app-client-req-details app-req-listing help-req-listing" style="padding-bottom: 479px;">
		<div class="banner-container clearfix pro-bg banner-search-rental">
			<div class="wrapper">
				<div class="form-holder">
					<ul class="clearfix">
						<li>
							<label for="">Type</label>
							<select class="" name="">
								<option value="">Select</option>
							</select>
						</li>
						<li>
							<label for="">Days</label>
							<div class="check">
								<div class="checkbox checkbox2">
									<input type="checkbox" name="" value="">
									<span></span>
								</div>
								<p>MON</p>
								<div class="checkbox checkbox2">
									<input type="checkbox" name="" value="">
									<span></span>
								</div>
								<p>TUE</p>
								<div class="checkbox checkbox2">
									<input type="checkbox" name="" value="">
									<span></span>
								</div>
								<p>WED</p>
								<div class="checkbox checkbox2">
									<input type="checkbox" name="" value="">
									<span></span>
								</div>
								<p>THU</p>
								<div class="checkbox checkbox2">
									<input type="checkbox" name="" value="">
									<span></span>
								</div>
								<p>FRI</p>
								<div class="checkbox checkbox2">
									<input type="checkbox" name="" value="">
									<span></span>
								</div>
								<p>SAT</p>
								<div class="checkbox checkbox2">
									<input type="checkbox" name="" value="">
									<span></span>
								</div>
								<p>SUN</p>
							</div>
						</li>
						<li>
							<label for="">Available from</label>
							<input type="text" name="" value="" class="date" placeholder="Select Date">
						</li>
						<li>
							<label for="">Available to</label>
							<input type="text" name="" value="" class="date" placeholder="Select Date">
							<button type="button" name="button"><i class="fa fa-search" aria-hidden="true"></i></button>
							<a class="advanced-link">Advanced Search</a>
						</li>
					</ul>
					<ul class="advanced-holder clearfix">
						<li class="half-width f-left">
							<input type="text" name="" value="" placeholder="Enter any keyword">
						</li>
						<li class="half-width f-left">
							<input type="text" name="" value="" placeholder="Enter a search area, city, state or zip">
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="wrapper">
			<div class="content-container app-client-req-details help-req booked-rental search-client-req-details search-listing search-for-rental">
				<div class="inner-title">
					<h3>Search Result(s) Found : <span style="color:#000000;">86</span>


						<div class="sort-holder f-right">
							<a class="sort-link">Sort by  <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
							<ul class="sort">
								<li><a href="#">All</a></li>
								<li><a href="#">Recent Post</a></li>
								<li><a href="#">Recommended</a></li>
								<li><a href="#">Near me</a></li>
								<li><a href="#">Least Rent Rate</a></li>
								<li><a href="#">Greatest Rent Rate</a></li>
								<li><a href="#">Least number of spaces</a></li>
								<li><a href="#">Greatest number of spaces</a></li>
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
							<div class="posted col">
								<p>Space Available</p>
							</div>
							<div class="budget col">
								<p>Rent Rate</p>
							</div>
						</li>
						<li v-if="posted_rentals.is_loading">
							<Loader
								v-if="posted_rentals.is_loading"
								text="LOADING POSTED REQUESTS ..."
							>	
							</Loader>
						</li>
						<li v-for="posted_rental in posted_rentals.items">
							<div class="client-details">
								<div class="img-holder">
									<img src="/frontsite/images/owner1.jpg" alt="">
								</div>
								<h5>Salon Business</h5>
								<h3>Maggie Cui</h3>
								<a href="#" class="btn btn-red-b">See Profile</a>
							</div>
							<div class="clearfix title-details">
								<div class="f-left">
									<p><span>CATEGORY </span>{{posted_rental.category}}</p>
									<h3>{{posted_rental.title}} </h3>
									<label for=""><span>Posted</span> {{posted_rental.created_at}}</label>
								</div>
								<div class="f-right budget t-center">
									<p>Budget</p>
									<h5>${{posted_rental.rate_price}}</h5>
								</div>
								<div class="f-right budget space-avail t-right">
									<p>Space Available</p>
									<h5>2/2</h5>
								</div>
								<div class="f-right posted  t-center">
									<p>Today {{posted_rental.created_at}}</p>

								</div>
								<div class="clearfix"></div>

								<div class="content">
									<p>{{posted_rental.description}} </p>
								</div>
								<div class="content-listing">
									<div class="info">
										<ul>
											<li class="sched">
												<h3>Date available from </h3>
												<p><i class="fa fa-calendar" aria-hidden="true"></i> {{posted_rental.start_date}}</p>
												<span>-</span>
												<p><i class="fa fa-calendar" aria-hidden="true"></i> {{posted_rental.end_date}}</p>
											</li>
											<li>
												<h3>Schedule</h3>
												<p>{{posted_rental.rate_text}}</p>
											</li>
											<li>
												<h3>Days</h3>
												<p>{{posted_rental.selected_days_text_short}}</p>
											</li>
											<li>
												<div class="btn-holder">
													<router-link 
														:to="{name:'professional.owner.posted-rentals.search.details', params: { id: posted_rental.id } }"
														class="btn btn-blue">
														SEE DETAILS
													</router-link>
												</div>
											</li>
											<li class="sched">
												<h3>Time Available to </h3>
												<p><i class="fa fa-clock-o" aria-hidden="true"></i> {{posted_rental.start_time}}</p>
												<span>-</span>
												<p><i class="fa fa-clock-o" aria-hidden="true"></i> {{posted_rental.end_time}}</p>
											</li>
											<li>
												<h3>Servicing area</h3>
												<p><i class="fa fa-map-marker" aria-hidden="true"></i>  {{posted_rental.start_date.full_address}}</p>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
					</ul>
					<div class="pagination-holder clearfix" v-if="posted_rentals.items.length > 10">
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
	export default {
		data() {
			return {
				posted_rentals: {
					items: [],
					is_loading: true,
				},
			}
		},

		mounted() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			this.$root.main.show = false;
		},

		destroyed() {
			this.$parent.sidebar.show = true;
			this.$parent.in_user_dashboard = true;
			this.$root.main.show = true;
		},

		created() {
			this.fetchPostedRentals();
		},

		watch: {
			'$route': 'fetchPostedRentals'
		},
		
		methods: {
			fetchPostedRentals() {
				var vm = this;
					vm.is_loading = true;
					vm.posted_requests = [];
					axios
						.get(
							apiBaseUrl + 'rest/posted-rentals'
						)
						.then(function(response){
							vm.posted_rentals.items = response.data;
							vm.posted_rentals.is_loading = false;
						}).catch(function(){
							vm.posted_rentals.is_loading = false;
						});
			},
		}
	}
</script>