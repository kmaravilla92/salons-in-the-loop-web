<template>
	<div class="content-container acct-settings">
		<div class="inner-title">
			<h3>Account Settings</h3>
		</div>
		<div class="form-holder">
			<h3>Change Email Address / Username</h3>
			<p>This is the email address you’ll use to log in to Salons in the loop.</p>
			<ul>
				<li>
					<label for="">Login Email Address</label>
					<input type="email" name="" v-model="settings_x.change_email.email" placeholder="Email@info.com">
				</li>
				<li>
					<span>Type your password to verify ownership of this account.</span>
					<label for="">Current Password</label>
					<input type="password" name="" v-model="settings_x.change_email.current_password">
				</li>
			</ul>
			<input type="submit" name="" value="UPDATE EMAIL ADDRESS" class="btn btn-blue btn-slim" v-on:click="saveEmail()">
		</div>
		<hr>
		<div class="form-holder">
			<h3>Change Password</h3>
			<ul>
				<li>
					<label for="">Current Password</label>
					<input type="password" name="" v-model="settings_x.change_password.current_password" placeholder="">
				</li>
				<li>
					<label for="">New Password</label>
					<input type="password" name="" v-model="settings_x.change_password.new_password">
				</li>
				<li>
					<label for="">Confirm New Password</label>
					<input type="password" name="" v-model="settings_x.change_password.new_password_confirmation">
				</li>
			</ul>
			<input type="submit" name="" value="UPDATE PASSWORD" class="btn btn-blue btn-slim" v-on:click="savePassword()">
		</div>
		<br><br>
		<div class="inner-title">
			<h3>Notification Settings</h3>
		</div>
		<div class="noti-setting">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit .</p>
			<div class="onoff">
				<p>On/Off Notification</p>
				<div class="onoffswitch">
			    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
			    <label class="onoffswitch-label" for="myonoffswitch">
			        <span class="onoffswitch-inner"></span>
			        <span class="onoffswitch-switch"></span>
			    </label>
				</div>
			</div>
		</div>
		<div class="inner-title">
			<h3>Waiting List  Time Slot</h3>
		</div>
		<div class="noti-setting">
			<p>Customers can sign a waiting list instead of booking an appointment and book the set amount of time to the current day’s calendar in the available time slot. Duration setting</p>
			<div class="onoff">
				<p>On/Off Notification</p>
				<div class="onoffswitch">
			    <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch2" checked>
			    <label class="onoffswitch-label" for="myonoffswitch">
			        <span class="onoffswitch-inner"></span>
			        <span class="onoffswitch-switch"></span>
			    </label>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios';
	
	export default {
		props: ['settings'],

		data(){
			return {
				settings_x: this.settings
			}
		},

		mounted() {
            console.log('Component mounted.')
        },

        created(){
        	// console.log(this.settings);
        	this.getAccountSettings();
        },

		watch: {
			// call again the method if the route changes
			'$route': 'getAccountSettings'
		},

        methods: {
        	
        	getAccountSettings(){
        		axios.get(apiBaseUrl + 'user/account-settings', {
        			params: {
	        			id: userId
	        		}
        		})
        		.then(function(resp){
        			this.settings_x = resp.data;
        		}.bind(this))
        	},

        	saveEmail(){
	        	axios.post(apiBaseUrl + 'user/change-email', this.settings_x.change_email)
	        		.then(function(resp) {
	        			if(resp.data.messages.length > 0){
	        				let messages = resp.data.messages.join("\n");
	        				alert(messages);
	        			}
	        		});
	        },

	        savePassword(){
	        	axios.post(apiBaseUrl + 'user/change-password', this.settings_x.change_password)
	        		.then(function(resp) {
	        			if(resp.data.messages.length > 0){
	        				let messages = resp.data.messages.join("\n");
	        				alert(messages);
	        			}
	        		});
	        }
        }
	}
</script>