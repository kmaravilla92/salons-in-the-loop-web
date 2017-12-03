<template>
	<div class="content-container acct-settings my-services my-services-hours">
		<div class="inner-title">
			<h3>Service Hours
				<span class="f-right">All fields marked with an asterisk (*) are required.</span>
			</h3>
		</div>
		<Loader
			v-if="is_loading"
			text="LOADING SERVICE HOURS ..."
		>	
		</Loader>
		<div class="form-holder" v-if="!is_loading">
			<ul>
				<li>
					<div class="col service-name">
						<p>Days</p>
					</div>
					<div class="col estimate-time">
						<p>Start Time</p>
					</div>
					<div class="col visib t-center">
						<p>End Time</p>
					</div>
					<div class="col price t-center">
						<p>Open / Close</p>
					</div>
				</li>
				<li v-for="day in ui_data.days_list">
					<div class="col service-name">
						<p>{{day}}</p>
					</div>
					<div class="col estimate-time">
						<!-- <select class="" name="">
							<option value=""></option>
						</select> -->
						<flat-pickr 
							v-model="service_hour.service_hours_decoded[day].start_time" 
							:class="{timepicker: true}"
							:config="configs.time"
						>
						</flat-pickr>
					</div>
					<div class="col visib">
						<!-- <select class="" name="">
							<option value=""></option>
						</select> -->
						<flat-pickr 
							v-model="service_hour.service_hours_decoded[day].end_time" 
							:class="{timepicker: true}"
							:config="configs.time"
						>
						</flat-pickr>
					</div>
					<div class="col price">
						<select 
							v-model="service_hour.service_hours_decoded[day].is_open"
							>
							<option value="yes">Open</option>
							<option value="no">Close</option>
						</select>
					</div>
				</li>
			</ul>
		</div>
		<div class="btn-holder" v-if="!is_loading">
			<a 
				href="#"
				class="btn btn-blue"
				@click.prevent="saveServiceHours"
			>
				Save and Update
			</a>
			<a 
				:href="'/profile-view/'+user_id+'/professional'" 
				target="_blank" 
				class="btn btn-violet">
				View my Profile
			</a>
		</div>

	</div>
</template>

<style>
	.my-services-hours .col.estimate-time:before {left: 15% !important;}
	.timepicker {padding-left: 35px !important;}
</style>

<script>
	import axios from 'axios';
	import flatPickr from 'vue-flatpickr-component';
  	import 'flatpickr/dist/flatpickr.css';

	var days_list = [
		'Sunday',
		'Monday',
		'Tuesday',
		'Wednesday',
		'Thursday',
		'Friday',
		'Saturday'
	];

	export default {
		data() {
			return {
				user_id: userId,
				is_loading: true,
				service_hour: null,
				ui_data: {
					days_list: days_list
				},
				configs: {
					time: {
						noCalendar: true,
						enableTime: true,
						dateFormat: 'h:i K'
					},
					keepOpen: true
				},
			}
		},

		created() {
			this.fetchServiceHours();
		},

		components: {
			flatPickr,
		},

		watch: {
			'$route': 'fetchServiceHours'
		},

		methods: {
			fetchServiceHours() {
				var vm = this;
					axios
						.get(apiBaseUrl + 'rest/users/'+userId+'/service-hours/'+userId)
						.then(function(response){
							vm.service_hour = response.data;
							vm.is_loading = false;
						});
			},

			saveServiceHours() {
				var vm = this;
					axios
						.put(apiBaseUrl + 'rest/users/'+userId+'/service-hours/'+userId, {
							service_hour: vm.service_hour
						})
						.then(function(response){
							if(response.data.success){
								alert('Services successfully saved!');
							}
						});
			},
		}
	}
</script>