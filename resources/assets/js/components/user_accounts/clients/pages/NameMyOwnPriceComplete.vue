<template>
	<div>
		<div class="title-holder clearfix">
			<div class="wrapper">
				<h3>Name My Own Price</h3>
			</div>
		</div>
		<div class="wrapper">
			<div class="calendar-container book-payment book-payment-summ">
				<div class="title-container clearfix">
					<p class="f-left">Payment Confirmed</p>
					<a href="#" class="f-right">See <span>My Posted Request</span> </a>
				</div>
				<div class="content-holder">
					<h2>Payment confirmed and your <br>
						Request have been posted!</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <br> eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						<div class="btn-holder">
							<a href="#" class="btn btn-blue">See My Post Details</a>
						</div>
				</div>

			</div>
		</div>
	</div>
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
	import axios from 'axios';

	export default {
		data(){
			return {
				user_id: userId
			}
		},

		mounted() {
			$('#main-wrapper').addClass('inner client-bg pro-calendar book-rental create-space request-near name-my');
			$( ".accordion-payment" ).accordion();
		},

		destroyed() {
			$('#main-wrapper').removeClass('inner client-bg pro-calendar book-rental create-space request-near name-my');
			this.$parent.sidebar.show = true;
			this.$parent.in_user_dashboard = true;
		},
		
		created() {
			$('#main-wrapper').addClass('inner client-bg pro-calendar book-rental create-space request-near name-my');
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
		},

		components: {},

		methods: {}
	}
</script>