<template>
	<div class="content-container acct-settings">
		<div class="inner-title">
			<h3>Payment History

				<div class="sort-holder f-right">
					<a class="sort-link">Sort by  <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
					<ul class="sort">
						<li><a href="#">All</a></li>
						<li><a href="#">Pending Jobs</a></li>
						<li><a href="#">Completed</a></li>
						<li><a href="#">Transferred</a></li>
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
				<li>
					<div class="col project-name">
						<a href="#">Accusata complectitur at duo </a>
					</div>
					<div class="col date">
						<p>06/28/2017</p>
					</div>
					<div class="col amount">
						<h3>$100.00</h3>
					</div>
					<div class="col status">
						<a href="#" class="btn btn-blue-b"> Request Fund</a>
					</div>
				</li>
				<li>
					<div class="col project-name">
						<a href="#">Accusata complectitur at duo </a>
					</div>
					<div class="col date">
						<p>06/28/2017</p>
					</div>
					<div class="col amount">
						<h3>$100.00</h3>
					</div>
					<div class="col status">
						<p class="pending">PENDING</p>
					</div>
				</li>
				<li>
					<div class="col project-name">
						<a href="#">Accusata complectitur at duo </a>
					</div>
					<div class="col date">
						<p>06/28/2017</p>
					</div>
					<div class="col amount">
						<h3>$100.00</h3>
					</div>
					<div class="col status">
						<p class="transferred">Transferred <i class="fa fa-check" aria-hidden="true"></i> </p>
					</div>
				</li>
				<li>
					<div class="col project-name">
						<a href="#">Accusata complectitur at duo </a>
					</div>
					<div class="col date">
						<p>06/28/2017</p>
					</div>
					<div class="col amount">
						<h3>$100.00</h3>
					</div>
					<div class="col status">
						<a href="#" class="btn btn-blue-b"> Request Fund</a>
					</div>
				</li>
			</ul>
		</div>
		<div class="pagination-holder clearfix">

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
	export default {
		mounted() {
			$('#main-wrapper').addClass('payment-info');
			console.log('asdasd')
		}
	}
</script>