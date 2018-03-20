<template>
	<div>
		<a href="" @click.prevent="goToStep3">GO TO STEP 3</a>
		<div class="calendar-container">
			<div class="title-container clearfix">
				<div class="img-holder">
					<img src="/frontsite/images/pro1.jpg" alt="">
				</div>
				<h3 class="col">Jessica Matthews</h3>
				<a href="#" class="f-right">back to <span>Jessica’s Profile</span></a>
			</div>
			<div class="calendar-holder">
				<Loader
					v-if="is_loading"
				>
				</Loader>
				<div id='calendar' v-if="!is_loading">
					<full-calendar 
						:events="events" 
						locale="en"
						@dayClick="dayClick"
						@changeMonth="changeMonth "
					>
					</full-calendar>
				</div>
			</div>
		</div>

	</div>
</template>

<script>
	var eventSources = [
	    {
	      title : 'Sunny Out of Office',
	      start : '2016-08-25',
	      end : '2017-07-27'
	    }
	];
	import fullCalendar from 'vue-fullcalendar'
	export default {
		props: ['pro_id'],

		data() {
			return {
				is_loading: false,
				eventSources: eventSources
			};
		},

		mounted() {
		},

		created() {
		},

		components: {
			fullCalendar
		},

		methods: {
			goToStep3() {
				this.$parent.$router.push({
					name: 'client.book-appointment.step-3',
					params: {
						pro_id: this.pro_id
					}
				});
			},
			dayClick() {
				this.goToStep3();
			},
			changeMonth () {

			}
		}
	}
</script>