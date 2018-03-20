<template>
	<div class="content-container app-client-req-details help-req req-release">
		<div class="inner-title">
			<h3>Help Request Applied Details</h3>
		</div>
		<div class="request-details">
			<Loader
				v-if="application.is_loading"
			>	
			</Loader>
			<div 
				class="clearfix title-details"
				v-if="application.item != null"
			>
				<div class="f-left">
					<p><span>User Types </span>{{application.item.posted_help_request.category_csv}}</p>
					<h3>{{application.item.posted_help_request.title}} </h3>
					<label for=""><span>Posted</span> <!-- Today10/26/2017 -->{{application.item.posted_help_request.created_at}}</label>
				</div>
				<div class="f-right">
					<p>Budget</p>
					<h5>${{application.item.posted_help_request.weekly_total}}</h5>
				</div>
			</div>
			<div class="content">
				<p>{{application.item.posted_help_request.description}} </p>
			</div>
			<div class="sched-requirement">
				<div class="schedule">
					<ul>
						<li>
							<h5>Schedule</h5>
							<p>Daily</p>
						</li>
						<li>
							<h5>Days</h5>
							<p>Sun Mon</p>
						</li>
						<li>
							<h5>Desired Start Date</h5>
							<p><i class="fa fa-calendar" aria-hidden="true"></i> {{application.item.posted_help_request.start_date}}</p>
						</li>
						<li>
							<h5>Desired End Date</h5>
							<p><i class="fa fa-calendar" aria-hidden="true"></i> {{application.item.posted_help_request.end_date}}</p>
						</li>
						<li>
							<h5>Desired Start Time</h5>
							<p> <i class="fa fa-clock-o" aria-hidden="true"></i> {{application.item.posted_help_request.start_time}}</p>
						</li>
						<li>
							<h5>Desired End Time</h5>
							<p> <i class="fa fa-clock-o" aria-hidden="true"></i>  {{application.item.posted_help_request.end_time}}</p>
						</li>
						<li>
							<h5>Address</h5>
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  {{application.item.posted_help_request.full_address}}</p>
						</li>
					</ul>
				</div>
				<div class="requirements">
					<h3>Requirements</h3>
					<ul v-if="application.item.posted_help_request.service_options_decoded.length > 0">
						<li
							v-for="service_option in application.item.posted_help_request.service_options_decoded"
							>
								{{service_option}}
							</li>
						<!-- <li>Must perform service in salon</li>
						<li>No partial payment fir this listing</li>
						<li>Must be licesed</li> -->
					</ul>
					<p
						v-if="!application.item.posted_help_request.service_options_decoded.length"
					>
						No service options available.
					</p>
				</div>
				</div>
				<div class="pro-details">
					<div class="status">
						<i class="fa fa-check" aria-hidden="true"></i>
						<label for="">Hired</label>
						<hr class="f-right">
					</div>
					<div class="pro-holder">
						<div class="img-holder">
							<div class="img-over">
								<img src="/frontsite/images/pro2.jpg" alt="">
							</div>
							<a href="#" class="btn btn-red-b">See Profile</a>
						</div>
						<div class="information">
							<h3>Jessica Mathew</h3>
							<p>Square Town, Square City, Colorado - CO, 11010</p>
							<div class="rating">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
							</div>
						</div>
						<div class="description">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit .esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat </p>
						</div>
					</div>
					<div class="payment">
						<ul>
							<li class="clearfix">
								<p class="f-left">Amount</p>
								<p class="f-right">Status</p>
							</li>
							<li class="clearfix">
								<p class="f-left">$10.00</p>
								<p class="f-right"><span>Released</span></p>
							</li>
							<li class="clearfix">
								<p class="f-left">$90.00</p>
								<p class="f-right pending">Pending</p>
							</li>
						</ul>
						<p class="total">Total: $100.00</p>
					</div>
				</div>
				<div class="cancellation">
					<p>See <a href="#">Cancellation</a> and <a href="#">Refund Policy</a>.</p>
				</div>
				<div class="btn-holder write-review">
					<a href="#" class="btn btn-red-b" @click.prevent="alert('FEATURE UNDER DEVELOPMENT')">CANCEL SERVICE</a>
					<a href="#" class="btn btn-red-b" @click.prevent="alert('FEATURE UNDER DEVELOPMENT')">REQUEST RELEASE</a>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
	    data() {
	      return {
	        application: {
	          item: null,
	          is_loading: false,
	        },
	      }
	    },
	    mounted() {
	      $( ".sort-link" ).click(function() {
	        $( ".sort" ).slideToggle( "slow", function() {});
	      });
	    },
	    created() {
	      this.fetchApplication();
	    },
	    '$route': 'fetchApplication',
	    methods: {
	    	setPage(page) {
	    		this.application.current_page = page;
	    		this.fetchApplication();
	    	},
	      fetchApplication() {
	        const vm = this;
	          axios
	          .get(
	            apiBaseUrl + 'rest/professionals/'+userId+'/owner/posted-help-requests/applications/' + vm.$route.params.id
	          )
	          .then((response)=>{
	            const data = response.data;
	            vm.application.item = data;
	            vm.application.is_loading = false;
	          }, (error)=>{
	            vm.application.is_loading = false;
	            vm.$toastr('error', 'Something went wrong. Please try again later.', 'Applied Help Requests List');
	          });
	      },
	    }
	}
</script>