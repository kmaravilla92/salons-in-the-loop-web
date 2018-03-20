<template>
	<div class="content-container acct-settings my-services">
		<div class="inner-title">
			<h3>Account Settings
				<span class="f-right">All fields marked with an asterisk (*) are required.</span>
			</h3>
		</div>
		<Loader
			v-if="is_loading"
			text="LOADING RECENT POSTED REQUESTS ..."
		>	
		</Loader>
		<div class="form-holder" v-show="!is_loading">
			<ul>
				<li>
					<div class="col service-name">
						<p>Product or Service</p>
					</div>
					<div class="col estimate-time">
						<p>Estimate time duration</p>
					</div>
					<div class="col visib t-center">
						<p>Visibility</p>
					</div>
					<div class="col price t-center">
						<p>Price</p>
					</div>
				</li>
				<li 
					v-for="(service, index) in services"
					:key="index"
				>
					<div class="col service-name">
						<input type="text"  v-model="service.service_name" required>
					</div>
					<div class="col estimate-time">
						<input type="number"  v-model="service.duration">
						<label for="">min</label>
					</div>
					<div class="col visib">
						<div class="onoff">

							<div class="onoffswitch">
							    <!-- <input 
									type="checkbox" 
									name="onoffswitch" 
									class="onoffswitch-checkbox" 
									id="myonoffswitch"
									v-model="service.status"
								> -->
								<input 
									type="checkbox" 
									name="onoffswitch" 
									id="myonoffswitch"
									v-model="service.status"
								>
								{{service.status ? 'ON' : 'OFF'}}
							    <!-- <label class="onoffswitch-label" for="myonoffswitch">
							        <span class="onoffswitch-inner"></span>
							        <span class="onoffswitch-switch"></span>
							    </label> -->
							</div>
						</div>
					 </div>
					<div class="col price">
						<label for=""><i class="fa fa-usd" aria-hidden="true"></i></label>
						<input type="number"  v-model="service.price">
					</div>
					<a 
						href="#" 
						class="del-link middle-div" 
						@click.prevent="removeService(index)">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a>
				</li>
				
			</ul>
			<div class="add-field clearfix">
				<a 
					href="#" 
					class="f-right"
					@click.prevent="addService"
				><i class="fa fa-plus" aria-hidden="true"></i> Add another </a>
			</div>
		</div>
		<div class="btn-holder" v-show="!is_loading">
			<p><span>Note:</span> Save changes before you view!</p>
			<br>
			<a 
				href="#"
				class="btn btn-blue"
				@click.prevent="saveServices"
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

<script>
	import axios from 'axios';
	export default {
		data() {
			return {
				user_id: userId,
				is_loading: true,
				services: [

				]
			}
		},

		created() {
			this.fetchServices();
		},

		watch: {
			'$route': 'fetchServices'
		},

		methods: {
			fetchServices() {
				var vm = this;
				axios
					.get(apiBaseUrl + 'rest/users/'+userId+'/services')
					.then(function(response){
						vm.services = response.data;
						vm.is_loading = false;
					});
			},

			addService() {
				this.services.push({
					professional_id: userId,
					service_name: 'Service name here',
					duration: 0,
					status: false,
					price: 0
				});
			},

			saveServices() {
				var vm = this;
				axios
					.post(apiBaseUrl + 'rest/users/'+userId+'/services', {
						services: vm.services
					})
					.then((response)=>{
						if(response.data.success){
							vm.services = response.data.services;
							vm.$toastr('success', 'Services successfully updated.', 'Services Update');
						}
					},(error)=>{
						vm.$toastr('error', 'Something went wrong. Please try again later.', 'Services Update');
					});
			},

			removeService(index) {
				this.$delete(this.services, index);
			},
		}
	}
</script>