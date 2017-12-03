<template>
	<section id="main-wrapper" class="inner pro-calendar client-bg edit-profile book-rental calendar-edit  name-my create-space request-near">
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
							<input type="text" name="" v-model="waiting_list.title">
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

					<div class="captcha-holder">
						<img src="/frontsite/images/captcha.png" alt="">
					</div>

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
		data(){
			return {
				waiting_list: {
					title: '',
					message: '',
					phone_number: '',
					professional_id: ''
				}
			}
		},

		mounted() {
			$('#main-wrapper').addClass('inner pro-calendar client-bg edit-profile book-rental calendar-edit  name-my create-space request-near');
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			$('.client-bg-dark.banner-search').hide();
			this.setProfessionalId();
		},

		destroyed() {
			$('#main-wrapper').removeClass('inner pro-calendar client-bg edit-profile book-rental calendar-edit  name-my create-space request-near');
			this.$parent.sidebar.show = true;
			this.$parent.in_user_dashboard = true;
		},
		
		created() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			$('.client-bg-dark.banner-search').hide();
			this.setProfessionalId();
		},

		watch: {
			'$route': 'setProfessionalId'
		},

		methods: {
			setProfessionalId() {
				this.waiting_list.professional_id = this.$route.params.pro_id;
			},

			clearData(waiting_list) {
				waiting_list.title = '';
				waiting_list.message = '';
				waiting_list.phone_number = '';
			},

			sendData(waiting_list) {
				var vm = this,
					professional_id = vm.waiting_list.professional_id;
					axios
						.post(apiBaseUrl + 'rest/users/'+professional_id+'/waiting-list', waiting_list)
						.then(function(response) {
							if(response.data.success){
								alert('Successfully sent!');
								vm.$parent.$router.push({
									name: 'client.waiting-list.final',
									params: {
										pro_id: professional_id,
										waiting_list_id: response.data.waiting_list.id
									}
								});
							}else{
								alert('Something went wrong. Please check your inputs or try again later.');
							}
						});
			}
		}
	}
</script>