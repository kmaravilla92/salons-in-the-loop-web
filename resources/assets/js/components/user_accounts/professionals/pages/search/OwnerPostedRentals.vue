<template>
	<section id="main-wrapper" class="inner dashboard dashboard-pro client-req app-client-req-details app-req-listing help-req-listing" style="padding-bottom: 479px;">
		<div class="banner-container clearfix pro-bg banner-search-rental">
			<div class="wrapper">
				<div class="form-holder">
					<ul class="clearfix">
						<li>
							<label for="">Type</label>
							<select class="" v-model="search.filters.professional_type">
								<option value="">None</option>
								<option 
									v-bind:value="professional_type" 
									v-for="professional_type in professional_types">
									{{ professional_type }}
								</option>
							</select>
						</li>
						<li>
							<label for="">Days</label>
							<div class="check">
								<div class="checkbox checkbox2">
									<input type="checkbox" value="mon" v-model="search.filters.days">
									<span></span>
								</div>
								<p>MON</p>
								<div class="checkbox checkbox2">
									<input type="checkbox" value="tue" v-model="search.filters.days">
									<span></span>
								</div>
								<p>TUE</p>
								<div class="checkbox checkbox2">
									<input type="checkbox" value="wed" v-model="search.filters.days">
									<span></span>
								</div>
								<p>WED</p>
								<div class="checkbox checkbox2">
									<input type="checkbox" value="thu" v-model="search.filters.days">
									<span></span>
								</div>
								<p>THU</p>
								<div class="checkbox checkbox2">
									<input type="checkbox" value="fri" v-model="search.filters.days">
									<span></span>
								</div>
								<p>FRI</p>
								<div class="checkbox checkbox2">
									<input type="checkbox" value="sat" v-model="search.filters.days">
									<span></span>
								</div>
								<p>SAT</p>
								<div class="checkbox checkbox2">
									<input type="checkbox" value="sun" v-model="search.filters.days">
									<span></span>
								</div>
								<p>SUN</p>
							</div>
						</li>
						<li>
							<label for="">Available from</label>
							<flat-pickr 
								v-model="search.filters.availability.date.from"
								:class="{date:true}"
								:config="configs.date"
								placeholder="Select Date"
							>
							</flat-pickr>
						</li>
						<li>
							<label for="">Available to</label>
							<flat-pickr 
								v-model="search.filters.availability.date.to"
								:class="{date:true}"
								:config="configs.date"
								placeholder="Select Date"
							>
							</flat-pickr>
							<button type="button" name="button" @click.prevent="fetchPostedRentals">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
							<a class="advanced-link">Advanced Search</a>
						</li>
					</ul>
					<ul class="advanced-holder clearfix">
						<li class="half-width f-left">
							<input type="text" placeholder="Enter any keyword" v-model="search.filters.keywords">
						</li>
						<li class="half-width f-left">
							<input type="text" placeholder="Enter a search area, city, state or zip" v-model="search.filters.location">
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="wrapper">
			<div class="content-container app-client-req-details help-req booked-rental search-client-req-details search-listing search-for-rental">
				<div class="inner-title">
					<h3>Search Result(s) Found : <span style="color:#000000;">{{posted_rentals.total}}</span>
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
									<img 
										:src="posted_rental.owner.profile_pic" 
										:alt="posted_rental.owner.profile_pic"
									>
								</div>
								<h5>{{posted_rental.owner.owner_profile.category_csv}}</h5>
								<h3>{{posted_rental.owner.full_name}}</h3>
								<a 
									:href="'/profile-view/'+posted_rental.owner.id+'/owner'" 
									class="btn btn-red-b"
									target="_blank">
									See Profile
								</a>
							</div>
							<div class="clearfix title-details">
								<div class="f-left">
									<p><span>CATEGORY </span>{{posted_rental.category_csv}}</p>
									<h3>{{posted_rental.title}} </h3>
									<label for=""><span>Posted</span> {{posted_rental.created_at}}</label>
								</div>
								<div class="f-right budget t-center">
									<p>Budget</p>
									<h5>${{posted_rental.rate_price}}</h5>
								</div>
								<div class="f-right budget space-avail t-right">
									<p>Space Available</p>
									<h5>{{posted_rental.number_of_occupied_spaces}}/{{posted_rental.number_of_spaces}}</h5>
								</div>
								<div class="f-right posted t-center">
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
												<p><i class="fa fa-map-marker" aria-hidden="true"></i>  {{posted_rental.full_address}}</p>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li v-if="posted_rentals.items.length == 0">No results found.<p></p></li>
					</ul>
					<div class="pagination-holder clearfix">
						<div class="pagination">
							<pagination 
								:records="posted_rentals.total"
								:perPage="posted_rentals.per_page"
								:countText="posted_rentals.countText"
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
	import flatPickr from 'vue-flatpickr-component'
	import 'flatpickr/dist/flatpickr.css'
	import {Pagination} from 'vue-pagination-2'

	export default {
		data() {
			return {
				professional_types: settings.professional_types,
				posted_rentals: {
					is_loading: true,
					items: [],
					current_page: 1,
					total: 0,
					per_page: settings.pagination.per_page,
					countText: 'Showing {from} to {to} of {count} Owners Posted Rentals',
				},
				search: {
					filters: {
						professional_type: '',
						availability: {
							date: {
								from: '',
								to: ''
							}
						},
						days: [],
						keywords: '',
						location: ''
					},
					sort: 'all'
				},
				configs: {
					date: {
						dateFormat: 'm/d/Y'
					},
					keepOpen: true
				},
			}
		},

		mounted() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			this.$root.main.show = false;

			$( ".advanced-link" ).click(function() {
				$( ".advanced-holder" ).slideToggle( "slow", function() {
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
			this.fetchPostedRentals();
		},

		watch: {
			'$route': 'fetchPostedRentals'
		},

		components: {
			flatPickr,
			Pagination
		},
		
		methods: {
			setPage(page) {
				this.posted_rentals.current_page = page;
				this.fetchPostedRentals();
			},

			fetchPostedRentals() {
				var vm = this;
					vm.posted_rentals.is_loading = true;
					vm.posted_rentals.items = [];
					axios
						.get(
							apiBaseUrl + 'rest/posted-rentals',
							{
								params: {
									'filters[professional_type]': vm.search.filters.professional_type,
									'filters[availability][date][from]': vm.search.filters.availability.date.from,
									'filters[availability][date][to]': vm.search.filters.availability.date.to,
									'filters[days]': vm.search.filters.days,
									'filters[keywords]': vm.search.filters.keywords,
									'filters[location]': vm.search.filters.location,
									page: vm.posted_rentals.current_page
								} 
							}
						)
						.then(function(response){
							const data = response.data;
							vm.posted_rentals.is_loading = false;
							vm.posted_rentals.items = data.data;
							vm.posted_rentals.total = data.total;
						}).catch(function(){
							vm.posted_rentals.is_loading = false;
            				vm.$toastr('error', 'Something went wrong. Please try again later.', 'Profile Update');
						});
			},
		}
	}
</script>