<template>
	<div>
		<div class="title-holder clearfix">
			<div class="wrapper">
				<h3>Name My Own Price</h3>
			</div>
		</div>
		<div class="wrapper">
			<div class="calendar-container book-payment">
				<div class="title-container clearfix">
					<p class="f-left">Pre- payment From your Request</p>
					<a href="#" class="f-right">back to <span>Request for my nearby info</span></a>
				</div>
				<div class="content-holder">
					<div class="red-note">
						Paying the amount on this site represents an agreement to pay the amount listed for the services described in this request.  You may cancel if you choose not to hire a professional listed in your posting details.
						<h3>Total Payment : $300</h3>
					</div>

					<div class="accordion-payment">
						<h3>Paypal</h3>
						  <div class="accord-holder">
						    <ul class="form-holder">
						    	<li>
										<label for="">Name On Card</label>
										<input type="text" name="" value="">
									</li>
						    	<li>
										<label for="">Card Number</label>
										<input type="text" name="" value="">
									</li>
									<li class="clearfix expi">
										<label for="" class="f-left">Expiration Date</label>
										<label for="" class="f-right">Security Code <i class="fa fa-question-circle" aria-hidden="true" style="color:#4f81bb;"></i></label>
										<div class="clearfix"></div>
										<input type="text" name="" value="" placeholder="Month" class="f-left width-33 expi-inp">
										<input type="text" name="" value="" placeholder="Year" class="f-left width-33 expi-inp year">
										<input type="text" name="" value="" placeholder="Code" class="f-left width-33 code">
									</li>
						    </ul>
						  </div>
						 <h3>Credit Card</h3>
						  <div class="accord-holder">
								<img src="/frontsite/images/card-ico2.png" alt="">
								<ul class="form-holder">
						    	<li>
										<label for="">Name On Card</label>
										<input type="text" name="" value="">
									</li>
						    	<li>
										<label for="">Card Number</label>
										<input type="text" name="" value="">
									</li>
									<li class="clearfix expi">
										<label for="" class="f-left">Expiration Date</label>
										<label for="" class="f-right">Security Code <i class="fa fa-question-circle" aria-hidden="true" style="color:#4f81bb;"></i></label>
										<div class="clearfix"></div>
										<input type="text" name="" value="" placeholder="Month" class="f-left width-33 expi-inp">
										<input type="text" name="" value="" placeholder="Year" class="f-left width-33 expi-inp year">
										<input type="text" name="" value="" placeholder="Code" class="f-left width-33 code">
									</li>
						    </ul>
						  </div>
					</div>

				</div>

				<div class="total-container total-amt clearfix">
					<div class="book-btn btn-holder">
						<a href="#" class="btn btn-blue" @click.prevent="sendPrePayment">Apply Pre payment</a>
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

		methods: {
			sendPrePayment() {
				this.$parent.$router.push({
					name: 'client.name-my-own-price.pre-payment',
					params: {
						id: response.data.posted_request.id
					}
				});
			}
		}
	}
</script>