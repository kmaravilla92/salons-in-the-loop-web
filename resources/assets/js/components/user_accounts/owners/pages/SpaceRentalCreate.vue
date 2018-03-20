<template>
	<section id="main-wrapper" class="inner pro-calendar owner-bg book-rental calendar-edit create-space" style="padding-bottom: 479px;">
		<div class="title-holder clearfix">
			<div class="wrapper">
				<h3>Accept or Reject Rental</h3>
			</div>
		</div>
		<div class="wrapper">
			<div class="calendar-container">
				<div class="title-container clearfix">
					<p class="f-left">Confirm your Mobile Number mobile number</p>
					<a class="f-right" href="">back to <span>Rental Details</span></a>
				</div>
				<div class="form-holder clearfix">
					<ul>
						<li class="half-width f-left">
							<label for="">Choose Category</label>
							<!-- <vSelect
								multiple
								name="category"
								:value.sync="space_rental.category" 
								:options="category_options"
								v-validate="'required'"
								></vSelect>
								<span class="has-error">{{ errors.first('category') }}&nbsp;</span> -->
								<vSelect
									multiple
									name="category"
									:value.sync="space_rental.category" 
									:options="category_options"
									></vSelect>
								<!-- <span class="has-error">{{ errors.first('category') }}&nbsp;</span> -->
						</li>
						<li class="half-width f-right">
							<label for="">Rent Title or ( assign a rental to someone) *</label>
							<input 
								type="text" 
								name="title" 
								v-validate="'required'"
								v-model="space_rental.title"
								:class="{'has-error': errors.has('title')}"
							>
							<span class="has-error">{{ errors.first('title') }}&nbsp;</span>
						</li>
						<li class="full-width f-left">
							<label for="">Description</label>
							<textarea 
								name="description" 
								rows="8" 
								cols="80"
								v-model="space_rental.description"
							>	
							</textarea>
						</li>
						<li class="width-33 f-left">
							<label for="">Number of spaces at this rate</label>
							<input 
								type="number" 
								name="number of spaces"
								v-model="space_rental.number_of_spaces"
								v-validate="'min_value:1'"
								min="1"
							>
							<span class="has-error">{{ errors.first('number of spaces') }}&nbsp;</span>
						</li>
						<li class="width-33 mid-33 f-left">
							<label for="">Choose Rate</label>
							<select 
								name="" 
								id="" 
								v-model="space_rental.rate"
							>
								<option :value="rate.id" v-for="rate in rates">{{rate.text}}</option>		
							</select>
							<!-- <vSelect
								name="rate"
								:value.sync="space_rental.rate" 
								:options="rates"
								></vSelect>
								<span class="has-error">{{ errors.first('rate') }}&nbsp;</span> -->
						</li>
						<li class="width-33 f-right">
							<label for="">Enter Rate Price</label>
							<input 
								type="text" 
								name="rate price"
								v-model="space_rental.rate_price"
								placeholder="$"
								v-validate="'min_value:1'"
								min="1"
							>
							<span class="has-error">{{ errors.first('rate price') }}&nbsp;</span>
						</li>
					</ul>
				</div>
				<div class="form-holder rental-daily">
					<div class="inner-title">
						<h3>Date and Time Availability</h3>
					</div>
				<ul>
					<li class="width70 f-left">

							<h3>Select Days</h3>
							<div class="check">
							<div class="checkbox">
								<input type="checkbox" value="Mon" v-model="space_rental.selected_days">
								<span></span>
							</div>
							<p>Mon</p>
							<div class="checkbox">
								<input type="checkbox" value="Tue" v-model="space_rental.selected_days">
								<span></span>
							</div>
								<p>Tue</p>
							<div class="checkbox">
								<input type="checkbox" value="Wed" v-model="space_rental.selected_days">
								<span></span>
							</div>
								<p>Wed</p>
							<div class="checkbox">
								<input type="checkbox" value="Thu" v-model="space_rental.selected_days">
								<span></span>
							</div>
								<p>Thu</p>
							<div class="checkbox">
								<input type="checkbox" value="Fri" v-model="space_rental.selected_days">
								<span></span>
							</div>
								<p>Fri</p>
							<div class="checkbox">
								<input type="checkbox" value="Sat" v-model="space_rental.selected_days">
								<span></span>
							</div>
								<p>Sat</p>
							<div class="checkbox">
								<input type="checkbox" value="Sun" v-model="space_rental.selected_days">
								<span></span>
							</div>
								<p>Sun</p>
						</div>
						</li>
						<li class="width-30 f-right">
							<label for="">Calculated Amount</label>
							<p><span>$</span> XX.XX</p>
						</li>
						<li class="half-width f-left">
							<label for="">Date available from </label>
							<flat-pickr 
								v-model="space_rental.start_date"
								:class="{date:true}"
								:config="configs.date"
							>
							</flat-pickr>
						</li>
						<li class="half-width f-right">
							<label for="">Date available to </label>
							<flat-pickr 
								v-model="space_rental.end_date"
								:class="{date:true}"
								:config="configs.date"
							>
							</flat-pickr>
						</li>
						<li class="half-width f-left">
							<label for="">Available from time</label>
							<flat-pickr 
								v-model="space_rental.start_time" 
								:class="{time:true}"
								:config="configs.time"
							>
							</flat-pickr>
						</li>
						<li class="half-width f-right">
							<label for="">Available to time</label>
							<flat-pickr 
								v-model="space_rental.end_time" 
								:class="{time:true}"
								:config="configs.time"
							>
							</flat-pickr>
						</li>
						<li class="full-width f-left">
							<br><br>
						</li>
						<li class="full-width f-left">
							<label for="">Address</label>
							<input 
								type="text" 
								name="address"
								v-model="space_rental.address"
							>
						</li>
						<li class="half-width f-left">
							<label for="">City</label>
							<input 
								type="text" 
								name="city"
								v-model="space_rental.city"
							>
						</li>
						<li class="half-width f-right">
							<label for="">State</label>
							<!-- <select class="" name="">
								<option value=""></option>
							</select> -->
							<input 
								type="text" 
								name="state"
								v-model="space_rental.state"
							>
						</li>
				</ul>
			</div>
			<div class="form-holder create-last">
				<div class="inner-title">
					<h3>Rent Options and Requirements</h3>
				</div>
				<ul class="clearfix">
					<li class="half-width f-left check">
						<div class="checkbox">
							<input type="checkbox" value="You may contact the owner to adjust this rental or create a specific rental for you." v-model="space_rental.requirements">
							<span></span>
						</div>
						<p>You may contact the owner to adjust this rental or create a specific rental for you.</p>
					</li>
					<li class="half-width f-right">
						<div class="check">
							<div class="checkbox">
								<input type="checkbox" value="Additional titme will pay additional fee in cash before starting additional time." v-model="space_rental.requirements">
								<span></span>
							</div>
							<p>Additional titme will pay additional fee in cash before starting additional time.</p>
						</div>
						<div class="check">
							<div class="checkbox">
								<input type="checkbox" value="Require license copy" v-model="space_rental.requirements">
								<span></span>
							</div>
							<p>Require license copy</p>
						</div>
					</li>
				</ul>
			</div>
			<div class="form-holder note-holder owner-bg-dark">
				<p>Note: </p>
				<br>
				<p><i class="fa fa-check" aria-hidden="true"></i> After selecting post,  go to details page to be edited.</p>
			</div>
			<div class="form-holder footer-check">
				<div class="check">
					<div class="checkbox">
						<input type="checkbox" name="v1" value="">
						<span></span>
					</div>
					<p>By checking this, you indicate that you have read and agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>
				</div>
				<div class="check">
					<div class="checkbox">
						<input type="checkbox" name="v1" value="">
						<span></span>
					</div>
					<p>You will receive a confirmation email and a call from Salons in the loop to verify & confirm your event.</p>
				</div>
				<div class="captcha-holder">
					<img src="/frontsite/images/captcha.png" alt="">
				</div>
			</div>
			<div class="btn-holder">
				<input type="submit" name="" value="Clear All Info" class="btn btn-red" @click.prevent="clearInfo(space_rental)">
				<input type="submit" name="" value="Post" class="btn btn-blue" @click.prevent="postSpaceRental(space_rental)">
			</div>
			</div>
		</div>
	</section>
</template>

<script>
	import axios from 'axios';
	import vSelect from 'vue-select';
	import flatPickr from 'vue-flatpickr-component';
  import 'flatpickr/dist/flatpickr.css';
	export default {
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
				category_options: settings.owner_categories,
				rates: [
					{id: '0', text: 'Hourly Accepted ( enter hourly price )'},
					{id: '1', text: 'Selected Day(s) ( enter daily price )'},
					{id: '2', text: 'Weekly only ( enter weekly price )'},
					{id: '3', text: 'Monthly only ( enter monthly price )'},
				],
				user_id: userId,
				space_rental: {
					id: 0,
					owner_id: userId,
					category: [],
					title: '',
					description: '',
					number_of_spaces: 0,
					rate: 1,
					rate_price: 0,
					selected_days: [],
					start_date: '',
					end_date: '',
					start_time: '',
					end_time: '',
					address: '',
					city: '',
					state: '',
					requirements: []
				}
			};
		},

		mounted() {
			this.$root.main.show = false;
		},

		created() {
			this.$root.main.show = false;
		},

		destroyed() {
			this.$root.main.show = true;
		},

		components: {
			vSelect,
			flatPickr,
		},

		methods: {
			postSpaceRental(space_rental) {
				var vm = this;
					vm
						.$validator
						.validateAll()
						.then((valid)=>{
							if(valid){
								axios
									.post(
										apiBaseUrl + 'rest/owners/' + vm.user_id + '/space-rentals',
										{
											space_rental: space_rental
										}
									)
									.then((response)=>{
										vm.$toastr('success', 'Space Rental successfully posted.', 'Post Space Rental');
										vm.clearInfo(space_rental)
									},(error)=>{
										vm.$toastr('error', 'Something went wrong. Please try again later.', 'Post Space Rental');
									});
								}else{
									vm.$toastr('error', 'Form have errors, please check and resubmit.', 'Post Space Rental');
									$('body,html').animate({
										scrollTop: $('.calendar-container').first().offset().top
									});
								}
						})
						.catch((error)=>{
							console.log(error);
						});	
			},

			clearInfo(space_rental) {
				var new_space_rental = {};
				for(var i in space_rental){
					if(typeof space_rental[i] == 'object'){
						new_space_rental[i] = [];
					}else{
						new_space_rental[i] = '';
					}
				}
				this.space_rental = new_space_rental;
			}
		}
	}
</script>
