<template>
	<div class="content-container app-client-req-details client-appointment booking-details">
		<div class="inner-title">
			<h3>Client Booked Details</h3>
		</div>
		<Loader
			v-if="is_loading"
		>
		</Loader>
		<div v-if="!is_loading">
			<h2>BOOKING DETAILS <span class="f-right"><!-- June 29, 2017 -->{{appointment.created_at}}</span></h2>
			<div class="request-details">
				<div class="services-holder">
					<ul>
						<li>
							<div class="services col">
								<p><i class="fa fa-scissors" aria-hidden="true"></i> Services</p>
							</div>
							<div class="notes col">
								<p><i class="fa fa-file-o" aria-hidden="true"></i> Additional Notes</p>
							</div>
							<div class="fee col">
								<p>Service Fee</p>
							</div>
						</li>
						<li>
							<div 
								class="details-holder"
								v-for="(selected_service, index) in appointment.selected_services"
							>
								<div class="services col">
									<h3>{{ selected_service.pro_service.service_name }}  <span>$ {{ selected_service.pro_service.price }}</span></h3>
									<p>$ {{ selected_service.pro_service.price }} for {{ selected_service.pro_service.duration }} minutes </p>
								</div>
								<div class="notes col">
									<p>
										{{ selected_service.additional_notes }}
									</p>
								</div>
								<div class="fee col">
									<h3>$ {{ selected_service.pro_service.price }}</h3>
								</div>
							</div>
							<div class="details-holder" v-if="appointment && appointment.selected_services.length == 0">
								No services
							</div>
						</li>
						<li>
							<div class="time-location">
								<ul>
									<li class="clearfix">
										<h3 class="time f-left"><i class="fa fa-clock-o" aria-hidden="true"></i>Time</h3>
										<h3 class="loc f-right"><i class="fa fa-map-marker" aria-hidden="true"></i>Location</h3>
									</li>
									<li 
										class="clearfix"
										v-for="(time, index) in appointment.selected_datetime"
									>
										<!-- <p class="time f-left">Morning <br> 7:30 - 8:00</p> -->
										<p class="time f-left">
											{{ time.booking_date_time }}
										</p>
										<p class="loc f-right">
											<i class="fa fa-map-marker" aria-hidden="true"></i> 
											{{ time.location }}
										</p>
									</li>
									<li class="clearfix" v-if="appointment && appointment.selected_datetime.length == 0">
										No schedule
									</li>
								</ul>
								<div class="total">
									<h3>    Services(s) total time /booked time </h3>
									<h2>90 min / 90 min</h2>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="total-holder">
					<div class="col">
						<h2>Total Amount :  <span>$ {{ appointment.total_price }}</span></h2>
					</div>
					<div class="cancellation">
						<p>See <a href="/terms-and-conditions" target="_blank">Cancellation</a> and <a href="/terms-and-conditions" target="_blank">Refund Policy</a>.</p>
					</div>
					<div class="btn-holder write-review">
						<a 
							href="#" 
							class="btn btn-red-b" 
							@click.prevent="actionRequest('2')"
							v-if="canReject"
						>
							REJECT		
						</a>
						<a 
							href="#" 
							class="btn btn-red-b" 
							@click.prevent=""
							v-if="isRejected"
						>
							REJECTED		
						</a>
						<a 
							href="#" 
							class="btn btn-blue-b" 
							@click.prevent="actionRequest('2')"
							v-if="canApprove"
						>
							APPROVE REQUEST
						</a>
						<a 
							href="#" 
							class="btn btn-red-b" 
							@click.prevent="actionRequest('4')"
							v-if="isApproved"
						>
							CANCEL BOOKING
						</a>
						<a 
							href="#" 
							class="btn btn-red-b" 
							@click.prevent=""
							v-if="isCancelled"
						>
							BOOKING CANCELLED
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				user_id: userId,
				is_loading: true,
				appointment: {
					selected_services: [],
					selected_datetime: []
				}
			}
		},

		computed: {
			isRejected() {
				return ['3'].indexOf(this.appointment.status) > -1;
			},
			isApproved() {
				return ['2'].indexOf(this.appointment.status) > -1;
			},
			isCancelled() {
				return ['4'].indexOf(this.appointment.status) > -1;
			},
			canReject() {
				return ['0', '1'].indexOf(this.appointment.status) > -1;
			},
			canApprove() {
				return ['0', '1'].indexOf(this.appointment.status) > -1;	
			}
		},

		created() {
			this.fetchData();
		},

		watch: {
			'$route': 'fetchData'
		},

		methods: {
			fetchData() {
				var vm = this;
				axios
					.get(apiBaseUrl + 'rest/professionals/'+vm.user_id+'/appointments/' + vm.$route.params.id)
					.then((response)=>{
						console.log(response);
						vm.appointment = response.data;
						vm.is_loading = false;
					});
			},

			actionRequest(status){ // 2 = approve, 3 = reject
				const vm = this;
				axios
					.put(
						apiBaseUrl + 'rest/professionals/'+vm.user_id+'/appointments/' + vm.$route.params.id,
						{
							appointment: {
								status: String(status)
							}
						}
					)
					.then(function(response){
						if(response.data.success){
							vm.appointment.status = status;
							vm.$toastr('success', 'Booking successfully updated.', 'Booking Update');
						}
					},(error)=>{
						vm.$toastr('error', 'Something went wrong. Please try again later.', 'Booking Update');
					});
			}
		}
	}
</script>