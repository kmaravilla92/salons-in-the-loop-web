<template>
	<router-view
		:waiting_list="waiting_list"
		@goToNextStep="goToNextStep"
		@clearData="clearData"
		@sendData="sendData"
	>
	</router-view>
</template>

<script>
	import axios from 'axios';

	export default {
		data(){
			return {
				waiting_list: {
					title: '',
					message: '',
					phone_number: '',
					professional_id: 0,
					selected_schedules: []
				}
			}
		},

		mounted() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			this.$root.main.show = false;
			// $('#main-wrapper').addClass('inner pro-calendar client-bg edit-profile book-rental calendar-edit  name-my create-space request-near');
			// this.$parent.sidebar.show = false;
			// this.$parent.in_user_dashboard = false;
			// $('.client-bg-dark.banner-search').hide();
			this.setProfessionalId();
		},

		destroyed() {
			this.$parent.sidebar.show = true;
			this.$parent.in_user_dashboard = true;
			this.$root.main.show = true;
			// $('#main-wrapper').removeClass('inner pro-calendar client-bg edit-profile book-rental calendar-edit  name-my create-space request-near');
			// this.$parent.sidebar.show = true;
			// this.$parent.in_user_dashboard = true;
		},
		
		created() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			this.$root.main.show = false;
			// this.$parent.sidebar.show = false;
			// this.$parent.in_user_dashboard = false;
			// $('.client-bg-dark.banner-search').hide();
			this.setProfessionalId();
		},

		watch: {
			'$route': 'setProfessionalId'
		},

		methods: {

			goToNextStep(route) {
				this.$router.push(route);
			},

			setProfessionalId() {
				this.waiting_list.professional_id = this.$route.params.pro_id;
			},

			clearData() {
				this.waiting_list.title = '';
				this.waiting_list.message = '';
				this.waiting_list.phone_number = '';
			},

			sendData(waiting_list) {
				var vm = this,
					professional_id = vm.waiting_list.professional_id;
					axios
						.post(apiBaseUrl + 'rest/users/'+professional_id+'/waiting-list', waiting_list)
						.then(function(response) {
							if(response.data.success){
								alert('Successfully sent!');
								vm.$parent.$router.push({
									name: 'client.waiting-list.final',
									params: {
										pro_id: professional_id,
										waiting_list_id: response.data.waiting_list.id
									}
								});
							}else{
								alert('Something went wrong. Please check your inputs or try again later.');
							}
						});
			}
		}
	}
</script>