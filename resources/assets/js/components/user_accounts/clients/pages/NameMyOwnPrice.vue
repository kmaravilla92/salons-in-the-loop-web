<template>
	<div>
		<div class="title-holder clearfix">
			<div class="wrapper">
				<h3>Name My Own Price</h3>
			</div>
		</div>
		<div class="wrapper">
			<div class="calendar-container">
				<div class="title-container clearfix">
					<p>Salons in the loop is here to help you connect with the top professionals in the industry. Enter your  information now to <br> get started! Feel free to <a href="#">contact us</a> if you have any questions.</p>
				</div>
				<form action="/" method="POST" v-on:submit.prevent="saveData">
					<div class="form-holder clearfix">
						<ul>
							<li class="width-30 f-left">
								<label for="">Choose Professional Type</label>
								<select class="" v-model="name_my_own_price.professional_types">
									<option v-bind:value="professional_type" v-for="professional_type in professional_types">{{ professional_type }}</option>
								</select>
							</li>
							<li class="width-70 f-right">
								<label for="">Request Title</label>
								<input type="text" v-model="name_my_own_price.title" required>
							</li>
							<li class="full-width f-left">
								<label for="">Message</label>
								<textarea v-model="name_my_own_price.message" rows="8" cols="80"></textarea>
							</li>

							<li class="half-width f-left">
								<label for="">Desired Date</label>
								<!-- <input type="date" v-model="name_my_own_price.desired_date" class="date"> -->
								<!-- <date-picker 
									v-model="name_my_own_price.desired_date"
									:config="configs.date"
									:class="{date:true}">
								</date-picker> -->
								<flat-pickr 
									v-model="name_my_own_price.desired_date"
									:class="{date:true}"
									:config="configs.date"
								>
								</flat-pickr>
							</li>
							<li class="half-width f-right">
								<label for="">Desired Time</label>
								<!-- <input type="time" v-model="name_my_own_price.desired_time" class="time"> -->
								<!-- <date-picker 
									v-model="name_my_own_price.desired_time"
									:class="{time:true}"
									:config="configs.time">
								</date-picker> -->
								<flat-pickr 
									v-model="name_my_own_price.desired_time" 
									:class="{time:true}"
									:config="configs.time"
								>
								</flat-pickr>
							</li>
							<li class="full-width f-left">
								<label for="">Servicing Area</label>
								<input type="text" v-model="name_my_own_price.servicing_area" class="">
							</li>
							<li class="half-width f-left">
								<label for="">City</label>
								<input type="text" v-model="name_my_own_price.city" class="">
							</li>
							<li class="half-width f-right">
								<label for="">State</label>
								<select class="" v-model="name_my_own_price.state">
									<option>State</option>
								</select>
							</li>
							<li class="half-width f-left">
								<label for="">Budget</label>
								<input type="text" v-model="name_my_own_price.budget" placeholder="$">
							</li>

						</ul>
					</div>

					<div class="form-holder create-last">
						<div class="inner-title">
							<h3>Service Options</h3>
						</div>
						<ul class="clearfix">
							<li class="half-width f-left check">
								<div class="checkbox">
									<input type="checkbox" v-model="name_my_own_price.service_options.service_performed_in_salon">
									<span></span>
								</div>
									<p>Services must be performed in a Salon</p>

							</li>
							<li class="half-width f-right">
								<div class="check">
									<div class="checkbox">
										<input type="checkbox" v-model="name_my_own_price.service_options.pro_must_license">
										<span></span>
									</div>
										<p>Professional must be licensed</p>
								</div>

							</li>
							<li class="half-width f-left">
								<div class="check">
									<div class="checkbox">
										<input type="checkbox" v-model="name_my_own_price.service_options.service_need_address_below">
										<span></span>
									</div>
										<p>Services needed at address below</p>
										<br><br>
										<label for="">Optional (other area)</label>
										<input type="text" v-model="name_my_own_price.service_options.other_area" placeholder="Enter address">
								</div>


							</li>
						</ul>
					</div>
					<div class="form-holder book-rental upload-img">
						<div class="inner-title">
							<h3>My Current Look Photos</h3>
						</div>
						<label for="">Add upload Current look up to 5 images only, from uploaded photos from profile and upload</label>
						<div class="upload">
							<span href="#upload-holder-current_look_photos" class="btn btn-blue popup-link">UPLOAD PHOTOS</span>
						</div>
					</div>

					<div class="form-holder book-rental">
						<div class="inner-title">
							<h3>My Desired Look Photos</h3>
						</div>
						<label for="">Add upload Current look up to 5 images only, from uploaded photos from profile and upload</label>
						<div class="upload">
							<span href="#upload-holder-desired_look_photos" class="btn btn-blue popup-link">UPLOAD PHOTOS</span>
						</div>
					</div>
					<div class="form-holder footer-check">

						<div class="check">

							<div class="checkbox">
								<input type="checkbox" v-model="name_my_own_price.agree">
								<span></span>
							</div>
							<p>By checking this, you indicate that you have read and agree to the <a href="/terms-and-conditions">Terms of Use</a> and <a href="/privacy-policy">Privacy Policy</a>.</p>

						</div>

						<div class="check">

							<div class="checkbox">
								<input type="checkbox" v-model="name_my_own_price.receive_confirmation">
								<span></span>
							</div>
							<p>You will receive a confirmation email and a call from Salons in the loop to verify & confirm your event.</p>

						</div>
						<div class="captcha-holder">
							<img src="/frontsite/images/captcha.png" alt="">
						</div>
					</div>
					<div class="btn-holder">
						<input type="submit" value="Clear All Info" class="btn btn-red" v-on:click.prevent="clearData">
						<input type="submit" value="Continue" class="btn btn-blue" >
					</div>
				</form>	

			</div>
		</div>
		<div id="upload-holder-current_look_photos" class="mfp-hide white-popup-block popup-holder login-popup">
			<h1>UPLOAD <span>PHOTOS</span></h1>
			<div class="form-holder">
				<dropzone 
					id="current_look_photos" 
					:url="upload_url" 
					:maxNumberOfFiles="5"
					v-on:vdropzone-success="fileUploadSuccess"
					v-on:vdropzone-removed-file="fileUploadRemove"
				>
					<input type="hidden" name="type" value="current_look_photos">
					<input type="hidden" name="type_id" v-model="user_id">
		    	</dropzone>
			</div>
		</div>
		<div id="upload-holder-desired_look_photos" class="mfp-hide white-popup-block popup-holder login-popup">
			<h1>UPLOAD <span>PHOTOS</span></h1>
			<div class="form-holder">
				<dropzone 
					id="desired_look_photos" 
					:url="upload_url" 
					:maxNumberOfFiles="5"
					v-on:vdropzone-success="fileUploadSuccess"
					v-on:vdropzone-removed-file="fileUploadRemove"
				>
					<input type="hidden" name="type" value="desired_look_photos">
					<input type="hidden" name="type_id" v-model="user_id">
		    	</dropzone>
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
	// import 'bootstrap/dist/css/bootstrap.css';
	// import datePicker from 'vue-bootstrap-datetimepicker';
	// import 'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css';
	import Dropzone from 'vue2-dropzone';

	import flatPickr from 'vue-flatpickr-component';
  	import 'flatpickr/dist/flatpickr.css';

	export default {
		data(){
			return {
				user_id: userId,
				professional_types: settings.professional_types,
				name_my_own_price: {
					professional_types: '',
					title: '',
					message: '',
					desired_date: '',
					desired_time: '',
					servicing_area: '',
					city: '',
					state: '',
					budget: '',
					service_options: {
						service_performed_in_salon: '',
						pro_must_licensed: '',
						service_need_address_below: '',
						other_area: '',
					},
					current_look_photos: [],
					desired_look_photos: [],
					agree: false,
					receive_confirmation: false,
				},
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
				upload_url: apiBaseUrl + 'rest/images',
			}
		},

		mounted() {
			$('#main-wrapper').addClass('inner pro-calendar client-bg edit-profile book-rental name-my create-space request-near');
			$('.popup-link').magnificPopup({
				type: 'inline',
				preloader: false
			});
		},

		destroyed() {
			$('#main-wrapper').removeClass('inner pro-calendar client-bg edit-profile book-rental name-my create-space request-near');
			this.$parent.sidebar.show = true;
			this.$parent.in_user_dashboard = true;
			$('.banner-search').hide();
		},
		
		created() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;

			$('.popup-link').magnificPopup({
				type: 'inline',
				preloader: false
			});
		},

		components: {
			// datePicker,
			flatPickr,
			Dropzone
		},

		methods: {
			saveData(){
				var vm = this;
					axios
						.post(
							apiBaseUrl + 'rest/users/'+userId+'/posted-requests', 
							{
								name_my_own_price: vm.name_my_own_price
							}
						)
						.then(function(response){
							if(response.data.success){
								vm.$parent.$router.push({
									name: 'client.name-my-own-price.pre-payment',
									params: {
										id: response.data.posted_request.id
									}
								});
							}
						});

			},
			clearData(){
				this.name_my_own_price = {
					professional_types: '',
					title: '',
					message: '',
					desired_date: '',
					desired_time: '',
					servicing_area: '',
					city: '',
					state: '',
					budget: '',
					service_options: {
						service_performed_in_salon: '',
						pro_must_licensed: '',
						service_need_address_below: '',
						other_area: '',
					},
					current_look_photos: [],
					desired_look_photos: [],
					agree: false,
					receive_confirmation: false
				};
			},
			fileUploadSuccess(file, response) {
				console.log(file, response);
				if(response.success && response.image){
					this.name_my_own_price[response.image.type].push(response.image.path);
				}
			},
			fileUploadRemove(file, error, xhr) {
				console.log(file, error, xhr);
			}
		}
	}
</script>