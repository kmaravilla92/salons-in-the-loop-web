<template>
	<section id="main-wrapper" class="inner pro-calendar book-rental" style="padding-bottom: 479px;">
		<div class="title-holder">
			<h3>Book Rental</h3>
		</div>
		<div class="wrapper">
			<div class="calendar-container">
				<div class="title-container">
					<p>Salons in the loop is here to help you connect with the top professionals in the industry. Enter your  information now to <br> get started! Feel free to <a href="/contact-us">contact us</a> if you have any questions.</p>
				</div>
				<div class="form-holder">
					<div class="inner-title">
						<h3>Choose Rent Date</h3>
					</div>
					<ul class="clearfix">
						<li class="f-left half-width">
							<flat-pickr 
								v-model="rental_booking.start_date"
								:class="{date:true}"
								:config="configs.date"
								placeholder="Choose date from" 
							>
							</flat-pickr>
						</li>
						<li class="f-right half-width">
							<flat-pickr 
								v-model="rental_booking.end_date"
								:class="{date:true}"
								:config="configs.date"
								placeholder="Choose date to" 
							>
							</flat-pickr>
						</li>
					</ul>
				</div>
				<div class="form-holder rental-daily">
					<div class="inner-title">
						<h3>Rental Days Available</h3>
					</div>
					<h3>Select Days</h3>
					<div class="check">
						<div class="checkbox">
							<input type="checkbox" name="v1" value="Mon" v-model="rental_booking.selected_days">
							<span></span>
						</div>
						<p>Mon</p>
						<div class="checkbox">
							<input type="checkbox" name="v1" value="Tue" v-model="rental_booking.selected_days">
							<span></span>
						</div>
						<p>Tue</p>
						<div class="checkbox">
							<input type="checkbox" name="v1" value="Wed" v-model="rental_booking.selected_days">
							<span></span>
						</div>
						<p>Wed</p>
					</div>
				</div>
				<div class="form-holder rental-hourly">
					<div class="inner-title">
						<h3>Choose Rent Date</h3>
					</div>
					<ul class="clearfix">
						<li class="f-left half-width">
							<flat-pickr 
								v-model="rental_booking.start_time" 
								:class="{time:true}"
								:config="configs.time"
								placeholder="Select time from"
							>
							</flat-pickr>
						</li>
						<li class="f-right half-width">
							<flat-pickr 
								v-model="rental_booking.end_time" 
								:class="{time:true}"
								:config="configs.time"
								placeholder="Select time to"
							>
							</flat-pickr>
						</li>
					</ul>
				</div>
				<div class="form-holder">
					<div class="inner-title">
						<h3>Allow Reoccur</h3>
					</div>
					<div class="check">

						<div class="checkbox">
							<input 
								type="checkbox" 
								name="v1" 
								value="0"
								v-model="rental_booking.allow_reoccuring"
								>
							<span></span>
						</div>
						<p>Repeat rental cycle till the duration end date</p>

					</div>
				</div>
				<div class="form-holder">
					<div class="inner-title">
						<h3>Upload photo of your license  <span>( optional )</span></h3>
					</div>
					<div class="upload">
						<input type="file" name="" value="">
						<span class="btn btn-blue">UPLOAD</span>
					</div>
				</div>
				<div class="form-holder">
					<ul>
						<li>
							<label for="">Message for salon owner</label>
							<textarea 
								name="name" 
								rows="8" 
								cols="80"
								v-model="rental_booking.message_to_salon_owner"
							>	
							</textarea>
						</li>
					</ul>
				</div>
				<div class="form-holder">
					<div class="check">
						<div class="checkbox">
							<input type="checkbox" name="v1" value="">
							<span></span>
						</div>
						<p>By checking this, you indicate that you have read and agree to the <a href="/temrs-and-conditions" target="_blank">Terms of Use</a> and <a href="/temrs-and-conditions" target="_blank">Privacy Policy</a>.</p>
					</div>
					<div class="captcha-holder">
						<!-- <img src="/frontsite/images/captcha.png" alt=""> -->
						<div class="captcha-holder" style="width: 300px;">
							<vue-grecaptcha 
								v-model="captchaResponse"
							>
							</vue-grecaptcha>
							<input 
								type="hidden" 
								name="recaptcha"
								v-model="captchaResponse"
								v-validate="'required'"
								:class="{'has-error': errors.has('recaptcha')}"
							>
							<span class="has-error">{{ errors.first('recaptcha') }}&nbsp;</span>
						</div>
					</div>
				</div>
				<div class="btn-holder">
					<input 
						type="submit" 
						name="" 
						value="Post Book Rental" 
						class="btn btn-blue" 
						@click.prevent="postRentalBooking"
					>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	import flatPickr from 'vue-flatpickr-component';
  	import 'flatpickr/dist/flatpickr.css';
	export default {
		props: ['rental_booking', 'configs', 'upload_url', 'postRentalBooking'],
		data() {
			return {
				captchaResponse: ''
			}
		},
		components: {
			flatPickr
		},
		methods: {}
	}
</script>