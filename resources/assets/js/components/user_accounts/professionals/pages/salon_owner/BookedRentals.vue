<template>
	<div class="content-container app-client-req-details app-req-listing help-req-listing booked-rental">
		<div class="inner-title">
			<h3>My Booked Rentals
				<div class="sort-holder f-right">
					<a class="sort-link">Sort by  <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
					<ul class="sort">
						<li><a href="#">All</a></li>
						<li><a href="#">Pending Jobs</a></li>
						<li><a href="#">Completed</a></li>
					</ul>
				</div>
			</h3>
		</div>
		<div class="request-details">
			<ul>
				<li
					v-for="booked_rental in booked_rentals.items"
				>
					<div class="clearfix title-details">
						<div class="f-left">
							<p><span>User Types </span>{{booked_rental.posted_rental.category_csv}}</p>
							<h3>{{booked_rental.posted_rental.title}} </h3>
							<label for=""><span>Posted</span> Today {{booked_rental.posted_rental.created_at}}</label>
						</div>
						<div class="f-right rent">
							<p>Rent Rate</p>
							<h5>${{booked_rental.posted_rental.rate_price}}</h5>
						</div>
						<div class="f-right space">
							<p>Space Available </p>
							<h5>{{booked_rental.posted_rental.number_of_occupied_spaces}}/{{booked_rental.posted_rental.number_of_spaces}}</h5>
						</div>
					</div>
					<div class="content">
						<p>{{booked_rental.posted_rental.description}} </p>
					</div>
					<div class="content-listing">
						<ul class="info">
							<li>
								<h5>Date available from </h5>
								<p><i class="fa fa-calendar" aria-hidden="true"></i> {{booked_rental.posted_rental.start_date}}</p>
							</li>
							<li>
								<h5>Date Availabe to</h5>
								<p><i class="fa fa-calendar" aria-hidden="true"></i> {{booked_rental.posted_rental.end_date}}</p>
							</li>
							<li>
								<h5>Schedule</h5>
								<p> {{booked_rental.posted_rental.rate_text}} </p>
							</li>
							<li>
								<h5>Days</h5>
								<p>{{booked_rental.posted_rental.selected_days_text_short}}</p>
							</li>
							<li>
								<h5>Time Available to</h5>
								<p> <i class="fa fa-clock-o" aria-hidden="true"></i>  {{booked_rental.posted_rental.start_time}}</p>
							</li>
							<li>
								<h5>Time Availble to</h5>
								<p><i class="fa fa-clock-o" aria-hidden="true"></i> {{booked_rental.posted_rental.end_time}}</p>
							</li>
							<li>
								<h5>Address</h5>
								<p><i class="fa fa-map-marker" aria-hidden="true"></i>{{booked_rental.posted_rental.full_address}}</p>
							</li>
						</ul>
						<div class="btn-holder">
							<div class="pro-applied">
								<label for="">{{booked_rental.posted_rental.renters_count}}</label>
								<p>Renters Applied</p>
							</div>
							<router-link
								:to="{name:'professional.owner.booked-rentals.details', params: { rental_id: booked_rental.id } }"
								class="btn btn-blue"
							>
								SEE DETAILS
							</router-link>
						</div>
					</div>
				</li>
			</ul>
			<div class="pagination-holder clearfix">
				<div class="pagination">
					<pagination 
						:records="booked_rentals.total"
						:perPage="booked_rentals.per_page"
						:countText="booked_rentals.countText"
						@paginate="setPage">
					</pagination>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import {Pagination} from 'vue-pagination-2'
	export default {
		data() {
			return {
				pro_id: userId,
				booked_rentals: {
					items: [],
					is_loading: true,
					current_page: 1,
					total: 0,
					per_page: settings.pagination.per_page,
					countText: 'Showing {from} to {to} of {count} My Booked Rentals',
				}
			}
		},

		mounted() {
			
		},

		created() {
			this.fetchBookedRentals();
		},
		
		watch: {
			'$route': 'fetchBookedRentals'
		},

		components: {
			Pagination
		},

		methods: {
			setPage(page){
				this.booked_rentals.current_page = page;
				this.fetchBookedRentals();
			},
			fetchBookedRentals() {
				const vm = this;
					axios(
						apiBaseUrl + 'rest/professionals/'+this.pro_id+'/posted-rentals/applications', {
							params: {
								page: vm.booked_rentals.current_page
							}
						}
					)
					.then(function(response) {
						const data = response.data;
						vm.booked_rentals.items = data.data;
						vm.booked_rentals.total = data.total;
						vm.booked_rentals.is_loading = false;
					}, function(error) {
						vm.booked_rentals.is_loading = false;
          				vm.$toastr('error', 'Something went wrong. Please try again later.', 'Booked Rental List');
					});
			}
		}
	}
</script>