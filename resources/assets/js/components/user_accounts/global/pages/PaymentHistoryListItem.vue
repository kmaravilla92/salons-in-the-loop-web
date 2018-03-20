<template>
	<li>
		<div class="col project-name">
			<a href="#">{{ payment.title }}</a>
		</div>
		<div class="col date">
			<p>{{ payment.date }}</p>
		</div>
		<div class="col amount">
			<h3>$ {{ payment.amount }}</h3>
		</div>
		<div class="col status">
			<p class="pending" v-if="payment.status == 1">PENDING</p>
			<p class="transferred" v-if="payment.status == 2">Transferred <i class="fa fa-check" aria-hidden="true"></i> </p>
			<a 
				href="#" 
				class="btn btn-blue-b" 
				v-if="payment.status == 0" 
				@click.prevent="releaseFund"
			> 
				Release Fund
			</a>
		</div>
	</li>
</template>

<script>
	import axios from 'axios';

	export default {
		props: ['payment'],
		methods: {
			releaseFund() {
				const vm = this;
				axios.put(apiBaseUrl + 'rest/payment-history/' + this.payment.id, {
					status: '1'
				}).then(function(response) {
					vm.payment.status = 1;	
				}, function(error) {
					console.log('error', error);
					alert('Something went wrong. Please try again later.');
				});
			}
		}
	}
</script>