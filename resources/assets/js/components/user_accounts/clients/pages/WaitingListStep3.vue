<template>
	<section id="main-wrapper" class="inner pro-calendar client-bg edit-profile book-rental calendar-edit  name-my accept-reject " style="padding-bottom: 479px;">
		<div class="title-holder clearfix">
			<div class="wrapper">
				<h3>Waiting List Sign In</h3>
			</div>
		</div>
		<div class="wrapper">
			<div class="calendar-container">
				<div class="title-container clearfix">
					<p class="f-left">Receive Confirmation</p>
					<a class="f-right" href="">back</a>
				</div>
				<div class="form-holder">
					<ul>
						<li>
							<label for="">Where should we send your booking notification and receipt?</label>
							<input type="text" name="" value="">
							<div class="onoff">
								<div class="onoffswitch">
									<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
									<label class="onoffswitch-label" for="myonoffswitch">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
									</label>
								</div>
							</div>
							<p>SMS Notification</p>
						</li>
						<li>
							<label for="">SMS NOTIFICATIONS</label>

							<p>Yes, send me automated appt reminders & info about my bookings (message & data rates may apply).
								<br><br>
I acknowledge that the number provided above belongs to me and that I'm not required to consent as a condition of purchasing any goods or services. I can opt out at any time and will notify Salons in the Pro if my number changes.</p>
						</li>
					</ul>
				</div>
				<div class="title-container clearfix">

					<a href="" class="btn btn-blue f-right">Accept</a>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	import axios from 'axios';

	export default {
		data(){
			return {}
		},

		mounted() {
			$('#main-wrapper').addClass('inner pro-calendar client-bg edit-profile book-rental calendar-edit  name-my accept-reject');
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			$('.client-bg-dark.banner-search').hide();
		},

		destroyed() {
			$('#main-wrapper').removeClass('inner pro-calendar client-bg edit-profile book-rental calendar-edit  name-my accept-reject');
			this.$parent.sidebar.show = true;
			this.$parent.in_user_dashboard = true;
		},
		
		created() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			$('.client-bg-dark.banner-search').hide();
		},

		methods: {}
	}
</script>