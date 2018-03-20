<template>
	<section id="main-wrapper" class="inner pro-calendar" style="padding-bottom: 479px;">
		<div class="title-holder">
			<h3>{{viewer_only ? 'Calendar' : 'My Calendar'}}</h3>
		</div>
		<div class="wrapper">
			<div class="calendar-container">
				<div class="title-container">
					<h3>Click dates to see details
						<a href="#" class="f-right" v-if="!viewer_only">back to <span>dashboard</span></a>
					</h3>
				</div>
				<div class="cal-holder">
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
	</section>
</template>

<script>
	import fullCalendar from 'vue-fullcalendar'
	import moment from 'moment'
	let demoEvents = [
		{
	      title : 'Sunny Out of Office',
	      start : '2017-12-27',
	      end : '2017-12-27'
	    }
	]

	export default {
		data() {
			return {
				user_id: userId,
				is_loading: true,
				events: [],
				viewer_only: this.$route.params.pro_id > 0
			}
		},

		mounted() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			this.$root.main.show = false;
		},

		destroyed() {
			this.$parent.sidebar.show = true;
			this.$parent.in_user_dashboard = true;
			this.$root.main.show = true;
		},
		
		created() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			this.$root.main.show = false;
			this.fetchSchedules();
		},

		watch: {
			'$route': 'fetchSchedules'
		},

		components: {
			fullCalendar
		},

		methods: {
			changeMonth(start, end, current){
				console.log('changeMonth')
				console.log('changeMonth', start)
				console.log('changeMonth', end)
				console.log('changeMonth', current)

			},
			dayClick(day, jsEvent){
				if(this.viewer_only){
					return false;
				}
				this.$router.push({
					name: 'professional.calendar.day.edit',
					params: {
						day: moment(day).format('YYYY-MM-DD')
					}
				});
			},

			fetchSchedules() {
				if(typeof this.$route.params.pro_id != 'undefined'){
					this.user_id = this.$route.params.pro_id;
				}
				const vm = this;
					axios
						.get(
							apiBaseUrl + 'rest/professionals/'+this.user_id+'/calendar-days',
						)
						.then((response)=>{
							vm.events = response.data;
							vm.is_loading = false;
						},(error)=>{
							vm.$toastr('error', 'Something went wrong. Please try again later.', 'General Calendar Settings');
						});
			}
		}
	}
</script>