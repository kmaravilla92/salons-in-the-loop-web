<template>
	<section id="main-wrapper" class="inner pro-calendar book-rental" style="padding-bottom: 479px;">
		<div class="title-holder">
			<h3>Book Rental</h3>
		</div>
		<div class="wrapper">
			<div class="calendar-container book-summary">
				<div class="title-container clearfix">
					<a href="#" class="f-right">back to <span>book rentals</span></a>
				</div>
				<div class="book-wrapper">
					<div class="salon-img-holder">
						<div class="img-holder">
							<img src="/frontsite/images/owner1.jpg" alt="">
						</div>
						<h3>Salon Business Name</h3>
					</div>
					<div class="summary-holder">
						<h3>Booking Summary</h3>
						<ul class="col left-col">
							<li>
								<label for="">Rental date</label>
								<p><i class="fa fa-calendar" aria-hidden="true"></i> {{rental_booking.start_date}} <span>-</span>        <i class="fa fa-calendar" aria-hidden="true"></i> {{rental_booking.end_date}}</p>
							</li>
							<li>
								<label for="">Hourly Rental</label>
								<p><i class="fa fa-clock-o" aria-hidden="true"></i> {{rental_booking.start_time}}     <span>-</span>        <i class="fa fa-clock-o" aria-hidden="true"></i> {{rental_booking.end_time}}</p>
							</li>
							<li>
								<label for="">License</label>
								<a 
									href="#"
									v-if="rental_booking.license_image_path"
								>
									License.jpg
								</a>
								<p v-if="!rental_booking.license_image_path">
									No License uploaded.
								</p>
							</li>
							<li>
								<label for="">Allow Reoccur</label>
								<p v-if="rental_booking.allow_reoccuring">
									<i class="fa fa-check" aria-hidden="true"></i>
									Repeat rental cycle till the duration end date
								</p>
								<p v-if="!rental_booking.allow_reoccuring">
									<i class="fa fa-close" aria-hidden="true"></i>
									No
								</p>
							</li>
						</ul>
						<ul class="col right-col">
							<li>
								<label for="">Message for salon owner</label>
								<p>{{rental_booking.message_to_salon_owner}}</p>
							</li>
							<li>
								<label for="">Edit  Listing</label>
								<p><i class="fa fa-check" aria-hidden="true"></i> Ask to edit salon owner’s listing</p>
							</li>
						</ul>
					</div>

				</div>
				<div class="total-amt clearfix">
					<div class="amount f-left">
						<h3>Total Amount :</h3>
						<h1>$ 300</h1>
					</div>
					<div class="book-btn f-right">
						<a 
							href="#" 
							class="btn btn-blue" 
							@click.prevent="confirmRentalBookingDetails">
							Book Rentals		
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	export default {
		props: ['rental_booking', 'confirmRentalBookingDetails']
	}
</script>