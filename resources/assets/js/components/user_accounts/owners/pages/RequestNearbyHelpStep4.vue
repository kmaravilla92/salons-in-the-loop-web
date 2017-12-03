<template>
	<section id="main-wrapper" class="inner  pro-calendar create-rental owner-bg book-rental calendar-edit accept-reject" style="padding-bottom: 479px;">
		<div class="title-holder">
			<h3>Request for Nearby Help</h3>
		</div>
		<div class="wrapper">
			<div class="calendar-container book-payment book-payment-summ">
				<div class="title-container clearfix">
					<p class="f-left">Payment Confirmed</p>
					<a href="#" class="f-right" @click.prevent="goBack">See <span>My Request nearby Help</span> </a>
				</div>
				<div class="content-holder">
					<h2>Payment confirmed and your <br>
						Request have been posted!</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <br> eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
					<div class="btn-holder">
						<a href="#" class="btn btn-blue" @click.prevent="seeHelpRequestDetails">See My Request Details</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>
<script>
	export default {
		props: ['posted_help_request'],
		// data() {
		// 	return {
		// 		posted_help_request_id: 11
		// 	}
		// },
		methods: {
			goBack() {
				this.$emit('go_to_next_step', {
					name: 'owner.request-nearby-help.step-3'
				});
			},
			seeHelpRequestDetails() {
				this.$emit('go_to_next_step', {
					name: 'owner.posted-help-requests.details',
					params: {
						id: this.posted_help_request.id
					}
				});
			}
		}
	}
</script>