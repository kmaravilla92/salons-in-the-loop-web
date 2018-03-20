<template>
	<router-view
		:rental_booking="rental_booking"
		:configs="configs"
		:upload_url="upload_url"
		:postRentalBooking="postRentalBooking"
		:confirmRentalBookingDetails="confirmRentalBookingDetails"
		:sendPayment="sendPayment"
	>
		
	</router-view>
</template>

<script>
	import axios from 'axios';
	export default {
		data() {
			return {
				posted_rental: null,
				owner: null,
				rental_booking: {
					professional_id: userId,
					space_rental_id: this.$route.params.posted_rental_id,
					start_date:  '',
			        end_date:  '',
			        selected_days: [],
			        start_time: '',
			        end_time: '',
			        allow_reoccuring: '0', // 0 = no, 1 = yes
			        license_image_path: '',
			        message_to_salon_owner: '',
				},
				configs: {
					date: {
						dateFormat: 'm/d/Y'
					},
					time: {
						noCalendar: true,
						enableTime: true,
						dateFormat: 'h:i K'
					},
					keepOpen: true
				},
				upload_url: apiBaseUrl + 'rest/images',
			}
		},

		mounted() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			this.$root.main.show = false;
		},

		destroyed() {
			this.$parent.sidebar.show = true;
			this.$parent.in_user_dashboard = true;
			this.$root.main.show = true;
		},

		created() {
			this.fetchPostedRental();
		},

		watch: {
			'$route': 'fetchPostedRental'
		},

		methods: {
			fetchPostedRental() {
				const vm = this;
					axios
							.get(
								apiBaseUrl + 'rest/posted-rentals/' + this.$route.params.posted_rental_id
							)
							.then(function(posted_rental) {
								if(posted_rental.data) {
									vm.owner = posted_rental.data.owner;
									vm.posted_rental = posted_rental.data;
								}
							}, function(error) {
								console.log('error', error);
								alert('Something went wrong. Please try again later');
							}); 
			},
			postRentalBooking() {
				const vm = this;
					axios
						.post(
							apiBaseUrl + 'rest/owners/'+vm.owner.id+'/space-rentals/'+this.$route.params.posted_rental_id+'/applications',
							{
								rental_booking: vm.rental_booking
							}
						)
						.then(function(response) {
							if(response.data.success){
								vm.goToNextStep(2);
							}
						}, function(error) {
							console.log('error', error);
							vm.$toastr('error', 'Something went wrong. Please try again later.', 'Booked Rental Posting');
						});
			},

			confirmRentalBookingDetails() {
				// xhr
				this.goToNextStep(3);
			},

			sendPayment() {
				// xhr
				this.goToNextStep(4);
			},

			viewRentalBooking() {
				// this.$parent.$router.push({
				// 	name: 'professional.owner.posted-rentals.book.step-' + step,
				// 	params: {
				// 		posted_rental_id: this.posted_rental.id
				// 	}
				// });
			},

			goToNextStep(step) {
				this.$parent.$router.push({
					name: 'professional.owner.posted-rentals.book.step-' + step,
					params: {
						posted_rental_id: this.posted_rental.id
					}
				});
			}
		}
	}
</script>