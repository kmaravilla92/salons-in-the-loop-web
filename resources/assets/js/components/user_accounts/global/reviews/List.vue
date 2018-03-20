<template>
	<div class="content-container app-client-req-details  req-release review-rating">
		<div class="inner-title">
			<h3>Reviews and Ratings</h3>
		</div>
		<Loader
			v-if="reviews.is_loading"
		>	
		</Loader>
		<ListItem
			v-for="review in reviews.items"
			:review="review"
			:record_type_map="record_type_map"
		>
		</ListItem>
		<p style="text-align: center;" v-if="reviews.items.length == 0 && !reviews.is_loading">No items to rate/review.</p>
		<div class="pagination-holder clearfix">
			<div class="pagination">
				<pagination 
					:records="reviews.total"
					:perPage="reviews.per_page"
					:countText="reviews.countText"
					@paginate="fetchReviews">
				</pagination>
			</div>
		</div>
	</div>
</template>

<script>
	import ListItem from './ListItem.vue'
	import {Pagination} from 'vue-pagination-2'
	let record_type_map = {
		"App\\Models\\Entities\\Clients\\PostedRequests" : "client_posted_request",
		"App\\Models\\Entities\\Clients\\Appointments" : "client_appointment",
		"App\\Models\\Entities\\Owners\\HelpRequest" : "owner_help_request",
		"App\\Models\\Entities\\Owners\\SpaceRental" : "owner_space_rental",
	}
	export default {
		data() {
			return {
				reviews: {
					is_loading: true,
					items: [],
					total: 0,
					per_page: settings.pagination.per_page,
					countText: 'Showing {from} to {to} of {count} to reviews',
				},
				record_type_map: record_type_map,
				user_type: user['type']
			}
		},
		created(){
			this.fetchReviews(1);
		},
		components: {
			Pagination,
			ListItem
		},
		methods: {
			fetchReviews(page) {
				var vm = this;
					vm.is_loading = true;
					axios
						.get(apiBaseUrl + 'rest/users/'+userId+'/reviews', {
							params: {
								page: page,
								user_type: vm.user_type
							}
						})
						.then((response)=>{
							vm.reviews.items = response.data.data;
							vm.reviews.total = response.data.total;
							vm.reviews.is_loading = false;
						},(error)=>{
							vm.$toastr('error', 'Something went wrong. Please try again later.', 'Posted Requests List');
							vm.reviews.is_loading = false;
						});
			}
		}
	}
</script>