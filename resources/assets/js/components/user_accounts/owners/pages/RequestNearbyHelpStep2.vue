<template>
	<section id="main-wrapper" class="inner owner-bg pro-calendar book-rental create-space request-near" style="padding-bottom: 479px;">
		<div class="title-holder">
			<h3>Request for Nearby Help</h3>
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

				<div class="total-amt clearfix">

					<div class="book-btn btn-holder">
						<a href="#" class="btn btn-blue" @click.prevent="payNow">Pay Now</a>
					</div>
				</div>
			</div>
		</div>
	</section>
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
		mounted() {
			__dom();
		},

		created() {
			__dom();
		},
		
		methods: {
			payNow() {
				this.$emit('go_to_next_step', {
					name: 'owner.request-nearby-help.step-3'
				});
			}
		}
	}
</script>