<template>
	<section id="main-wrapper" class="inner  pro-calendar book-rental calendar-edit" style="padding-bottom: 479px;">
		<div class="title-holder clearfix">
			<div class="wrapper">
				<h3 class="f-left">Calendar Settings</h3>
			</div>
		</div>
		<div class="wrapper">
			<div class="calendar-container">
				<div class="title-container">
					<p>Create a basic shedule below, then edit it to your needs. The addresses for rentals purchased will be save d on the location selections <br>Feel free to <a href="#">contact us</a> if you have any questions.</p>
				</div>
				<div 
					class="form-holder"
					v-if="is_loading"
				>
					<Loader
						v-if="is_loading"
					>
					</Loader>
				</div>
				<div 
					v-if="!is_loading"
				>
					<div class="form-holder">
						<div class="inner-title">
							<h3>Daily Time Schedule</h3>
						</div>
						<ul class="clearfix">
							<li class="f-left half-width">
								<label for="">Start Time</label>
								<flat-pickr 
									v-model="settings.today_schedule_start_time" 
									:class="{time:true}"
									:config="configs.time"
									placeholder="Choose time"
								>
								</flat-pickr>
							</li>
							<li class="f-right half-width">
								<label for="">End Time</label>
								<flat-pickr 
									v-model="settings.today_schedule_end_time" 
									:class="{time:true}"
									:config="configs.time"
									placeholder="Choose time"
								>
								</flat-pickr>
							</li>
						</ul>
					</div>
					<div class="form-holder duration">
						<div class="inner-title">
							<h3>Duration</h3>
						</div>
						<div class="note">
							<p>Note : Set durations to the amount of time between clients</p>
							<p>: The duration interval <span style="font-weight:600;">default</span> for booking appointments or waiting list sign ins is <span style="font-weight:600;">15 minutes</span> if no time is selected.  But no worries, the client will be able to select more than one interval of time.</p>
							<ul class="clearfix">
								<li class="f-left half-width">
									<input type="text" placeholder="Enter time duration (e,g 30 min,  50 min, 60 min)" v-model="settings.duration">
								</li>
							</ul>
						</div>
					</div>
					<div class="form-holder morning-sched">
						<div class="inner-title">
							<h3>Morning Schedule</h3>
						</div>
						<ul class="clearfix">
							<li class="f-left half-width">
								<label for="">Morning Location  </label>
								<select 
									class="" 
									v-model="settings.morning_schedule_location"
									@change="setOtherLocation(settings.morning_schedule_location, 'morning_schedule_location', 'morning_schedule_other_location')"
								>
									<option 
										v-for="location in configs.locations" 
										::value="location.value"
										:selected="location.selected"
									>
										{{location.text}}
									</option>
								</select>
							</li>
							<li class="f-right half-width ">
								<label for="">&nbsp;</label>
								<input 
									type="text" 
									placeholder="Enter other location" 
									:class="{'disabled-input':configs.other_locations_disabled.morning_schedule_location}" 
									:disabled="configs.other_locations_disabled.morning_schedule_location"
									v-model="settings.morning_schedule_other_location"
								>
							</li>
						</ul>
						<ul class="clearfix">
							<li class="f-left half-width">
								<label for="">Morning Break  <span class="f-right">( Please take note that travel time should be included )</span></label>
								<flat-pickr 
									v-model="settings.morning_schedule_start_time" 
									:class="{time:true}"
									:config="configs.time"
								>
								</flat-pickr>
							</li>
							<li class="f-right half-width ">
								<label for="">&nbsp;</label>
								<flat-pickr 
									v-model="settings.morning_schedule_end_time" 
									:class="{time:true}"
									:config="configs.time"
								>
								</flat-pickr>
							</li>
						</ul>
						<ul class="clearfix rental-daily">
							<li class="f-left">
								<label for="">Repeat Days</label>
								<div class="check">
									<span v-for="day in configs.days">
										<div class="checkbox">
											<input 
												type="checkbox" 
												:id="day.value"
												:value="day.value"
												v-model="settings.morning_schedule_repeat_days"
											>
											<span></span>
										</div>
										<p>{{day.text}}</p>
									</span>
								</div>
							</li>
						</ul>
					</div>
					<div class="form-holder morning-sched lunch-sched">
						<div class="inner-title">
							<h3>Lunch Schedule</h3>
						</div>
						<ul class="clearfix">
							<li class="f-left half-width">
								<label for="">Lunch Location  </label>
								<select 
									class="" 
									v-model="settings.lunch_schedule_location"
									@change="setOtherLocation(settings.lunch_schedule_location, 'lunch_schedule_location', 'lunch_schedule_other_location')"
								>
									<option 
										v-for="location in configs.locations" 
										::value="location.value"
										:selected="location.selected"
									>
										{{location.text}}
									</option>
								</select>
							</li>
							<li class="f-right half-width ">
								<label for="">&nbsp;</label>
								<input 
									type="text" 
									placeholder="Enter other location" 
									:class="{'disabled-input':configs.other_locations_disabled.lunch_schedule_location}" 
									:disabled="configs.other_locations_disabled.lunch_schedule_location"
									v-model="settings.lunch_schedule_other_location"
								>
							</li>
						</ul>
						<ul class="clearfix">
							<li class="f-left half-width">
								<label for="">Lunch Break  <span class="f-right">( Please take note that travel time should be included )</span></label>
								<flat-pickr 
									v-model="settings.lunch_schedule_start_time" 
									:class="{time:true}"
									:config="configs.time"
								>
								</flat-pickr>
							</li>
							<li class="f-right half-width ">
								<label for="">&nbsp;</label>
								<flat-pickr 
									v-model="settings.lunch_schedule_end_time" 
									:class="{time:true}"
									:config="configs.time"
								>
								</flat-pickr>
							</li>
						</ul>
						<ul class="clearfix rental-daily">
							<li class="f-left">
								<label for="">Repeat Days</label>
								<div class="check">
									<span v-for="day in configs.days">
										<div class="checkbox">
											<input 
												type="checkbox" 
												:id="day.value"
												:value="day.value"
												v-model="settings.lunch_schedule_repeat_days"
											>
											<span></span>
										</div>
										<p>{{day.text}}</p>
									</span>
								</div>
							</li>
						</ul>
					</div>
					<div class="form-holder morning-sched afternoon-sched">
						<div class="inner-title">
							<h3>Afternoon Schedule</h3>
						</div>
						<ul class="clearfix">
							<li class="f-left half-width">
								<label for="">Afternoon Location  </label>
								<select 
									class="" 
									v-model="settings.afternoon_schedule_location"
									@change="setOtherLocation(settings.afternoon_schedule_location, 'afternoon_schedule_location', 'afternoon_schedule_other_location')"
								>
									<option 
										v-for="location in configs.locations" 
										::value="location.value"
										:selected="location.selected"
									>
										{{location.text}}
									</option>
								</select>
							</li>
							<li class="f-right half-width ">
								<label for="">&nbsp;</label>
								<input 
									type="text" 
									placeholder="Enter other location" 
									:class="{'disabled-input':configs.other_locations_disabled.afternoon_schedule_location}" 
									:disabled="configs.other_locations_disabled.afternoon_schedule_location"
									v-model="settings.afternoon_schedule_other_location"
								>
							</li>
						</ul>
						<ul class="clearfix">
							<li class="f-left half-width">
								<label for="">Afternoon Break  <span class="f-right">( Please take note that travel time should be included )</span></label>
								<flat-pickr 
									v-model="settings.afternoon_schedule_start_time" 
									:class="{time:true}"
									:config="configs.time"
								>
								</flat-pickr>
							</li>
							<li class="f-right half-width ">
								<label for="">&nbsp;</label>
								<flat-pickr 
									v-model="settings.afternoon_schedule_end_time" 
									:class="{time:true}"
									:config="configs.time"
								>
								</flat-pickr>
							</li>
						</ul>
						<ul class="clearfix rental-daily">
							<li class="f-left">
								<label for="">Repeat Days</label>
								<div class="check">
									<span v-for="day in configs.days">
										<div class="checkbox">
											<input 
												type="checkbox" 
												:id="day.value"
												:value="day.value"
												v-model="settings.afternoon_schedule_repeat_days"
											>
											<span></span>
										</div>
										<p>{{day.text}}</p>
									</span>
								</div>
							</li>
						</ul>
					</div>
					<div class="btn-holder">
						<button  class="btn btn-blue" @click.prevent="saveCalendarSettings">Save and Update</button>
						<a href="/account/professional#/view" class="btn btn-violet-bright">View my Calendar</a>
						<!-- <p>*Note for the programmer. View my profile button will show up after clicking save and update button</p> -->
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	import flatPickr from 'vue-flatpickr-component'
  	import 'flatpickr/dist/flatpickr.css'
	export default {
		data() {
			return {
				user_id: userId,
				is_loading: true,
				settings: {
					id:0,
					professional_id:userId,
					today_schedule_start_time:'',
					today_schedule_end_time:'',
					duration: 15,

					morning_schedule_location:'',
					morning_schedule_other_location:'',
					morning_schedule_start_time:'',
					morning_schedule_end_time:'',
					morning_schedule_repeat_days:[],

					lunch_schedule_location:'',
					lunch_schedule_other_location:'',
					lunch_schedule_start_time:'',
					lunch_schedule_end_time:'',
					lunch_schedule_repeat_days:[],

					afternoon_schedule_location:'',
					afternoon_schedule_other_location:'',
					afternoon_schedule_start_time:'',
					afternoon_schedule_end_time:'',
					afternoon_schedule_repeat_days:[],
				},
				configs: {
					date: {
						dateFormat: 'm/d/Y'
					},
					time: {
						noCalendar: true,
						enableTime: true,
						dateFormat: 'h:i K'
					},
					keepOpen: true,
					locations: [
						{value: 'Choose Location', text: 'Choose Location', selected: true},
						{value: 'Pending location', text: 'Pending location', selected: false},
						{value: 'I come to you', text:'I come to you', selected: false},
						{value: 'My Home Salon', text:'My Home Salon', selected: false},
						{value: 'Not Working Right Now', text:'Not Working Right Now', selected: false},
						{value: 'Saved Rental Address', text:'Saved Rental Address', selected: false},
						{value: 'Address 1', text:'Address 1', selected: false},
						{value: 'Address 2', text:'Address 2', selected: false},
						{value: 'Choose other location', text:'Choose other location', selected: false},
					],
					days: [
						{value: 'Mon', text:'Mon', checked: false},
						{value: 'Tue', text:'Tue', checked: false},
						{value: 'Wed', text:'Wed', checked: false},
						{value: 'Thu', text:'Thu', checked: false},
						{value: 'Fri', text:'Fri', checked: false},
						{value: 'Sat', text:'Sat', checked: false},
						{value: 'Sun', text:'Sun', checked: false},
					],
					other_locations_disabled: {
						morning_schedule_location: true,
						lunch_schedule_location: true,
						afternoon_schedule_location: true,
					}
				},
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
			this.fetchSettings();
		},

		watch: {
			'$route':'fetchSettings'
		},

		components: {
			flatPickr,
		},

		methods: {

			setOtherLocation(location_value, location_key, other_location_key){
				this.settings[other_location_key] = '';
				this.configs.other_locations_disabled[location_key] = !(location_value == 'Choose other location');
			},

			setOtherLocations() {
				const vm = this;
				[
					{key: 'morning_schedule_location', other_key:'morning_schedule_other_location'},
					{key: 'lunch_schedule_location', other_key: 'lunch_schedule_other_location'},
					{key: 'afternoon_schedule_location', other_key: 'afternoon_schedule_other_location'}
				].forEach((location)=>{
					vm
						.setOtherLocation(
							vm.settings[location.key],
							location,
							location.other_key
						);
				});
			},

			fetchSettings(){
				const vm = this;
					axios
						.get(
							apiBaseUrl + 'rest/professionals/'+this.user_id+'/calendar-settings',
						)
						.then((response)=>{
							console.log(response.data);
							vm.settings = response.data;
							vm.is_loading = false;
							vm.setOtherLocations();
						},(error)=>{
							vm.$toastr('error', 'Something went wrong. Please try again later.', 'General Calendar Settings');
						});
			},
			saveCalendarSettings(){
				const vm = this;
					axios
						.post(
							apiBaseUrl + 'rest/professionals/'+this.user_id+'/calendar-settings',
							{
								settings: vm.settings
							}
						)
						.then((response)=>{
							console.log(response.data);
							vm.$toastr('success', 'General calendar settings successfully updated.', 'General Calendar Settings Update');
						},(error)=>{
							vm.$toastr('error', 'Something went wrong. Please try again later.', 'General Calendar Settings');
						});
			}
		}
	}
</script>