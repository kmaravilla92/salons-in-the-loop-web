<template>
	<div>
		<div class="calendar-container">
			<div class="title-container clearfix">
				<div class="col time-slot">
					<h3>Select Time Slot</h3>
				</div>
				<div class="col date-holder">
					<p>June 29, 2017</p>
				</div>
				<div class="col sort-holder">
					<select class="" name="">
						<option value="">Sort by</option>
						<option value="">Location 1</option>
					</select>
				</div>
				<div class="col link-holder">
					<a 
						href="#"
						@click.prevent="backToCalendar"
						>back to <span>Calendar</span></a>
				</div>
			</div>
			<div class="form-holder clearfix">
				<h3>Morning</h3>
				<ul>
					<li class="full-width clearfix">
						<div class="time-holder f-left">
							<h4>Time</h4>
						</div>
						<div class="loc-holder f-right">
							<h4>Location</h4>
						</div>
					</li>
					<li class="full-width clearfix">
						<input type="checkbox" name="" value="">
						<div class="time-holder f-left">
							<p>7:30 - 8:00</p>
						</div>
						<div class="loc-holder f-right">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  Square town, Square city</p>
						</div>
					</li>
					<li class="full-width clearfix">
						<input type="checkbox" name="" value="">
						<div class="time-holder f-left">
							<p>8:00 - 8:30</p>
						</div>
						<div class="loc-holder f-right">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  Square town, Square city</p>
						</div>
					</li>
					<li class="full-width clearfix">
						<input type="checkbox" name="" value="">
						<div class="time-holder f-left">
							<p>8:30 - 9:00</p>
						</div>
						<div class="loc-holder f-right">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  Square town, Square city</p>
						</div>
					</li>
					<li class="full-width clearfix">
						<input type="checkbox" name="" value="">
						<div class="time-holder f-left">
							<p>9:00 - 9:30</p>
						</div>
						<div class="loc-holder f-right">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  Square town, Square city</p>
						</div>
					</li>
				</ul>
			</div>
			<div class="form-holder clearfix">
				<h3>AFTERNOON</h3>
				<ul>
					<li class="full-width clearfix">
						<div class="time-holder f-left">
							<h4>Time</h4>
						</div>
						<div class="loc-holder f-right">
							<h4>Location</h4>
						</div>
					</li>
					<li class="full-width clearfix">
						<input type="checkbox" name="" value="">
						<div class="time-holder f-left">
							<p>7:30 - 8:00</p>
						</div>
						<div class="loc-holder f-right">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  Square town, Square city</p>
						</div>
					</li>
					<li class="full-width clearfix">
						<input type="checkbox" name="" value="">
						<div class="time-holder f-left">
							<p>8:00 - 8:30</p>
						</div>
						<div class="loc-holder f-right">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  Square town, Square city</p>
						</div>
					</li>
					<li class="full-width clearfix">
						<input type="checkbox" name="" value="">
						<div class="time-holder f-left">
							<p>8:30 - 9:00</p>
						</div>
						<div class="loc-holder f-right">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  Square town, Square city</p>
						</div>
					</li>
					<li class="full-width clearfix">
						<input type="checkbox" name="" value="">
						<div class="time-holder f-left">
							<p>9:00 - 9:30</p>
						</div>
						<div class="loc-holder f-right">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  Square town, Square city</p>
						</div>
					</li>
				</ul>
			</div>
			<div class="form-holder clearfix">
				<h3>EVENING</h3>
				<ul>
					<li class="full-width clearfix">
						<div class="time-holder f-left">
							<h4>Time</h4>
						</div>
						<div class="loc-holder f-right">
							<h4>Location</h4>
						</div>
					</li>
					<li class="full-width clearfix">
						<input type="checkbox" name="" value="">
						<div class="time-holder f-left">
							<p>7:30 - 8:00</p>
						</div>
						<div class="loc-holder f-right">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  Square town, Square city</p>
						</div>
					</li>
					<li class="full-width clearfix">
						<input type="checkbox" name="" value="">
						<div class="time-holder f-left">
							<p>8:00 - 8:30</p>
						</div>
						<div class="loc-holder f-right">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  Square town, Square city</p>
						</div>
					</li>
					<li class="full-width clearfix">
						<input type="checkbox" name="" value="">
						<div class="time-holder f-left">
							<p>8:30 - 9:00</p>
						</div>
						<div class="loc-holder f-right">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  Square town, Square city</p>
						</div>
					</li>
					<li class="full-width clearfix">
						<input type="checkbox" name="" value="">
						<div class="time-holder f-left">
							<p>9:00 - 9:30</p>
						</div>
						<div class="loc-holder f-right">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  Square town, Square city</p>
						</div>
					</li>
				</ul>
			</div>

			<div class="btn-holder bottom-holder client-bg-dark">
				<p>Note: please match /exceed the service(s) required time</p>

				<div class="clearfix time-required">
					<div class="half-width f-left">
						<h4>Service(s) Required time </h4>
						<h3>90 min</h3>
					</div>
					<div class="half-width f-right">
						<h4>Selected time </h4>
						<h3><span>60</span> min</h3>
					</div>
				</div>
				<div class="btn-holder">
					<a 
						href="#" 
						class="btn btn-red" 
						@click.prevent="addAnotherServices"
					>
						Add Another Services
					</a>
					<a 
						href="#" 
						class="btn btn-blue"
						@click.prevent="goToStep4"
					>
						Continue
					</a>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['pro_id'],

		mounted() {
			$('#main-wrapper > .wrapper').addClass('wrapper-appointment3');
			$(".wrapper-appointment3 ul li input[type='checkbox']").change(function() {
				 $(this).parent().toggleClass('checked');
			});
		},

		created() {
			$('#main-wrapper > .wrapper').addClass('wrapper-appointment3');
			$(".wrapper-appointment3 ul li input[type='checkbox']").change(function() {
				 $(this).parent().toggleClass('checked');
			});
		},

		destroyed() {
			$('#main-wrapper > .wrapper').removeClass('wrapper-appointment3');
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

			backToCalendar() {
				this.$parent.$router.push({
					name: 'client.book-appointment.step-2',
					params: {
						pro_id: this.pro_id
					}
				});
			},

			goToStep4() {
				this.$parent.$router.push({
					name: 'client.book-appointment.step-4',
					params: {
						pro_id: this.pro_id
					}
				});
			},

			addAnotherServices() {
				this.$parent.$router.push({
					name: 'client.book-appointment.step-1',
					params: {
						pro_id: this.pro_id
					}
				});
			}
		}
	}
</script>