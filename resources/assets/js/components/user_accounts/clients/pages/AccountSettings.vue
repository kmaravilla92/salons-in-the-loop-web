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