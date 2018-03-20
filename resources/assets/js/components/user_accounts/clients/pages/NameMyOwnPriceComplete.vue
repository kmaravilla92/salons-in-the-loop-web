<template>
	<div class="salon-pro dashboard dashboard-owner">
		<section id="main-wrapper" class="inner client-bg pro-calendar book-rental create-space request-near name-my" style="padding-bottom: 479px;">
			<div class="title-holder clearfix">
				<div class="wrapper">
					<h3>Name My Own Price</h3>
				</div>
			</div>
			<div class="wrapper">
				<div class="calendar-container book-payment book-payment-summ">
					<div class="title-container clearfix">
						<p class="f-left">Payment Confirmed</p>
						<router-link 
							class="f-right" 
							:to="{name: 'client.posted-requests'}"
						>
							See <span>My Posted Request</span> 
						</router-link>
					</div>
					<div class="content-holder">
						<h2>Payment confirmed and your <br>
							Request have been posted!
						</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <br> eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						<div class="btn-holder">
							<router-link 
								class="btn btn-blue" 
								:to="{name: 'client.posted-requests.details', params: {id: $route.params.id}}"
							>
								See My Post Details
							</router-link>
						</div>
					</div>

				</div>
			</div>
		</section>	
	</div>
</template>

<script>
	export default {
		data(){
			return {
				user_id: userId
			}
		},

		mounted() {},

		destroyed() {},
		
		created() {},

		components: {},

		methods: {}
	}
</script>