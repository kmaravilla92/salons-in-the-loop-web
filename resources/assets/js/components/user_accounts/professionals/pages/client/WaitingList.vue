<template>
	<div class="content-container app-client-req-details client-appointment">
		<div class="inner-title">
			<h3>Today’s Waiting List
				<div class="sort-holder f-right">
					<a class="sort-link">Sort by  <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
					<ul class="sort">
						<li><a href="#">All</a></li>
						<li><a href="#">Upcoming Appointments</a></li>
						<li><a href="#">Past Appointments</a></li>
					</ul>
				</div>
			</h3>
		</div>
		<Loader
			v-if="is_loading"
			text="LOADING POSTED REQUESTS ..."
		>	
		</Loader>
		<div 
			class="request-details"
			v-for="(item, index) in waiting_list"
			:key="index"
		>
			<ul>
				<li>
					<div class="client-holder">
						<div class="img-holder">
							<img src="/frontsite/images/client1-big.jpg" alt="">
						</div>
						<h3>Alexa Snowe</h3>
						<p>
							Square Town, Square City, <br> Colorado - CO, 11010
						</p>
						<div class="rating">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</div>
						<a href="#" class="btn btn-red-b" @click.prevent="">See Profile</a>
					</div>
					<div class="content content-waiting">
						<a href="#" @click.prevent=''>{{ item.title }}</a>
						<label>{{ item.created_at }}</label>
						<p>{{ item.message }}</p>
						<ul>
							<li>
								<label for=""><i class="fa fa-phone" aria-hidden="true"></i> Phone number</label>
								<p>{{ item.phone_number }}</p>
							</li>
							<li>
								<label for=""><i class="fa fa-clock-o" aria-hidden="true"></i>  Time</label>
								<p>Morning <br> 7:30 - 8:00</p>
							</li>
							<li>
								<label for=""><i class="fa fa-map-marker" aria-hidden="true"></i>  Location</label>
								<p><i class="fa fa-map-marker" aria-hidden="true"></i>   Square town, Square city</p>
							</li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
		<p
			v-if="waiting_list.length">
			No list available.
		</p>
		<div class="pagination-holder clearfix" v-if="waiting_list.length > 10">
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
</template>

<script>
	import axions from 'axios';
	export default {
		data() {
			return {
				is_loading: true,
				waiting_list: [] 
			}
		},

		created() {
			this.fetchWaitingList();
		},

		watch: {
			'$route': 'fetchWaitingList'
		},

		methods: {
			fetchWaitingList() {
				var vm = this;
					axios
						.get(apiBaseUrl + 'rest/users/' + userId + '/waiting-list')
						.then(function(response) {
							if(response.data) {
								vm.waiting_list = response.data;
								vm.is_loading = false;
							}
						}, 
						function(error) {
							alert('Something went wrong. Please try again.');
							console.log('error', error);
							vm.is_loading = false;
						});
			}
		}
	}
</script>