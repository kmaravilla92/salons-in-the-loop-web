<template>
	<div class="content-container app-client-req-details app-req-listing">
		<div class="inner-title">
			<h3>My Posted Requests
			</h3>

		</div>
		<div class="request-details">
			<ul>
				<li>
					<div class="clearfix title-details">
						<div class="f-left">
							<p><span>User Types </span>Barber, Hair Stylist,...</p>
							<h3>Accusata complectitur at duo </h3>
							<label for=""><span>Posted</span> Today10/26/2017</label>
						</div>
						<div class="f-right">
							<p>Budget</p>
							<h5>$100.00</h5>
						</div>
					</div>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
					</div>
					<div class="content-listing">
						<div class="info">
							<p><i class="fa fa-calendar" aria-hidden="true"></i> 10/26/2017</p>
							<p><i class="fa fa-clock-o" aria-hidden="true"></i>  11:15 pm</p>
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  Complete address goes here, Los Angeles, CA</p>
						</div>
						<div class="pro-applied">
							<label for="">50</label>
							<p> Professionals Applied</p>
						</div>
						<div class="btn-holder">
							<a href="#" class="btn btn-blue">SEE DETAILS</a>
						</div>
					</div>
				</li>
				<li>
					<div class="clearfix title-details">
						<div class="f-left">
							<p><span>User Types </span>Barber, Hair Stylist,...</p>
							<h3>Accusata complectitur at duo </h3>
							<label for=""><span>Posted</span> Today10/26/2017</label>
						</div>
						<div class="f-right">
							<p>Budget</p>
							<h5>$100.00</h5>
						</div>
					</div>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
					</div>
					<div class="content-listing">
						<div class="info">
							<p><i class="fa fa-calendar" aria-hidden="true"></i> 10/26/2017</p>
							<p><i class="fa fa-clock-o" aria-hidden="true"></i>  11:15 pm</p>
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  Complete address goes here, Los Angeles, CA</p>
						</div>
						<div class="pro-applied">
							<label for="">50</label>
							<p> Professionals Applied</p>
						</div>
						<div class="btn-holder">
							<a href="#" class="btn btn-blue">SEE DETAILS</a>
						</div>
					</div>
				</li>
				<li>
					<div class="clearfix title-details">
						<div class="f-left">
							<p><span>User Types </span>Barber, Hair Stylist,...</p>
							<h3>Accusata complectitur at duo </h3>
							<label for=""><span>Posted</span> Today10/26/2017</label>
						</div>
						<div class="f-right">
							<p>Budget</p>
							<h5>$100.00</h5>
						</div>
					</div>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
					</div>
					<div class="content-listing">
						<div class="info">
							<p><i class="fa fa-calendar" aria-hidden="true"></i> 10/26/2017</p>
							<p><i class="fa fa-clock-o" aria-hidden="true"></i>  11:15 pm</p>
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  Complete address goes here, Los Angeles, CA</p>
						</div>
						<div class="pro-applied">
							<label for="">50</label>
							<p> Professionals Applied</p>
						</div>
						<div class="btn-holder">
							<a href="#" class="btn btn-blue">SEE DETAILS</a>
						</div>
					</div>
				</li>
				<li>
					<div class="clearfix title-details">
						<div class="f-left">
							<p><span>User Types </span>Barber, Hair Stylist,...</p>
							<h3>Accusata complectitur at duo </h3>
							<label for=""><span>Posted</span> Today10/26/2017</label>
						</div>
						<div class="f-right">
							<p>Budget</p>
							<h5>$100.00</h5>
						</div>
					</div>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
					</div>
					<div class="content-listing">
						<div class="info">
							<p><i class="fa fa-calendar" aria-hidden="true"></i> 10/26/2017</p>
							<p><i class="fa fa-clock-o" aria-hidden="true"></i>  11:15 pm</p>
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>  Complete address goes here, Los Angeles, CA</p>
						</div>
						<div class="pro-applied">
							<label for="">50</label>
							<p> Professionals Applied</p>
						</div>
						<div class="btn-holder">
							<a href="#" class="btn btn-blue">SEE DETAILS</a>
						</div>
					</div>
				</li>
			</ul>
			<div class="pagination-holder clearfix">
				<div class="f-left">
					<p>Showing 8 out of 8 of My Posted Requests</p>
				</div>
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
	</div>
</template>
<script>
	export default {
		data() {
			return {
				is_loading: true,
				posted_requests: {
					statistics: {
						new: 0
					},
					listings: {
						recent: []
					}
				}
			}
		},
		created() {
			this.fetchData();
		},
		watch: {
			'$route': 'fetchData'
		},
		methods: {
			fetchData() {
				var vm = this;
				setTimeout(function(){
					vm.posted_requests.statistics.new = 90;
					vm.posted_requests.listings.recent = [
						{id: 1},{id: 2},{id: 3},{id: 4},{id: 5}
					];
					vm.is_loading = false;
				},2000);
			}
		}
	}
</script>