<template>
	<section id="main-wrapper" class="inner pro-calendar owner-bg book-rental calendar-edit create-space request-near" style="padding-bottom: 479px;">
		<div class="title-holder clearfix">
			<div class="wrapper">
				<h3>Request for Nearby Help</h3>
			</div>
		</div>
		<div class="wrapper">
			<div class="calendar-container">
				<div class="title-container clearfix">
					<p>Salons in the loop is here to help you connect with the top professionals in the industry. Enter your  information now to <br> get started! Feel free to <a href="#">contact us</a> if you have any questions.</p>
				</div>
				<div class="form-holder clearfix">
					<ul>
						<li class="half-width f-left">
							<label for="">Choose Category</label>
							<select class="" v-model="posted_help_request.category">
								<option value="Barber">Barber</option>
								<option value="Hair Stylist">Hair Stylist</option>
								<option value="Esthecian">Esthecian</option>
							</select>
						</li>
						<li class="half-width f-right">
							<label for="">Rent Title or ( assign a rental to someone)</label>
							<input type="text" v-model="posted_help_request.title">
						</li>
						<li class="full-width f-left">
							<label for="">Description</label>
							<textarea name="name" rows="8" cols="80" v-model="posted_help_request.description"></textarea>
						</li>
						<li class="half-width f-left">
							<label for="">Choose Rate</label>
							<select class="" v-model="posted_help_request.rate">
								<option value="0">Hourly Accepted ( enter hourly price )</option>
								<option value="1">Selected Day(s) ( enter daily price )</option>
								<option value="2">Weekly only ( enter weekly price )</option>
								<option value="3">Monthly only ( enter monthly price )</option>
							</select>
						</li>
						<li class="half-width f-right">
							<label for="">Weekly Total</label>
							<input type="text" placeholder="$" v-model="posted_help_request.weekly_total">
						</li>

					</ul>
				</div>
				<div class="form-holder rental-daily">
					<div class="inner-title">
						<h3>Date and Time Availability</h3>
					</div>
				<ul class="clearfix">
					<li class="width70 f-left">

						<h3>Select Days</h3>
						<div class="check">

							<div class="checkbox">
								<input type="checkbox" value="Mon" v-model="posted_help_request.selected_days">
								<span></span>
							</div>
							<p>Mon</p>

							<div class="checkbox">
								<input type="checkbox" value="Tue" v-model="posted_help_request.selected_days">
								<span></span>
							</div>
								<p>Tue</p>
							<div class="checkbox">
								<input type="checkbox" value="Wed" v-model="posted_help_request.selected_days">
								<span></span>
							</div>
								<p>Wed</p>
							<div class="checkbox">
								<input type="checkbox" value="Thu" v-model="posted_help_request.selected_days">
								<span></span>
							</div>
								<p>Thu</p>
							<div class="checkbox">
								<input type="checkbox" value="Fri" v-model="posted_help_request.selected_days">
								<span></span>
							</div>
								<p>Fri</p>
							<div class="checkbox">
								<input type="checkbox" value="Sat" v-model="posted_help_request.selected_days">
								<span></span>
							</div>
								<p>Sat</p>
							<div class="checkbox">
								<input type="checkbox" value="Sun" v-model="posted_help_request.selected_days">
								<span></span>
							</div>
								<p>Sun</p>
						</div>
					</li>
					<li class="width-30 f-right">

					</li>
					<li class="half-width f-left">
						<label for="">Start Date </label>
						<flat-pickr 
							v-model="posted_help_request.start_date"
							:class="{date:true}"
							:config="configs.date"
						>
						</flat-pickr>
					</li>
					<li class="half-width f-right">
						<label for="">End date </label>
						<flat-pickr 
							v-model="posted_help_request.end_date"
							:class="{date:true}"
							:config="configs.date"
						>
						</flat-pickr>
					</li>
					<li class="half-width f-left">
						<label for="">Start time</label>
						<flat-pickr 
							v-model="posted_help_request.start_time" 
							:class="{time:true}"
							:config="configs.time"
						>
						</flat-pickr>
					</li>
					<li class="half-width f-right">
						<label for="">End time</label>
					<flat-pickr 
							v-model="posted_help_request.end_time" 
							:class="{time:true}"
							:config="configs.time"
						>
						</flat-pickr>
					</li>
					<li class="full-width f-left">
						<div class="note">
							<p><span>Reminder:</span> you may need to update to make the space unavailable to rent during this period.</p>
						</div>
					</li>
					<li class="full-width f-left">
						<label for="">Address</label>
						<input type="text" class="" v-model="posted_help_request.address">
					</li>
					<li class="half-width f-left">
						<label for="">City</label>
						<input type="text" class="" v-model="posted_help_request.city">
					</li>
					<li class="half-width f-right">
						<label for="">State</label>
						<input type="text" class="" v-model="posted_help_request.state">
						<!-- <select class="">
							<option></option>
						</select> -->
					</li>
				</ul>
			</div>
			<br><br>
			<div class="form-holder create-last">
				<div class="inner-title">
					<h3>Service Options</h3>
				</div>
				<ul class="clearfix">
					<li class="half-width f-left check">
						<div class="checkbox">
							<input type="checkbox" value="Must accept all dates and times requested" v-model="posted_help_request.service_options">
							<span></span>
						</div>
						<p>Must accept all dates and times requested</p>
					</li>
					<li class="half-width f-right">
						<div class="check">
							<div class="checkbox">
								<input type="checkbox" value="Professional must be licensed" v-model="posted_help_request.service_options">
								<span></span>
							</div>
							<p>Professional must be licensed</p>
						</div>
					</li>
				</ul>
			</div>

			<div class="form-holder footer-check">

				<div class="check">

					<div class="checkbox">
						<input type="checkbox" name="v1">
						<span></span>
					</div>
					<p>By checking this, you indicate that you have read and agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>

				</div>

				<div class="check">

					<div class="checkbox">
						<input type="checkbox" name="v1">
						<span></span>
					</div>
					<p>You will receive a confirmation email and a call from Salons in the loop to verify & confirm your event.</p>

				</div>
				<div class="captcha-holder">
					<img src="/frontsite/images/captcha.png" alt="">
				</div>
			</div>
			<div class="btn-holder">
				<input type="submit" value="Clear All Info" class="btn btn-red" @click.prevent="clearHelpRequest(posted_help_request)">
				<input type="submit" value="Post" class="btn btn-blue" @click.prevent="postHelpRequest(posted_help_request)">
			</div>

			</div>
		</div>
	</section>
</template>

<script>
	import flatPickr from 'vue-flatpickr-component';
  	import 'flatpickr/dist/flatpickr.css';
	export default {
		props: ['posted_help_request'],
		data() {
			return {
				configs: {
					date: {
						dateFormat: 'm/d/Y'
					},
					time: {
						noCalendar: true,
						enableTime: true,
						dateFormat: 'h:i K'
					},
					keepOpen: true
				},
			}
		},

		mounted() {
			console.log(this.posted_help_request);
		},

		created() {

		},

		components: {
			flatPickr,
		},

		methods: {

			postHelpRequest(posted_help_request) {
				var vm = this;
				vm.$emit('post_help_request', posted_help_request, function(response){
					if(response.data.success){
						posted_help_request.id = response.data.posted_help_request.id;
						vm.$emit('update', 'posted_help_request', posted_help_request);
						vm.$emit('go_to_next_step', {
							name: 'owner.request-nearby-help.step-2',
							params: {
								posted_help_request_id: posted_help_request.id
							}
						});
					}
				});
			},

			clearHelpRequest(posted_help_request) {
				var new_posted_help_request = {};
				for(var i in posted_help_request){
					if(typeof posted_help_request[i] == 'object'){
						new_posted_help_request[i] = [];
					}else{
						new_posted_help_request[i] = '';
					}
				}
				this.$emit('update', 'posted_help_request', new_posted_help_request);
			}
		}
	}
</script>