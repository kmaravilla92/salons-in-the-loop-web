<template>
	<div>
		<div class="calendar-container book-payment">
			<div class="title-container clearfix">
				<p class="f-left">Your Appointment with Jessica</p>
				<a href="#" class="f-right" @click.prevent="goToStep4">back to <span>  Sms Notification</span></a>
			</div>
			<div class="content-holder">
				<div class="red-note clearfix">
					<h3 class="f-left">Total Payment : $300</h3>
					<a href="#" class="btn btn-blue f-right">Request to Pay Later</a>
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
					<a href="#" class="btn btn-blue">Pay Now</a>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	function __dom() {
		$(document).ready(function(){
			$('.noti-holder').click(function(){
				$('.notif-popup').slideToggle( "slow", function() {});
			});
			$( ".accordion-payment" ).accordion();
		});
	}
	export default {
		props: ['pro_id'],

		mounted() {
			__dom();
			this.$parent.current_step = 5;
		},

		created() {
			__dom();
			this.$parent.current_step = 5;
		},

		destroyed() {
			this.$parent.current_step = 1;
		},

		beforeRouteEnter(to, from, next) {
			next(vm => {
				vm.__watch();
			})
		},

		methods: {
			__watch(){
				this.$parent.__created();
			},

			goToStep4() {
				this.$parent.$router.push({
					name: 'client.book-appointment.step-4',
					params: {
						pro_id: this.pro_id
					}
				});
			}
		}
	}
</script>