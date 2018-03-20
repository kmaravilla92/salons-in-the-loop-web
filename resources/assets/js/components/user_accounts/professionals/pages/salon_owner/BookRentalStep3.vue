<template>
	<section id="main-wrapper" class="inner  pro-calendar book-rental" style="padding-bottom: 479px;">

		<div class="title-holder">

		</div>
		<div class="wrapper">
			<div class="calendar-container book-payment">
				<div class="title-container clearfix">
					<p class="f-left">Book rental with Maggie</p>
					<a href="#" class="f-right">back to Booking Summary</a>
				</div>
				<div class="content-holder">
					<h3>Total Payment : $300</h3>
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
						<a href="#" class="btn btn-blue" @click.prevent="sendPayment">Pay Now</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	export default {
		props: ['sendPayment'],
		mounted() {
			$( ".accordion-payment" ).accordion();
		}
	}
</script>