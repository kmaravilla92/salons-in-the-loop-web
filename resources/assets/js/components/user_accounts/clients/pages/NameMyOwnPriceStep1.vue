<template>
	<section id="main-wrapper" class="inner pro-calendar client-bg edit-profile book-rental calendar-edit  name-my create-space request-near" style="padding-bottom: 479px;">
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
				<form action="/" method="POST" v-on:submit.prevent="postNameMyOwnPrice">
					<div class="form-holder clearfix">
						<ul>
							<li class="width-30 f-left">
								<!-- <label for="">Choose Professional Type *</label> -->
								<label for="">Choose Professional Type</label>
								<!-- <select class="" v-model="name_my_own_price.professional_types">
									<option v-bind:value="professional_type" v-for="professional_type in professional_types">{{ professional_type }}</option>
								</select> -->
								<!-- <vSelect
									multiple
									name="professional types"
									:value.sync="name_my_own_price.professional_types" 
									:options="professional_types"
									v-validate="'required'"
									></vSelect>
									<span class="has-error">{{ errors.first('professional types') }}&nbsp;</span> -->
								<vSelect
									multiple
									name="professional types"
									:value.sync="name_my_own_price.professional_types" 
									:options="professional_types"
									></vSelect>
									<span class="has-error">{{ errors.first('professional types') }}&nbsp;</span>
							</li>
							<li class="width-70 f-right">
								<label for="">Request Title *</label>
								<!-- <input type="text" v-model="name_my_own_price.title"> -->
								<input 
									type="text" 
									name="request title"
									v-model="name_my_own_price.title"
									v-validate="'required'"
									:class="{'has-error': errors.has('request title')}"
								>
								<span class="has-error">{{ errors.first('request title') }}&nbsp;</span>
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
								<!-- <select class="" v-model="name_my_own_price.state">
									<option>State</option>
								</select> -->
								<input type="text" v-model="name_my_own_price.state">
							</li>
							<li class="half-width f-left">
								<!-- <label for="">Budget</label> -->
								<label for="">Amount Per Schedule</label>
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
									<input type="checkbox" v-model="name_my_own_price.service_options.must_be_performed_in_a_salon">
									<span></span>
								</div>
									<p>Services must be performed in a Salon</p>

							</li>
							<li class="half-width f-right">
								<div class="check">
									<div class="checkbox">
										<input type="checkbox" v-model="name_my_own_price.service_options.pro_must_be_licensed">
										<span></span>
									</div>
										<p>Professional must be licensed</p>
								</div>

							</li>
							<li class="half-width f-left">
								<div class="check">
									<div class="checkbox">
										<input type="checkbox" v-model="name_my_own_price.service_options.needed_at_address_below">
										<span></span>
									</div>
										<p>Services needed at address below</p>
										<br><br>
										<label for="">The area listed on the applied professional's booking calendar will be the servicing address unless you enter a preferred address below.</label>
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
						<div class="photos">
							<div 
								style="display: inline-block; text-align: center;"
								v-for="(image, index) in getPhotos('current_look_photos')"
							>
								<img 
									:src="image.path"
									:alt="image.path"
									/>
								<br>
								<a 
									href="#" 
									class="del-link"
									@click.prevent="removeImage('current_look_photos', index)"
								>
									<i aria-hidden="true" class="fa fa-times"></i>
								</a>
							</div>
						</div>
						<div class="upload">
							<span href="#upload-holder-current_look_photos" class="btn btn-blue popup-link">UPLOAD PHOTOS</span>
						</div>
					</div>

					<div class="form-holder book-rental">
						<div class="inner-title">
							<h3>My Desired Look Photos</h3>
						</div>
						<label for="">Add upload Current look up to 5 images only, from uploaded photos from profile and upload</label>
						<div class="photos">
							<div 
								style="display: inline-block; text-align: center;"
								v-for="(image, index) in getPhotos('desired_look_photos')"
							>
								<img 
									:src="image.path"
									:alt="image.path"
									/>
								<br>
								<a 
									href="#" 
									class="del-link"
									@click.prevent="removeImage('desired_look_photos', index)"
								>
									<i aria-hidden="true" class="fa fa-times"></i>
								</a>
							</div>
						</div>
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
						<!-- <div class="captcha-holder" style="width: 300px;">
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
						</div> -->
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
	</section>
</template>

<style>
	.photos img {
		display: inline-block;
	    vertical-align: top;
	    max-width: 105px;
	    width: 100%;
	    margin: 10px 8px;
	}
	
	a.del-link {
	    color: #cb4e4e;
	    font-size: 14px;
	}
</style>

<script>
	import vSelect from 'vue-select'
	import Dropzone from 'vue2-dropzone'
	import flatPickr from 'vue-flatpickr-component'
  	import 'flatpickr/dist/flatpickr.css'
	export default {
		props: [
			'name_my_own_price', 
			'user_id', 
			'professional_types', 
			'configs', 
			'upload_url', 
		],
		data() {
			return {
				captchaResponse: ''
			}
		},

		components: {
			flatPickr,
			Dropzone,
			vSelect,
		},

		methods: {
			clearData(){
				this.$emit('clearData');
			},

			postNameMyOwnPrice() {
				const vm = this;
				vm
					.$validator
					.validateAll()
					.then((valid)=>{
						if(valid){
							vm.$emit('postNameMyOwnPrice');
						}else{
							vm.$toastr('error', 'Oops, there were errors in the form. Please check and resubmit.', 'Profile Update');
							$('body,html').animate({
								scrollTop: $('input.has-error,textarea.has-error,select.has-error').prev('label').first().offset().top
							});
						}
					})
					.catch((error)=>{
						console.log(error)
					});
			},

			fileUploadSuccess(file, response) {
				console.log(file, response);
				if(response.success && response.image){
					this.name_my_own_price[response.image.type].push(response.image);
				}
			},

			fileUploadRemove(file, error, xhr) {
				console.log(file, error, xhr);
			},

			removeImage(photo_list_type, index) {
				this.$delete(this.name_my_own_price[photo_list_type], index);
			},

			getPhotos(type) {
				return this.name_my_own_price[type].filter(photo => {
					return photo.deleted_at == null;
				});
			}
		}
	}
</script>