<template>
	<section id="main-wrapper" class="inner pro-calendar book-rental" style="padding-bottom: 479px;">
		<div class="title-holder">
		</div>
		<div class="wrapper">
			<div class="calendar-container book-payment book-payment-summ">
				<div class="title-container clearfix">
					<p class="f-left">Payment Confirmed</p>
					<a href="#" class="f-right">See <span>My Request nearby Help</span> </a>
				</div>
				<div class="content-holder">
					<h2>Payment confirmed and your <br>
						application have been posted!</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <br> eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						<div class="btn-holder">
							<a href="#" class="btn btn-blue" @click.prevent="viewRentalBooking">See My Book Rental Application</a>
						</div>
				</div>

			</div>
		</div>
	</section>
</template>

<script>
	export default {
		props: ['viewRentalBooking']
	}
</script>