<template>
	<section id="main-wrapper" class="inner pro-calendar client-bg edit-profile book-rental calendar-edit  name-my create-space request-near" style="padding-bottom: 479px;">
		<div class="title-holder clearfix">
			<div class="wrapper">
				<h3>Waiting List Sign In</h3>
			</div>
		</div>
		<div class="wrapper">
			<div class="calendar-container">
				<div class="title-container clearfix">
					<p>Salons in the loop is here to help you connect with the top professionals in the industry. Enter your  information now to <br> get started! Feel free to <a href="/contact-us">contact us</a> if you have any questions.</p>
				</div>
				<div class="form-holder clearfix">
					<ul>

						<li class="full-width f-left">
							<label for="">Title</label>
							<input 
								type="text" 
								name="title"
								v-model="waiting_list.title"
								v-validate="'required'"
								:class="{'has-error': errors.has('title')}"
							>
							<span class="has-error">{{ errors.first('title') }}&nbsp;</span>
						</li>
						<li class="full-width f-left">
							<label for="">Message</label>
							<textarea name="name" rows="8" cols="80" v-model="waiting_list.message">
								
							</textarea>
						</li>

						<li class="half-width f-left">
							<label for="">Phone Number</label>
							<input type="text" name="" class="" v-model="waiting_list.phone_number">
						</li>

					</ul>
				</div>
				<div class="form-holder footer-check">
					<div class="check">
						<p><span style="color:#a52c2c;">Note:</span> You Will need to contact the service provider to cancel this booking</p>
					</div>
					<div class="check">

						<div class="checkbox">
							<input type="checkbox" name="v1" value="">
							<span></span>
						</div>
						<p>By checking this, you indicate that you have read and agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>

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
				<input type="submit" name="" value="Clear All Info" class="btn btn-red" @click.prevent="clearData(waiting_list)">
				<input type="submit" name="" value="Continue" class="btn btn-blue" @click.prevent="sendData(waiting_list)">
			</div>

			</div>
		</div>
	</section>
</template>

<script>
	import axios from 'axios';

	export default {
		props: ['waiting_list'],

		data() {
			return {
				captchaResponse: ''
			}
		},

		mounted() {},

		destroyed() {},
		
		created() {},

		methods: {

			clearData(waiting_list) {
				this.$emit('clearData');
			},

			sendData(waiting_list) {
				const vm = this;
				vm
					.$validator
					.validateAll()
					.then((valid)=>{
						if(valid){
							this.$emit('sendData');
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

			}
		}
	}
</script>