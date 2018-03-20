<template>
	<div class="content-container">
		<div class="menu-content">
			<div class="inner-title">
				<h3>What Would you like to do?</h3>
			</div>
			<ul>
				<li>
					<router-link :to="{name:'owner.posted-rentals'}">
						<div class="img-holder">
							<img src="/frontsite/images/posted-ico.png" alt="">
						</div>

						<p class="ease">My Posted <br> Rentals</p>
					</router-link>
				</li>
				<li>
					<router-link :to="{name:'owner.posted-help-requests'}">
						<div class="img-holder">
							<img src="/frontsite/images/posted-ico.png" alt="">
						</div>
						<p class="ease">My Posted <br> Help Request</p>
					</router-link>
				</li>
				<li>
					<router-link :to="{name:'owner.request-nearby-help.step-1'}">
						<div class="noti-count ease">
							<p>16</p>
						</div>
						<div class="img-holder">
							<img src="/frontsite/images/post-space.png" alt="">
						</div>
						<p class="ease">Post a Help <br> Request</p>
					</router-link>
				</li>
				
				<li>
					<router-link :to="{name:'owner.posted-rentals.create'}">
						<div class="noti-count ease">
							<p>16</p>
						</div>
						<div class="img-holder">
							<img src="/frontsite/images/post-space.png" alt="">
						</div>

						<p class="ease">Post a Space <br> For Rent</p>
					</router-link>
				</li>

			</ul>
		</div>

		<div class="clearfix">
			<div class=" listing-left">
				<div class="inner-title">
					<h3>Recent  Space/ Booth Posted <a href="#" class="f-right">SEE ALL</a></h3>
				</div>
				<Loader
					v-if="posted_rentals.is_loading"
					text="LOADING RECENT POSTED RENTALS ..."
				>	
				</Loader>
				<ul class="db-listing" v-if="posted_rentals.items.length > 0">
					<li
						v-for="posted_rental in posted_rentals.items"
					>
						<div class="content-holder">
							<h5><span>Category</span> {{posted_rental.category_csv}}</h5>
							<a href="#">{{ posted_rental.title }}</a>

							<p><span>Posted</span> {{posted_rental.created_at}}</p>

						</div>
						<div class="content-holder renters">
							<p><span>{{posted_rental.renters_count}} </span> Renters Applied</p>
						</div>
						<div class="btn-holder">
							<router-link 
								:to="{name:'owner.posted-rentals.details', params: { id: posted_rental.id } }"
								class="btn btn-blue-b btn-slim">
								See details
							</router-link>
						</div>
					</li>
				</ul>
				<p 
					v-if="!posted_rentals.is_loading && posted_rentals.items.length == 0">
					No posted requests.
				</p>
				<br><br>
				<div class="inner-title">
					<h3>Recent  Request for Nearby Help <a href="#" class="f-right">SEE ALL</a></h3>
				</div>
				<Loader
					v-if="posted_help_requests.is_loading"
					text="LOADING RECENT POSTED HELP REQUESTS ..."
				>	
				</Loader>
				<ul class="db-listing recent-jobs" v-if="posted_help_requests.items.length > 0">
					<li
						v-for="posted_help_request in posted_help_requests.items"
					>

						<div class="content-holder">
							<h5><span>professional Types </span> {{posted_help_request.category_csv}}</h5>
							<a href="#">{{ posted_help_request.title }}</a>

							<!-- <p><span>Posted</span> Today10/26/20177</p> -->
							<p><span>Posted</span> Today {{posted_help_request.created_at}}</p>

						</div>
						<div class="content-holder renters">
							<p><span>{{ posted_help_request.professionals_applied_count }} </span> Professionals Applied</p>
						</div>
						<div class="btn-holder">
							<router-link 
								:to="{name:'owner.posted-help-requests.details', params: { id: posted_help_request.id } }"
								class="btn btn-blue-b btn-slim">
								See details
							</router-link>
						</div>
					</li>
				</ul>
				<p 
					v-if="!posted_help_requests.is_loading && posted_help_requests.items.length == 0">
					No posted requests.
				</p>
				<br><br>
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
			_fetchPostedRentals() {
				return axios
						.get(
							apiBaseUrl + 'rest/owners/' + userId + '/space-rentals',
							{
								params: {
									recent_only: true
								}
							}
						);
			},

			_fetchPostedHelpRequests() {
				return axios
						.get(
							apiBaseUrl + 'rest/owners/' + userId + '/help-requests',
							{
								params: {
									recent_only: true
								}
							}
						);
			},

			fetchData() {
				var vm = this;
				axios.all([
					this._fetchPostedRentals(),
					this._fetchPostedHelpRequests()
				])
				.then(axios.spread(function(posted_rentals, posted_help_requests) {
					vm.posted_rentals = {
						is_loading: false,
						items: posted_rentals.data.data
					};
					vm.posted_help_requests = {
						is_loading: false,
						items: posted_help_requests.data.data
					};

					console.log(posted_help_requests)
				}))
				.catch(function(error){
					alert('Something went wrong. Please refresh your browser.');
					vm.posted_rentals.is_loading = false;
					vm.posted_help_requests.is_loading = false;
				});
			}
		}
	}
</script>