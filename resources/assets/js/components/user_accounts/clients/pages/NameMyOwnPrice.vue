<template>
	<router-view
		:name_my_own_price="name_my_own_price"
		:user_id="user_id"
		:professional_types="professional_types"
		:configs="configs"
		:upload_url="upload_url"
		@goToNextStep="goToNextStep"
		@postNameMyOwnPrice="postNameMyOwnPrice"
		@clearData="clearData"
	></router-view>
</template>

<style>
	/*label {font-weight: normal; font-family: 'Lato', sans-serif;}*/
	.book-rental .form-holder ul .half-width.f-left,
	.book-rental .form-holder ul .half-width.f-right {position: relative;}
	/*.btn {border-radius: 20px;}*/
	input::-webkit-calendar-picker-indicator,
	input::-webkit-inner-spin-button,
	input::-webkit-clear-button {
		display: none;
	}
</style>

<script>
	import axios from 'axios'
	export default {
		data(){
			return {
				user_id: userId,
				professional_types: settings.professional_types,
				name_my_own_price: {
					professional_types: [],
					title: '',
					message: '',
					desired_date: '',
					desired_time: '',
					servicing_area: '',
					city: '',
					state: '',
					budget: 0,
					service_options: {
						must_be_performed_in_a_salon: '',
						pro_must_be_licensed: '',
						needed_at_address_below: '',
						other_area: '',
					},
					current_look_photos: [],
					desired_look_photos: [],
					agree: false,
					receive_confirmation: false,
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
			$(function(){
				$('.popup-link').magnificPopup({
					type: 'inline',
					preloader: false
				});
			});
		},

		destroyed() {
			this.$parent.sidebar.show = true;
			this.$parent.in_user_dashboard = true;
			this.$root.main.show = true;
		},
		
		created() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			this.$root.main.show = false;
			this.fetchNMOP();
		},

		watch: {
			'$route': 'fetchNMOP'
		},

		methods: {
			
			goToNextStep(route) {
				this.$router.push(route);
			},

			fetchNMOP() {
				const vm = this;
				if(typeof vm.$route.params.id == 'undefined'){
					return false;
				}
				axios.get(
						apiBaseUrl + 
						'rest/users/' +
						vm.user_id +
						'/posted-requests/' + 
						vm.$route.params.id 
					).then((response)=>{
						vm.name_my_own_price = response.data;
					},(error)=>{

					});
			},

			postNameMyOwnPrice(){
				console.log(this.name_my_own_price);
				const vm = this;
				axios
					.post(
						apiBaseUrl + 'rest/users/'+userId+'/posted-requests', 
						{
							name_my_own_price: vm.name_my_own_price
						}
					)
					.then((response)=>{
						if(response.data.success){
							vm.$parent.$router.push({
								name: 'client.name-my-own-price.pre-payment',
								params: {
									id: response.data.posted_request.id
								}
							});
						}
					},(error)=>{
						vm.$toastr('error', 'Something went wrong. Please try again later.', 'Profile Update');
					});
			},

			clearData(){
				this.name_my_own_price = {
					professional_types: '',
					title: '',
					message: '',
					desired_date: '',
					desired_time: '',
					servicing_area: '',
					city: '',
					state: '',
					budget: '',
					service_options: {
						service_performed_in_salon: '',
						pro_must_licensed: '',
						service_need_address_below: '',
						other_area: '',
					},
					current_look_photos: [],
					desired_look_photos: [],
					agree: false,
					receive_confirmation: false
				};
			}
		}
	}
</script>