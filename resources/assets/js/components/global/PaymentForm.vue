<template>
	<div class="accordion-payment">
		<h3 @click.prevent="setPaymentType('paypal_checkeout')">Paypal</h3>
		<div class="accord-holder">
			<ul class="form-holder">
				<li>
					<img src="/frontsite/images/PayPal-logo.png" alt="/frontsite/images/PayPal-logo.png">
				</li>
			</ul>
		</div>
		<h3 @click.prevent="setPaymentType('paypal_credit_card')">Credit Card</h3>
		<div class="accord-holder">
			<img src="/frontsite/images/card-ico2.png" alt="">
			<ul class="form-holder">
				<li>
					<label for="">First Name</label>
					<input type="text" name="" value="" v-model="payment_details.cc_first_name">
				</li>
				<li>
					<label for="">Last Name</label>
					<input type="text" name="" value="" v-model="payment_details.cc_last_name">
				</li>
				<li>
					<label for="">Card Type</label>
					<select name="" id="" v-model="payment_details.cc_type">
						<option value="visa">VISA</option>
						<option value="amex">AMEX</option>
						<option value="mastercard">MASTER CARD</option>
						<option value="discover">DISCOVER</option>
					</select>
				</li>
				<li>
					<label for="">Card Number</label>
					<input type="text" name="" value="" v-model="payment_details.cc_number">
				</li>
				<li class="clearfix expi">
					<label for="" class="f-left">Expiration Date</label>
					<label for="" class="f-right">Security Code <i class="fa fa-question-circle" aria-hidden="true" style="color:#4f81bb;"></i></label>
					<div class="clearfix"></div>
					<input type="text" name="" value="" placeholder="Month" class="f-left width-33 expi-inp" v-model="payment_details.cc_exp_month">
					<input type="text" name="" value="" placeholder="Year" class="f-left width-33 expi-inp year" v-model="payment_details.cc_exp_year">
					<input type="text" name="" value="" placeholder="Code" class="f-left width-33 code" v-model="payment_details.cc_exp_security">
				</li>
			</ul>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['payment_details'],
		data(){
			return {
				payment_type: 'paypal_checkeout', //paypal_credit_card
			}
		},
		mounted() {
			$(".accordion-payment").accordion();
		},
		methods: {
			setPaymentType(payment_type){
				this.$emit('paymentTypeSet', payment_type);
			},
		}
	}
</script>