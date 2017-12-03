<template>
	<div>
		<div class="calendar-container">
			<div class="title-container clearfix">
				<div class="img-holder">
					<img src="/frontsite/images/pro1.jpg" alt="">
				</div>
				<h3 class="col">Jessica Matthews</h3>
				<a href="#" class="f-right">back to <span>Jessica’s Profile</span></a>
			</div>
			<div class="form-holder clearfix">
				<h3>Select Services </h3>
				<ul>
					<li class="full-width">
						<div class="col check">
							<div class="checkbox">
								<input type="checkbox" name="v1" value="">
								<span></span>
							</div>
						</div>
						<div class="col service-name">
							<h3>Hair Cut <span>$300</span></h3>
							<p>$0for 45 minutes </p>
						</div>
						<div class="notes col f-right">
							<p class="col">Additional notes <br><span>(optional)</span></p>
							<textarea name="name"  class="col"></textarea>
						</div>
					</li>
					<li class="full-width">
						<div class="col check">
							<div class="checkbox">
								<input type="checkbox" name="v1" value="">
								<span></span>
							</div>
						</div>
						<div class="col service-name">
							<h3>Hair Cut <span>$300</span></h3>
							<p>$0for 45 minutes </p>
						</div>
						<div class="notes col f-right">
							<p class="col">Additional notes <br><span>(optional)</span></p>
							<textarea name="name"  class="col"></textarea>
						</div>
					</li>
					<li class="full-width">
						<div class="col check">
							<div class="checkbox">
								<input type="checkbox" name="v1" value="">
								<span></span>
							</div>
						</div>
						<div class="col service-name">
							<h3>Hair Cut <span>$300</span></h3>
							<p>$0for 45 minutes </p>
						</div>
						<div class="notes col f-right">
							<p class="col">Additional notes <br><span>(optional)</span></p>
							<textarea name="name"  class="col"></textarea>
						</div>
					</li>
					<li class="full-width">
						<div class="col check">
							<div class="checkbox">
								<input type="checkbox" name="v1" value="">
								<span></span>
							</div>
						</div>
						<div class="col service-name">
							<h3>Hair Cut <span>$300</span></h3>
							<p>$0for 45 minutes </p>
						</div>
						<div class="notes col f-right">
							<p class="col">Additional notes <br><span>(optional)</span></p>
							<textarea name="name"  class="col"></textarea>
						</div>
					</li>
					<li class="full-width">
						<div class="col check">
							<div class="checkbox">
								<input type="checkbox" name="v1" value="">
								<span></span>
							</div>
						</div>
						<div class="col service-name">
							<h3>Hair Cut <span>$300</span></h3>
							<p>$0for 45 minutes </p>
						</div>
						<div class="notes col f-right">
							<p class="col">Additional notes <br><span>(optional)</span></p>
							<textarea name="name"  class="col"></textarea>
						</div>
					</li>
				</ul>
			</div>
			<div class="btn-holder bottom-holder client-bg-dark">
				<div class="col">
					<p>Total Amount:</p>
					<h3>$300</h3>
				</div>
				<div class="col">
					<p>Total times it take:</p>
					<h3>90 min</h3>
				</div>
				<div class="f-right ">
					<input 
						type="submit" 
						class="btn btn-blue" 
						value="Book Selected Service(s)"
						@click.prevent="goToStep2"
						>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['pro_id'],
		methods: {
			goToStep2() {
				this.$parent.$router.push({
					name: 'client.book-appointment.step-2',
					params: {
						pro_id: this.pro_id
					}
				});
			}
		}
	}
</script>