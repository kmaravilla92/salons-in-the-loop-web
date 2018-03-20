<template>
	<div class="salon-pro dashboard dashboard-owner">
		<section id="main-wrapper" class="inner client-bg pro-calendar book-rental create-space request-near name-my" style="padding-bottom: 479px;">
			<div class="title-holder clearfix">
				<div class="wrapper">
					<h3>Name My Own Price</h3>
				</div>
			</div>
			<div class="wrapper">
				<div class="calendar-container book-payment">
					<div class="title-container clearfix">
						<p class="f-left">Pre- payment From your Request</p>
						<a href="#" class="f-right">back to <span>Request for my nearby info</span></a>
					</div>
					<div class="content-holder">
						<div class="red-note">
							Paying the amount on this site represents an agreement to pay the amount listed for the services described in this request.  You may cancel if you choose not to hire a professional listed in your posting details.
							<h3>Total Payment : ${{name_my_own_price.budget}}</h3>
						</div>
						<PaymentForm
							:payment_details="payment_details"
							@paymentTypeSet="setPaymentType"
						>
						</PaymentForm>
					</div>
					<div class="total-container total-amt clearfix">
						<div class="book-btn btn-holder">
							<a href="#" class="btn btn-blue" @click.prevent="sendPrePayment">Apply Pre payment</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</template>

<script>
	import axios from 'axios'
	export default {
		props: ['name_my_own_price'],
		data(){
			return {
				user_id: userId,
				payment_type: 'paypal_checkeout',
				payment_details: {
					title: 'Name My Own Price Payment',
					description: 'Name My Own Price Payment',
					amount: 0,
					cc_type: '',
					cc_number: '',
					cc_exp_month: '',
					cc_exp_year: '',
					cc_exp_security: '',
					cc_first_name: '',
					cc_last_name: '',
					success_url: '/account/client#/name-my-own-price/'+this.$route.params.id+'/pre-payment',
					fail_url: '/account/client#/name-my-own-price/'+this.$route.params.id+'/pre-payment'
					// success_url: '/account/client#/name-my-own-price/'+name_my_own_price.id+'/pre-payment',
					// fail_url: '/account/client#/name-my-own-price/'+name_my_own_price.id+'/pre-payment'
				}
			}
		},

		mounted() {},

		destroyed() {},
		
		created() {
			this.paid();
		},

		watch: {
			'$route': 'paid'
		},

		components: {},

		methods: {
			setPaymentType(payment_type) {
				this.payment_type = payment_type;
			},
			sendPrePayment(details) {
				const vm = this;
				vm.payment_details.amount = this.name_my_own_price.budget;
				axios
					.post(
						apiBaseUrl + 'rest/payments', {
							payment_type: vm.payment_type,
							payment_details: vm.payment_details
						}
					)
					.then((response)=>{
						const data = response.data;
						console.log(data);
						if(data.success){
							if(data.approval_url){
								location.href = data.approval_url;
							}else{
								vm.goToComplete();
							}
						}
					},(error)=>{
						vm.$toastr('error', 'Something went wrong. Please try again later.', 'Name My Own Price Pre Payment');
					});
			},
			goToComplete() {
				this.$parent.$router.push({
					name: 'client.name-my-own-price.complete',
					params: {
						id: this.$route.params.id
					}
				});
			},
			paid() {
				if(location.href.indexOf('paymentId') >- 1){
					this.goToComplete();
				}
			}
		}
	}
</script>