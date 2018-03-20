<template>
	<div class="content-container acct-settings">
		<div class="inner-title">
			<h3>Card Information</h3>
		</div>
		<div class="form-holder">
			<ul>
				<li>
					<label for="">Name On Card</label>
					<input type="text" placeholder="" v-model="payment_info.card_info.cc_name">
				</li>
				<li>
					<label for="">Card Number</label>
					<input type="text" placeholder="" v-model="payment_info.card_info.cc_number">
				</li>
				<li class="clearfix expi">
					<label for="" class="f-left">Expiration Date</label>
					<label for="" class="f-right">Security Code <i class="fa fa-question-circle" aria-hidden="true" style="color:#4f81bb;"></i></label>
					<div class="clearfix"></div>
					<input type="text" placeholder="Month" class="f-left width-33 expi-inp" v-model="payment_info.card_info.cc_exp_month">
					<input type="text" placeholder="Year" class="f-left width-33 expi-inp year" v-model="payment_info.card_info.cc_exp_year">
					<input type="text" placeholder="Code" class="f-left width-33 code" v-model="payment_info.card_info.cc_sec_code">
				</li>
				<li>
					<label for="">Credit Card Type</label>
					<input type="text" placeholder="" v-model="payment_info.card_info.cc_type">
				</li>
			</ul>
			<input 
				type="submit" 
				name="" 
				value="SAVE" 
				class="btn btn-blue btn-slim"
				@click.prevent="savePaymentInfo(payment_info)"
			>
		</div>
		<br><br>
		<div class="inner-title">
			<h3>Billing Address</h3>
		</div>
		<div class="form-holder">
			<ul>
				<li>
					<label for="">Address (Street,  house, apt)</label>
					<input type="text" placeholder="" v-model="payment_info.billing_address.billing_address">
				</li>
				<li>
					<label for="">City / Town</label>
					<input type="text" v-model="payment_info.billing_address.billing_city">
				</li>
				<li>
					<label for="">Postal</label>
					<input type="text" v-model="payment_info.billing_address.billing_postal">
				</li>
				<li>
					<label for="">State / Province</label>
					<input type="text" v-model="payment_info.billing_address.billing_state">
				</li>
				<li>
					<label for="">Country</label>
					<input type="text" v-model="payment_info.billing_address.billing_country">
					<!-- select class="" name="">
						<option value=""></option>
					</select> -->
				</li>
			</ul>
			<input 
				type="submit" 
				value="SAVE" 
				class="btn btn-blue btn-slim"
				@click.prevent="savePaymentInfo(payment_info)"
			>
		</div>
		<br><br>

	</div>
</template>

<script>
	import axios from 'axios';
	export default {
		data(){
			return {
				payment_info: {
					card_info: {
						cc_name: '',
						cc_number: '',
						cc_exp_month: '',
						cc_exp_year: '',
						cc_sec_code: '',
						cc_type: '',
					},
					billing_address: {
						billing_address: '',
		        billing_city: '',
		        billing_postal: '',
		        billing_state: '',
		        billing_country: '',
					}
				}
			}
		},

		created() {
			this.fetchPaymentInfo();
		},

		watch: {
			'$route' : 'fetchPaymentInfo'
		},

		methods: {
			fetchPaymentInfo() {
				var vm = this;
					axios
						.get(apiBaseUrl + 'user/payment-info', {
							params: {
								user_id: userId
							}
						})
						.then(function(response) {
							vm.payment_info = response.data;
						});
			},

			savePaymentInfo(payment_info) {
				axios
					.put(apiBaseUrl + 'user/payment-info', {
						user_id: userId,
						payment_info: payment_info
					})
					.then(function(response) {
						if(response.data.success){
							alert('Payment Info successfully saved!');
						}
					});
			}
		},

		mounted() {
			$('#main-wrapper').addClass('payment-info');
		}
	}
</script>