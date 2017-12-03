<template>
	<div class="content-container">
		<div class="menu-content">
			<div class="inner-title">
				<h3>What Would you like to do?</h3>
			</div>
			<ul>
				<li>
					<router-link :to="{ name: 'professional.clients-posted-requests-search' }">
						<div class="img-holder">
							<img src="/frontsite/images/search-ico.png" alt="">
						</div>
						<p class="ease">Search <br> Client’s Request</p>
					</router-link>
				</li>
				<li>
					<a href="#">
						<div class="img-holder">
							<img src="/frontsite/images/search-ico.png" alt="">
						</div>
						<p class="ease">Search <br> Help Request</p>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="img-holder">
							<img src="/frontsite/images/search-ico.png" alt="">
						</div>
						<p class="ease">Search <br> For Rentals</p>
					</a>
				</li>

				<li>
					<a href="#">
						<div class="img-holder">
							<img src="/frontsite/images/rental-ico.png" alt="">
						</div>
						<br>
						<p class="ease">My Rentals</p>
					</a>
				</li>
				<li>

					<a href="#">
						<div class="noti-count ease">
							<p>16</p>
						</div>
						<div class="img-holder">
							<img src="/frontsite/images/appointment-ico.png" alt="">
						</div>
						<p class="ease">Client <br> Appointments</p>
					</a>
				</li>
			</ul>
		</div>

		<div class="clearfix">
			<div class="width-70 f-left listing-left">
				<div class="inner-title">
					<h3>Recent Client Request Applied <a href="#" class="f-right">SEE ALL</a></h3>
				</div>
				<ul class="db-listing">
					<li>
						<div class="img-holder">
							<img src="/frontsite/images/client1.jpg" alt="">
						</div>
						<div class="content-holder">
							<a href="#">Service title goes right here</a>
							<p><span>Category:</span> Barber</p>
							<p><span>Date:</span> 4/30/2017</p>
							<p>$100.00</p>
						</div>
						<div class="btn-holder">
							<a href="#" class="btn btn-blue-b btn-slim">See details</a>
						</div>
					</li>
					<li>
						<div class="img-holder">
							<img src="/frontsite/images/client1.jpg" alt="">
						</div>
						<div class="content-holder">
							<a href="#">Service title goes right here</a>
							<p><span>Category:</span> Barber</p>
							<p><span>Date:</span> 4/30/2017</p>
							<p>$100.00</p>
						</div>
						<div class="btn-holder">
							<a href="#" class="btn btn-blue-b btn-slim">See details</a>
						</div>
					</li>
					<li>
						<div class="img-holder">
							<img src="/frontsite/images/client1.jpg" alt="">
						</div>
						<div class="content-holder">
							<a href="#">Service title goes right here</a>
							<p><span>Category:</span> Barber</p>
							<p><span>Date:</span> 4/30/2017</p>
							<p>$100.00</p>
						</div>
						<div class="btn-holder">
							<a href="#" class="btn btn-blue-b btn-slim">See details</a>
						</div>
					</li>
					<li>
						<div class="img-holder">
							<img src="/frontsite/images/client1.jpg" alt="">
						</div>
						<div class="content-holder">
							<a href="#">Service title goes right here</a>
							<p><span>Category:</span> Barber</p>
							<p><span>Date:</span> 4/30/2017</p>
							<p>$100.00</p>
						</div>
						<div class="btn-holder">
							<a href="#" class="btn btn-blue-b btn-slim">See details</a>
						</div>
					</li>
				</ul>
				<div class="inner-title">
					<h3>Recent Salon Jobs Applied</h3>
				</div>
				<ul class="db-listing recent-jobs">
					<li>
						<div class="img-holder">
							<img src="/frontsite/images/client1.jpg" alt="">
						</div>
						<div class="content-holder">
							<a href="#">Request title goes right here</a>
							<p><span>Category:</span> Barber</p>
							<p><span>Date:</span> 4/30/2017</p>
							<p>$100.00</p>
						</div>
						<div class="btn-holder">
							<a href="#" class="btn btn-blue-b btn-slim">See details</a>
						</div>
					</li>
					<li>
						<div class="img-holder">
							<img src="/frontsite/images/client1.jpg" alt="">
						</div>
						<div class="content-holder">
							<a href="#">Request title goes right here</a>
							<p><span>Category:</span> Barber</p>
							<p><span>Date:</span> 4/30/2017</p>
							<p>$100.00</p>
						</div>
						<div class="btn-holder">
							<a href="#" class="btn btn-blue-b btn-slim">See details</a>
						</div>
					</li>
					<li>
						<div class="img-holder">
							<img src="/frontsite/images/client1.jpg" alt="">
						</div>
						<div class="content-holder">
							<a href="#">Request title goes right here</a>
							<p><span>Category:</span> Barber</p>
							<p><span>Date:</span> 4/30/2017</p>
							<p>$100.00</p>
						</div>
						<div class="btn-holder">
							<a href="#" class="btn btn-blue-b btn-slim">See details</a>
						</div>
					</li>
					<li>
						<div class="img-holder">
							<img src="/frontsite/images/client1.jpg" alt="">
						</div>
						<div class="content-holder">
							<a href="#">Request title goes right here</a>
							<p><span>Category:</span> Barber</p>
							<p><span>Date:</span> 4/30/2017</p>
							<p>$100.00</p>
						</div>
						<div class="btn-holder">
							<a href="#" class="btn btn-blue-b btn-slim">See details</a>
						</div>
					</li>
				</ul>
			</div>
			<div class="width-30 f-right listing-right">
				<div class="inner-title">
					<h3>Pending Jobs</h3>
				</div>
				<ul class="pending-job">
					<li>
						<div class="img-holder">
							<img src="/frontsite/images/client1.jpg" alt="">
						</div>
						<div class="content-holder">
							<a href="#">Service title goes right here, dolor sit elit ut  Ipsum</a>
							<p>Client: <a href="#">Alexa Snowe</a></p>
							<p>LA 10/2/2016</p>
						</div>
					</li>
					<li>
						<div class="img-holder">
							<img src="/frontsite/images/client1.jpg" alt="">
						</div>
						<div class="content-holder">
							<a href="#">Service title goes right here, dolor sit elit ut  Ipsum</a>
							<p>Client: <a href="#">Alexa Snowe</a></p>
							<p>LA 10/2/2016</p>
						</div>
					</li>
					<li>
						<div class="img-holder">
							<img src="/frontsite/images/client1.jpg" alt="">
						</div>
						<div class="content-holder">
							<a href="#">Service title goes right here, dolor sit elit ut  Ipsum</a>
							<p>Client: <a href="#">Alexa Snowe</a></p>
							<p>LA 10/2/2016</p>
						</div>
					</li>
					<li>
						<div class="img-holder">
							<img src="/frontsite/images/client1.jpg" alt="">
						</div>
						<div class="content-holder">
							<a href="#">Service title goes right here, dolor sit elit ut  Ipsum</a>
							<p>Client: <a href="#">Alexa Snowe</a></p>
							<p>LA 10/2/2016</p>
						</div>
					</li>
				</ul>
				<a href="#" class="pending-link">SEE ALL</a>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		
	}
</script>