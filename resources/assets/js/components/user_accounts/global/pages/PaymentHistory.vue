<template>
	<div class="content-container acct-settings">
		<div class="inner-title">
			<h3>Payment History
				<div class="sort-holder f-right">
					<a class="sort-link">Sort by  <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
					<ul class="sort">
						<li><a href="#" @click.prevent="setFilter('all')">All</a></li>
						<li><a href="#" @click.prevent="setFilter('pending')">Pending</a></li>
						<li><a href="#" @click.prevent="setFilter('transferred')">Transferred</a></li>
					</ul>
				</div>
			</h3>
		</div>
		<div class="payment-histo">
			<ul>
				<li>
					<div class="col project-name">

					</div>
					<div class="col date">
						<p>Date</p>
					</div>
					<div class="col amount">
						<p>Amount</p>
					</div>
					<div class="col status">
						<p>Status</p>
					</div>
				</li>
				<PaymentHistoryListItem
					v-for="(payment, index) in filteredPayments"
					:key="index"
					:payment="payment"
				>
				</PaymentHistoryListItem>
			</ul>
		</div>
		<div class="pagination-holder clearfix" v-if="payments.length > 10">
			<div class="pagination f-right">
				<a href="#">First</a>
				<a href="#">Previous</a>
				<a href="#">1</a>
				<a href="#">2</a>
				<a href="#">3</a>
				<a href="#">Next</a>
				<a href="#">Last</a>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios';
	import PaymentHistoryListItem from './PaymentHistoryListItem.vue';

	var filters = {
		all(payment) {
			return true;
		},

		pending(payment) {
			return payment.status == '1';
		},

		transferred(payment) {
			return payment.status == '2';
		}
	}

	export default {
		data() {
			return {
				payments: [],
				filter: 'all'
			}
		},

		components: {
			'PaymentHistoryListItem' : PaymentHistoryListItem
		},

		computed: {
			filteredPayments() {
				return this.payments.filter(filters[this.filter]);
			}
		},

		created() {
			this.fetchPayments()
		},

		watch: {
			'$route': 'fetchPaymentHistory'
		},

		methods: {
			fetchPayments() {
				axios
					.get('http://api.sitl.dev/v1/rest/users/'+userId+'/payment-history')
					.then(function(resp){
						this.payments = resp.data.data;
					}.bind(this));
			},

			setFilter(filter) {
				this.filter = filter;
			}
		},

		mounted() {
			$('#main-wrapper').addClass('payment-info');
			$( ".sort-link" ).click(function() {
				$( ".sort" ).slideToggle( "slow", function() {
					// Animation complete.
				});
			});
		}
	}
</script>