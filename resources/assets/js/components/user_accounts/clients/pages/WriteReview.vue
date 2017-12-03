<template>
	<div class="content-container app-client-req-details req-release review-rating">
		<div class="inner-title">
			<h3>Write Reviews</h3>
		</div>
		<div class="request-details">
			<div class="clearfix title-details">
				<div class="f-left">
					<h3 class="salon-owner-review">Accusata complectitur at duo </h3>
				</div>
			</div>
			<div class="write-rating">

				<div class="prof-holder f-right">
					<div class="img-holder">
						<img src="/frontsite/images/pro1.jpg" alt="">
					</div>
					<div class="content-holder">
						<h3>Jessica Matthew</h3>
						<p>
							Square Town, Square City, <br>Colorado - CO, 11010
						</p>
						<a href="#" class="btn btn-red-b">See Profile</a>
					</div>

				</div>
				<div class="form-holder">
					<h3>Rate the Professional (1-5 Star)</h3>
					<ul>
						<li>
							<div class="label">
								<p>Quality of Service</p>
							</div>
							<div class="rating">
								<ul class='stars'>
						      <li class='star' title='Poor' data-value='1' v-on:click="setRatings('quality_of_service', 1)">
						        <i class='fa fa-star-o fa-fw'></i>
						      </li>
						      <li class='star' title='Fair' data-value='2' v-on:click="setRatings('quality_of_service', 2)">
						        <i class='fa fa-star-o fa-fw'></i>
						      </li>
						      <li class='star' title='Good' data-value='3' v-on:click="setRatings('quality_of_service', 3)">
						        <i class='fa fa-star-o fa-fw'></i>
						      </li>
						      <li class='star' title='Excellent' data-value='4' v-on:click="setRatings('quality_of_service', 4)">
						        <i class='fa fa-star-o fa-fw'></i>
						      </li>
						      <li class='star' title='WOW!!!' data-value='5' v-on:click="setRatings('quality_of_service', 5)">
						        <i class='fa fa-star-o fa-fw'></i>
						      </li>
								</ul>
							</div>
						</li>
						<li>
							<div class="label">
								<p>Professionalism</p>
							</div>
							<div class="rating">
								<ul class='stars'>
						      <li class='star' title='Poor' data-value='1' v-on:click="setRatings('professionalism', 1)">
						        <i class='fa fa-star-o fa-fw'></i>
						      </li>
						      <li class='star' title='Fair' data-value='2' v-on:click="setRatings('professionalism', 2)">
						        <i class='fa fa-star-o fa-fw'></i>
						      </li>
						      <li class='star' title='Good' data-value='3' v-on:click="setRatings('professionalism', 3)">
						        <i class='fa fa-star-o fa-fw'></i>
						      </li>
						      <li class='star' title='Excellent' data-value='4' v-on:click="setRatings('professionalism', 4)">
						        <i class='fa fa-star-o fa-fw'></i>
						      </li>
						      <li class='star' title='WOW!!!' data-value='5' v-on:click="setRatings('professionalism', 5)">
						        <i class='fa fa-star-o fa-fw'></i>
						      </li>
								</ul>
							</div>
						</li>
						<li>
							<div class="label">
								<p>Value</p>
							</div>
							<div class="rating">
								<ul class='stars'>
						      <li class='star' title='Poor' data-value='1' v-on:click="setRatings('value', 1)">
						        <i class='fa fa-star-o fa-fw'></i>
						      </li>
						      <li class='star' title='Fair' data-value='2' v-on:click="setRatings('value', 2)">
						        <i class='fa fa-star-o fa-fw'></i>
						      </li>
						      <li class='star' title='Good' data-value='3' v-on:click="setRatings('value', 3)">
						        <i class='fa fa-star-o fa-fw'></i>
						      </li>
						      <li class='star' title='Excellent' data-value='4' v-on:click="setRatings('value', 4)">
						        <i class='fa fa-star-o fa-fw'></i>
						      </li>
						      <li class='star' title='WOW!!!' data-value='5' v-on:click="setRatings('value', 5)">
						        <i class='fa fa-star-o fa-fw'></i>
						      </li>
								</ul>
							</div>
						</li>
						<li>
							<div class="label">
								<p>Recommend</p>
							</div>
							<div class="check">

								<div class="checkbox">
									<input type="radio" name="v1" v-model="review.recommended" value="1">
									<span></span>
								</div>
								<p>Yes</p>

								<div class="checkbox">
									<input type="radio" name="v1" v-model="review.recommended" value="0">
									<span></span>
								</div>
								<p>No</p>
							</div>
						</li>
						<li class="feedback">
							<label for="">Feedback</label>
							<textarea name="name" rows="8" cols="80" v-model="review.feedback"></textarea>
							<span class="f-right" style="font-size:12px;">250 words</span>
						</li>
						<li>
							<div class="label">
								<p>Upload Current look</p>
								<a href="#" class="btn btn-blue">Upload</a>
							</div>
						</li>
					</ul>
				</div>
				<div class="btn-holder">
					<!--<input type="submit" name="" value="Submit Review" class="btn btn-blue-b">-->
					<a href="#thankyou-pop2" class="popup-link btn btn-blue-b" v-on:click="saveReview">Submit Review</a>
				</div>
			</div>
		</div>
		<!--POPUPS-->
		<!-- <div id="thankyou-pop" class="popup-holder review-pop white-popup-block mfp-hide">
			<button type="button" name="button" class="close">CLOSE</button>
			<h3>THANK YOU!</h3>
			<p>Successfully submit your review</p>
			<div class="share-holder">
				<div class="img-holder">
					<img src="/frontsite/images/owner1.jpg" alt="">
				</div>
				<div class="content-sec">
					<h5>Space Available</h5>
					<p>Curtesy of <a href="#">John Smith</a></p>
					<img src="/frontsite/images/logo2.png" alt="">
					<a href="">SalonsInThe Loop.com</a>
				</div>
			</div>
			<div class="btn-holder">
				<a href="#" class="btn btn-blue">Share on Facebook</a>
				<a href="#">back to <span>dashboard</span></a>
			</div>
		</div>
		<div id="thankyou-pop2" class="popup-holder review-pop white-popup-block mfp-hide">
			<button type="button" name="button" class="close">CLOSE</button>
			<h3>THANK YOU!</h3>
			<p>Successfully submit your review</p>
			<div class="share-holder">
				<div class="img-holder">
					<img src="/frontsite/images/pro2.jpg" alt="">
				</div>
				<div class="content-sec">
					<h5>Hire this Pro</h5>
					<p>Curtesy of <a href="#">John Smith</a></p>
					<img src="/frontsite/images/logo2.png" alt="">
					<a href="">SalonsInThe Loop.com</a>
				</div>
			</div>
			<div class="btn-holder">
				<a href="#" class="btn btn-blue">Share on Facebook</a>
				<a href="#">back to <span>dashboard</span></a>
			</div>
		</div> -->
	</div>
</template>

<script>
	import axios from 'axios';
	export default {
		data() {
			return {
				review: {
					feedback: '',
					quality_of_service: 0,
					professionalism: 0,
					value: 0,
					recommended: null,
					by_user_id: 10,
					for_user_id: 11,
					_reserved_id_: 1
				}
			}
		},
		mounted() {
			$('.stars li').on('mouseover', function(){
				var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

				// Now highlight all the stars that's not after the current hovered star
				$(this).parent().children('li.star').each(function(e){
				if (e < onStar) {
					$(this).addClass('hover');
				}
				else {
					$(this).removeClass('hover');
				}
			});

			}).on('mouseout', function(){
				$(this).parent().children('li.star').each(function(e){
					$(this).removeClass('hover');
				});
			});


			/* 2. Action to perform on click */
			$('.stars li').on('click', function(){
				var onStar = parseInt($(this).data('value'), 10); // The star currently selected
				var stars = $(this).parent().children('li.star');

				for (var i = 0; i < stars.length; i++) {
					$(stars[i]).removeClass('selected');
				}

				for (var i = 0; i < onStar; i++) {
					$(stars[i]).addClass('selected');
				}
			});


			$('.popup-link').magnificPopup({
				type: 'inline'
			});
		},
		methods: {
			setRatings(field, rate) {
				this.review[field] = rate;
			},
			saveReview(e) {
				e.preventDefault();
				console.log(this.review);
				axios
					.post('http://api.sitl.dev/v1/rest/reviews', {
						review: this.review
					})
					.then(function(response){
						if(response.data.messages.length > 0){
							alert(response.data.messages.join("\n"));
						}
					});
			}
		}
	}
</script>