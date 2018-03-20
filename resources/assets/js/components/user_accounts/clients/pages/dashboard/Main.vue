<template>
	<div class="content-container">
		<div class="menu-content">
			<div class="inner-title">
				<h3>What Would you like to do?</h3>
			</div>
			<ul>
				<DashboardIconTile
					v-for="(icon_tile, index) in icon_tiles"
					:key="index"
					:link="icon_tile.link"
					:image="icon_tile.image"
					:title="icon_tile.title"
					:statistics_count="icon_tile.statistics_count"
				>
				</DashboardIconTile>
			</ul>
		</div>
		<div class="clearfix">
			<div class="listing-left">
				<div class="inner-title">
					<h3>Recent Posted Request 
						<router-link to="/posted-requests" class="f-right">SEE ALL</router-link>
					</h3>
				</div>
				<Loader
					v-if="is_loading"
					text="LOADING RECENT POSTED REQUESTS ..."
				>	
				</Loader>
				<ul class="db-listing" v-if="posted_requests.listings.recent.length > 0">
					<RecentPostedRequestsListItem
						v-for="posted_request in posted_requests.listings.recent"
						:posted_request="posted_request"
						:key="posted_request.id"
						>
					</RecentPostedRequestsListItem>
				</ul>
				<p 
					v-if="!is_loading && posted_requests.listings.recent.length == 0">
					No posted requests.
				</p>
				<br><br>
			</div>
		</div>
	</div>
</template>

<script>
	import RecentPostedRequestsListItem from './RecentPostedRequestsListItem.vue';
	import axios from 'axios';
	export default {
		data() {
			return {
				is_loading: true,
				icon_tiles: [
					// {link: {name: 'client.search'}, title: 'Search Professionals', image: '/frontsite/images/search-ico.png', statistics_count: null },
					{link: {name: 'client.search'}, title: 'Search and Book', image: '/frontsite/images/search-ico.png', statistics_count: null },
					{link: {name: 'client.appointments'}, title: 'My Appointments', image: '/frontsite/images/appointment-ico.png', statistics_count: null},
					{link: {name: 'client.posted-requests'}, title: 'My Posted Requests', image: '/frontsite/images/posted-ico.png', statistics_count: null},
					{link: {name: 'client.name-my-own-price'}, title: 'Name My Own Price', image: '/frontsite/images/post-space.png', statistics_count: null},
				],
				posted_requests: {
					statistics: {
						new: 0
					},
					listings: {
						recent: []
					}
				}
			}
		},
		mounted() {
			// $('.menu-content li > a > p')
			// 	.height(
			// 		$('.menu-content li:first > a > p').height()
			// 	)
		},
		created() {
			this.fetchData();
		},
		watch: {
			'$route': 'fetchData'
		},
		components: {
			'RecentPostedRequestsListItem' : RecentPostedRequestsListItem
		},
		methods: {
			fetchData() {
				var vm = this;
				axios
					.get(apiBaseUrl + 'rest/users/'+userId+'/posted-requests', {
						params: {
							recent_only: true
						}
					})
					.then((response)=>{
						vm.posted_requests.listings.recent = response.data.data;
						vm.is_loading = false;
					},function(){
						vm.$toastr('error', 'Something went wrong. Please try again later.', 'Posted Requests List');
						vm.is_loading = false;
					});
			}
		}
	}
</script>