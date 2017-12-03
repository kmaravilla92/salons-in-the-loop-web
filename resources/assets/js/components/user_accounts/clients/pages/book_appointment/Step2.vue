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
				<div id="calendar">
					<!-- <full-calendar :event-sources="eventSources"></full-calendar> -->
				</div>
			</div>
		</div>

	</div>
</template>
<!--<style>
    @import '~fullcalendar/dist/fullcalendar.css';
</style>-->
<script>
	function initCalendar() {
		// jQuery('#calendar').fullCalendar();
		// $(document).ready(function(){
		// 	$('.noti-holder').click(function(){
		// 		$('.notif-popup').slideToggle( "slow", function() {});
		// 	});
			
		// 	$('#calendar').fullCalendar({
		// 		header: {
		// 			left: 'title',
		// 			right: 'prev,today,next'

		// 		},
		// 		defaultDate: '2017-10-12',
		// 		editable: true,
		// 		eventLimit: true, // allow "more" link when too many events
		// 		events: [
		// 			{
		// 				title: 'All Day Event',
		// 				start: '2017-10-01'
		// 			},
		// 			{
		// 				title: 'Long Event',
		// 				start: '2017-10-07',
		// 				end: '2017-10-10'
		// 			},
		// 			{
		// 				id: 999,
		// 				title: 'Repeating Event',
		// 				start: '2017-10-09T16:00:00'
		// 			},
		// 			{
		// 				id: 999,
		// 				title: 'Repeating Event',
		// 				start: '2017-10-16T16:00:00'
		// 			},
		// 			{
		// 				title: 'Conference',
		// 				start: '2017-10-11',
		// 				end: '2017-10-13'
		// 			},
		// 			{
		// 				title: 'Meeting',
		// 				start: '2017-10-12T10:30:00',
		// 				end: '2017-10-12T12:30:00'
		// 			},
		// 			{
		// 				title: 'Lunch',
		// 				start: '2017-10-12T12:00:00'
		// 			},
		// 			{
		// 				title: 'Meeting',
		// 				start: '2017-10-12T14:30:00'
		// 			},
		// 			{
		// 				title: 'Happy Hour',
		// 				start: '2017-10-12T17:30:00'
		// 			},
		// 			{
		// 				title: 'Dinner',
		// 				start: '2017-10-12T20:00:00'
		// 			},
		// 			{
		// 				title: 'Birthday Party',
		// 				start: '2017-10-13T07:00:00'
		// 			},
		// 			{
		// 				title: 'Click for Google',
		// 				url: 'http://google.com/',
		// 				start: '2017-10-28'
		// 			}
		// 		]
		// 	});
		// });
	}

	// import fullCalendar from 'vue-fullcalendar';

	var eventSources = [
	    {
	      title : 'Sunny Out of Office',
	      start : '2016-08-25',
	      end : '2017-07-27'
	    }
	];

	export default {
		props: ['pro_id'],

		data() {
			return {
				eventSources: eventSources
			};
		},

		mounted() {
			initCalendar();
		},

		created() {
			initCalendar()
		},

		components : {
			// 'full-calendar': require('vue-full-calendar')	
		},

		methods: {
			goToStep3() {
				this.$parent.$router.push({
					name: 'client.book-appointment.step-3',
					params: {
						pro_id: this.pro_id
					}
				});
			}
		}
	}
</script>