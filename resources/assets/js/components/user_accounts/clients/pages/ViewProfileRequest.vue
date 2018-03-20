<template>
	<div class="content-container app-client-req-details client-appointment booking-details view-prof-req">
		<div class="inner-title">
			<h3>Request to view profile</h3>

		</div>

		<div class="pro-details owner-pro-details">
			<Loader
				v-if="profile_view_requests.is_loading"
			>
			</Loader>
			<div 
				class="pro-holder"
				v-for="(profile_view_request,index) in profile_view_requests.items"
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
					<p>{{profile_view_request.viewer.full_address}}</p>
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
			<div style="text-align: center;" v-if="profile_view_requests.items.length == 0 && !profile_view_requests.is_loading">No profile view requests.</div>
		</div>
		<br><br><br>
		<div class="pagination-holder clearfix">
			<div class="pagination">
				<pagination 
					:records="profile_view_requests.total"
					:perPage="profile_view_requests.per_page"
					:countText="profile_view_requests.countText"
					@paginate="fetchProfileViewRequests">
				</pagination>
			</div>
		</div>
	</div>
</template>
<script>
	import axios from 'axios'
	import {Pagination} from 'vue-pagination-2'
	export default {
		data() {
			return {
				user_id: userId,
				profile_view_requests: {
					is_loading: true,
					items: [],
					total: 0,
					per_page: settings.pagination.per_page,
					countText: 'Showing {from} to {to} of {count} My Profile Requests',
				}
			}
		},

		created() {
			this.fetchProfileViewRequests(1);
		},

		watch: {
			'$route': 'fetchProfileViewRequests'
		},

		components: {
			Pagination
		},

		methods: {
			fetchProfileViewRequests(page) {
				const vm = this;
				axios
					.get(
						apiBaseUrl + 'rest/users/'+userId+'/profile-view-requests',
						{
							params: {
								page: page
							}
						}
					)
					.then((response)=>{
						vm.profile_view_requests = {
							is_loading: false,
							items: response.data.data,
							total: response.data.total,
						}
					},(error)=>{
						vm.$toastr('error', 'Something went wrong. Please try again later.', 'Profile View Requests');
						vm.profile_view_requests.is_loading = false;
					});
			},

			updateRequestStatus(request, status) {
				const vm = this;
				axios
					.put(
						apiBaseUrl + 'rest/users/'+userId+'/profile-view-requests/' + request.id,
						{
							status: String(status)
						}
					)
					.then((response)=>{
						if(response.data.success){
							request.status = status;
							vm.$toastr('success', 'Request successfully ' + (status) + 'ed', 'Profile View Requests');
						}
					},(error)=>{
						vm.$toastr('error', 'Something went wrong. Please try again later.', 'Profile View Requests');
					});
			}
		}
	}
</script>