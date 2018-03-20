<template>
	<div class="content-container dashboard-owner featured-pro ">
		<div class="inner-title">
			<h3>Block /Unblock Professionals</h3>
		</div>
		<div class="listing-holder block-unb">
			<Loader
				v-if="is_loading"
			>
			</Loader>
			<div 
				class="pro-holder" 
				v-for="pro in pros"
			>
				<div class="img-over">
					<div class="img-holder">
						<img 
							:src="pro.profile_pic" 
							:alt="pro.profile_pic"
						>
					</div>
					<div class="onoff-holder">
						<img 
							:src="pro.presence_image" 
							:alt="pro.presence_image">
					</div>
				</div>
				<h3>{{pro.full_name}}</h3>
				<h5>{{pro.pro_profile.category_csv}}</h5>
				<p>{{pro.profile.full_address}}</p>
				<div class="rating-holder">
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
				</div>
				<BlockUnblockButton
					:owner_id="user_id"
					:pro="pro"
					:CAN_BLOCK="'-'"
				></BlockUnblockButton>
			</div>
		</div>
		<br><br><br><br><br><br>
		<br><br><br><br><br><br>
		<br><br><br><br><br><br>
		<br><br><br><br><br><br>
		<div class="pagination-holder clearfix">
			<div class="pagination">
				<pagination 
					:records="total"
					:perPage="per_page"
					:countText="countText"
					@paginate="setPage">
				</pagination>
			</div>
		</div>
	</div>
</template>

<script>
	import {Pagination} from 'vue-pagination-2'
	import BlockUnblockButton from './BlockUnblockButton.vue';
	export default {
		data() {
			return {
				user_id: userId,
				is_loading: true,
				pros: [],
				current_page: 1,
				total: 0,
				per_page: settings.pagination.per_page,
				countText: 'Showing {from} to {to} of {count} Professionals',
			}
		},

		created() {
			this.fetchPros();
		},

		watch: {
			'$route' : 'fetchPros'
		},

		components: {
			Pagination,
			BlockUnblockButton
		},

		methods: {
			setPage(page) {
				this.current_page = page;
				this.fetchPros();
			},

			fetchPros() {
				const vm = this;
				axios
					.get(apiBaseUrl + 'search/pros', {
						params: {
							page: this.current_page
						}
					})
					.then((response)=>{
						var pros = response.data.data;
						vm.pros = _.map(pros, function(pro){
							pro = pros[pro.id]
							pro['presence_image'] = pro.is_online ? '/frontsite/images/online-status.png' : '/frontsite/images/offline-status.png';
							return pro;
						});
						vm.total = response.data.total;
						vm.is_loading = false;
					},(error)=>{
						vm.$toastr('error', 'Something went wrong. Please try again later.', 'Professionals List');
						vm.is_loading = false;
					});
			},
		}
	}
</script>