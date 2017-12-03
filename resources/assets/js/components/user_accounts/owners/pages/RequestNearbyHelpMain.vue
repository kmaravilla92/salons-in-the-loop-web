<template>
	<router-view
		:posted_help_request="posted_help_request"
		v-on:go_to_next_step="goToNextStep"
		v-on:update="update"
		v-on:post_help_request="postHelpRequest"
	></router-view>
</template>

<script>
	import axios from 'axios';
	export default {
		data() {
			return {
				posted_help_request: {
					id: 0,
					category: '',
					title: '',
					description: '',
					rate: '',
					weekly_total: '',
					selected_days: [],
					start_date: '',
					end_date: '',
					start_time: '',
					end_time: '',
					address: '',
					city: '',
					state: '',
					service_options: []
				}
			}
		},

		mounted() {
			this.$root.main.show = false;
		},

		created() {
			this.$root.main.show = false;
		},

		destroyed() {
			this.$root.main.show = true;
		},

		methods: {
			update(data_name, new_value){
				this[data_name] = new_value;
			},

			goToNextStep(route) {
				this.$router.push(route);
			},

			postHelpRequest(posted_help_request,onSuccess) {
				var vm = this;
				axios
					.post(
						apiBaseUrl + 'rest/owners/' + userId + '/help-requests',
						{
							posted_help_request: posted_help_request
						}
					)
					.then(onSuccess)
					.catch(function(error) {
						alert('Something went wrong. Please refresh your browser.' + error);
					})
			}
		}
	}
</script>