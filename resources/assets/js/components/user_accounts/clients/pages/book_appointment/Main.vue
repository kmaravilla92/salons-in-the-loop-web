<template>
	<div>
		<router-view
			:pro_id="pro_id">
		</router-view>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				pro_id: this.$route.params.pro_id,
				events: [],
				current_step: 1
			}
		},

		mounted() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			$('#main-container').removeClass('dashboard-client');
			$('#main-container').addClass('dashboard-owner');
			$('#main-wrapper').addClass('inner pro-calendar client-bg edit-profile book-rental calendar-edit');
			if(this.current_step == 4){
				$('#main-wrapper').addClass('pro-calendar name-my accept-reject');
				$('#main-wrapper').removeClass('book-appoint create-space request-near');
			}else if(this.current_step == 3){
				$('#main-wrapper').addClass('book-appoint create-space request-near');
			}else if(this.current_step == 5){
				$('#main-wrapper').addClass('name-my step5');
				$('#main-wrapper').removeClass('calendar-edit accept-reject');
			}else{
				$('#main-wrapper').addClass('name-my book-appoint create-space request-near');
			}
		},

		destroyed() {
			this.$parent.sidebar.show = true;
			this.$parent.in_user_dashboard = true;
			$('#main-container').addClass('dashboard-client');
			$('#main-container').removeClass('dashboard-owner');
			$('#main-wrapper').removeClass('inner pro-calendar client-bg edit-profile book-rental calendar-edit');
			if(this.current_step == 4){
				$('#main-wrapper').removeClass('pro-calendar name-my accept-reject');
				$('#main-wrapper').addClass('name-my book-appoint create-space request-near');
			}else if(this.current_step == 5){
				$('#main-wrapper').removeClass('name-my step5');
				$('#main-wrapper').addClass('calendar-edit');
			}else{
				$('#main-wrapper').removeClass('book-appoint create-space request-near');
			}
			
		},

		created() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			$('#main-container').removeClass('dashboard-client');
			$('#main-container').addClass('dashboard-owner');
			$('#main-wrapper').addClass('inner pro-calendar client-bg edit-profile book-rental calendar-edit');
			if(this.current_step == 4){
				$('#main-wrapper').addClass('pro-calendar name-my accept-reject');
				$('#main-wrapper').removeClass('book-appoint create-space request-near');
			}else if(this.current_step == 3){
				$('#main-wrapper').addClass('book-appoint create-space request-near');
			}else if(this.current_step == 5){
				$('#main-wrapper').addClass('name-my step5');
				$('#main-wrapper').removeClass('calendar-edit accept-reject');
			}else{
				$('#main-wrapper').addClass('name-my book-appoint create-space request-near');
			}
			
		},

		methods: {
			__created() {
				this.$parent.sidebar.show = false;
				this.$parent.in_user_dashboard = false;
				$('#main-container').removeClass('dashboard-client');
				$('#main-container').addClass('dashboard-owner');
				$('#main-wrapper').addClass('inner pro-calendar client-bg edit-profile book-rental calendar-edit');
				if(this.current_step == 4){
					$('#main-wrapper').addClass('pro-calendar name-my accept-reject');
					$('#main-wrapper').removeClass('book-appoint create-space request-near');
				}else if(this.current_step == 3){
					$('#main-wrapper').addClass('book-appoint create-space request-near');
				}else if(this.current_step == 5){
					$('#main-wrapper').addClass('name-my step5');
					$('#main-wrapper').removeClass('calendar-edit accept-reject');
				}else{
					$('#main-wrapper').addClass('name-my book-appoint create-space request-near');
				}
			}
		}
	}
</script>