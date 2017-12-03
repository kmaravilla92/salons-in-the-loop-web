<template>
	<section id="main-wrapper" class="inner pro-calendar owner-bg book-rental calendar-edit accept-reject" style="padding-bottom: 479px;">
		<div class="title-holder clearfix">
			<div class="wrapper">
				<h3>Request for Nearby Help</h3>
			</div>
		</div>
		<div class="wrapper">
			<div class="calendar-container">
				<div class="title-container clearfix">
					<p class="f-left">Confirm your Mobile Number mobile number</p>
					<a class="f-right" href="" @click.prevent="goBack">back to <span>Select Services</span></a>
				</div>
				<div class="form-holder">
					<ul>
						<li>
							<label for="">Where should we send your request notification and receipt?</label>
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

					<a href="" class="btn btn-blue f-right" @click.prevent="accept">Accept</a>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	export default {
		methods: {
			goBack() {
				this.$emit('go_to_next_step', {
					name: 'owner.request-nearby-help.step-2'
				});
			},
			accept() {
				this.$emit('go_to_next_step', {
					name: 'owner.request-nearby-help.step-4'
				});
			}
		}
	}
</script>