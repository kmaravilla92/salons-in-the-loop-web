<template>
	<div>
		<div class="calendar-container">
			<div class="title-container clearfix">
				<p class="f-left">Confirm your Mobile Number</p>
				<a class="f-right" href="" @click.prevent="goToStep3">back</a>
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

				<a href="" class="btn btn-blue f-right" @click.prevent="goToStep5">Confirm</a>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['pro_id'],

		mounted() {
			this.$parent.current_step = 4;
		},

		created() {
			this.$parent.current_step = 4;
		},

		destroyed() {
			this.$parent.current_step = 1;
		},

		beforeRouteEnter(to, from, next) {
			next(vm => {
				vm.__watch();
			})
		},

		methods: {
			__watch(){
				this.$parent.__created();
			},
			goToStep3() {
				this.$parent.$router.push({
					name: 'client.book-appointment.step-3',
					params: {
						pro_id: this.pro_id
					}
				});
			},

			goToStep5() {
				this.$parent.$router.push({
					name: 'client.book-appointment.step-5',
					params: {
						pro_id: this.pro_id
					}
				});
			}
		}
	}
</script>