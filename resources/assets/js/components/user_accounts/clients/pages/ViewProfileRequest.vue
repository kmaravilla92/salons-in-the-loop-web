<template>
	<div class="content-container app-client-req-details client-appointment booking-details view-prof-req">
		<div class="inner-title">
			<h3>Request to view profile</h3>

		</div>

		<div class="pro-details owner-pro-details">
			<div 
				class="pro-holder"
				v-for="(profile_view_request,index) in profile_view_requests"
			>
				<div class="img-holder">
					<div class="img-over">
						<img 
							:src="profile_view_request.viewer.profile_pic" 
							:alt="profile_view_request.viewer.profile_pic"
						>
					</div>

				</div>
				<div class="information help-req-owner">
					<h3>{{ profile_view_request.viewer.full_name }}</h3>
					<p>Square Town, Square City, Colorado - CO, 11010</p>
					<div class="rating">
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
					</div>
				</div>
				<div class="description clearfix">
					<div class="f-left">
						<h3>Service Title</h3>
						<a href="#">Accusata complectitur at duo </a>
					</div>
					<div class="f-right">
						<a 
							href="#" 
							class="btn btn-blue-b" 
							@click.prevent="updateRequestStatus(profile_view_request, '1')"
							v-if="profile_view_request.status == '1' || profile_view_request.status == '0'"
						>
							{{ profile_view_request.status == '1' ? 'Accepted' : 'Accept' }}
						</a>
						<a 
							href="#" 
							class="btn btn-violet-b" 
							@click.prevent="updateRequestStatus(profile_view_request, '2')"
							v-if="profile_view_request.status == '2' || profile_view_request.status == '0'"
						>
							{{ profile_view_request.status == '2' ? 'Rejected' : 'Reject' }}
						</a>
						<a 
							:href="'/profile-view/'+profile_view_request.viewer_id+'/professional'"
							class="btn btn-red-b"
							target="_blank"
						>
							See Profile
						</a>
					</div>
				</div>
			</div>
			<div style="text-align: center;" v-if="profile_view_requests.length == 0">No requests</div>
		</div>
		<br><br><br>
		<div class="pagination-holder clearfix" v-if="profile_view_requests.length > 10">
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
	import axios from 'axios';
	export default {
		data() {
			return {
				user_id: userId,
				is_loading: true,
				profile_view_requests: []
			}
		},

		created() {
			this.fetchProfileViewRequests();
		},

		watch: {
			'$route': 'fetchProfileViewRequests'
		},

		methods: {
			fetchProfileViewRequests() {
				var vm = this;
				axios
					.get(apiBaseUrl + 'rest/users/'+userId+'/profile-view-requests')
					.then(function(response){
						vm.profile_view_requests = response.data;
						vm.is_loading = false;
					});
			},

			updateRequestStatus(request, status) {
				axios
					.put(
						apiBaseUrl + 'rest/users/'+userId+'/profile-view-requests/' + request.id,
						{
							status: String(status)
						}
					)
					.then(function(response){
						if(response.data.success){
							request.status = status;
						}
					});
			}
		}
	}
</script>