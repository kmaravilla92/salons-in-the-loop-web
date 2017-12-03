<template>
	<div class="content-container app-client-req-details app-req-listing help-req-listing booked-rental ownerhelp-req">
		<div class="inner-title">
			<h3>My Posted Rentals
			</h3>
		</div>
		<div class="request-details">
			<Loader
				v-if="posted_rentals.is_loading"
				text="LOADING RECENT POSTED HELP REQUESTS ..."
			>	
			</Loader>
			<ul>
				<li v-for="posted_rental in posted_rentals.items">
					<div class="clearfix title-details">
						<div class="f-left">
							<p><span>Category </span>{{posted_rental.category}}</p>
							<h3>{{posted_rental.title}} </h3>
							<label for=""><span>Posted</span> {{posted_rental.created_at}}</label>
						</div>

						<div class="f-right rent">
							<p>Rent Rate</p>
							<h5>${{posted_rental.rate_price}}</h5>
						</div>
						<div class="f-right space">
							<p>Space Available </p>
							<h5>2/2</h5>
						</div>
					</div>
					<div class="content">
						<p>{{posted_rental.description}} </p>
					</div>
					<div class="content-listing">
						<ul class="info">

							<li>
								<h5>Date available from </h5>
								<p><i class="fa fa-calendar" aria-hidden="true"></i> {{posted_rental.start_date}}</p>
							</li>
							<li>
								<h5>Date Availabe to</h5>
								<p><i class="fa fa-calendar" aria-hidden="true"></i> {{posted_rental.end_date}}</p>
							</li>
							<li>
								<h5>Schedule</h5>
								<p> {{posted_rental.rate_text}} </p>
							</li>
							<li>
								<h5>Days</h5>
								<p>{{posted_rental.selected_days_text_short}}  </p>
							</li>
							<li>
								<h5>Time Available to</h5>
								<p> <i class="fa fa-clock-o" aria-hidden="true"></i>  {{posted_rental.start_time}}</p>
							</li>
							<li>
								<h5>Time Availble to</h5>
								<p><i class="fa fa-clock-o" aria-hidden="true"></i> {{posted_rental.end_time}}</p>
							</li>
							<li>
								<h5>Address</h5>
								<p><i class="fa fa-map-marker" aria-hidden="true"></i> {{posted_rental.start_date.full_address}}</p>
							</li>
						</ul>
						<div class="btn-holder">
							<div class="pro-applied">
								<label for="">{{posted_rental.renters_count}}</label>
								<p>Renters Applied</p>
							</div>
							<router-link 
								:to="{name:'owner.posted-rentals.details', params: { id: posted_rental.id } }"
								class="btn btn-blue">
								SEE DETAILS
							</router-link>
						</div>
					</div>
				</li>
			</ul>
			<div class="pagination-holder clearfix" v-if="posted_rentals.items.length > 10">
				<div class="f-left">
					<p>Showing 8 out of 8 of My Posted Rentals</p>
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
				posted_rentals: {
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
			_fetchPostedRentals() {
				return axios
						.get(
							apiBaseUrl + 'rest/owners/' + userId + '/space-rentals'
						);
			},

			fetchData() {
				var vm = this;
				axios.all([
					this._fetchPostedRentals()
				])
				.then(axios.spread(function(posted_rentals) {
					vm.posted_rentals = {
						is_loading: false,
						items: posted_rentals.data
					};
				}))
				.catch(function(error){
					alert('Something went wrong. Please refresh your browser.');
					vm.posted_rentals.is_loading = false;
				});
			}
		}
	}
</script>