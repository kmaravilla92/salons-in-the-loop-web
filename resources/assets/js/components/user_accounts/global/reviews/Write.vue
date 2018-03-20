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
					<Loader
						v-if="professional.is_loading"
					>
					</Loader>
					<div class="img-holder" v-if="professional.item != null">
						<img
							:src="professional.item.profile_pic.path" 
							:alt="professional.item.profile_pic.name"
						>
					</div>
					<div class="content-holder" v-if="professional.item != null">
						<h3>{{professional.item.full_name}}</h3>
						<p>
							{{professional.item.full_address}}
						</p>
						<a 
							:href="'/profile-view/'+professional.id+'/professional'"  
							class="btn btn-red-b"
							target="_blank" 
						>
							See Profile
						</a>
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
							<textarea 
								name="name" 
								rows="8" 
								cols="80" 
								v-model="review.feedback"
								@keyup="limitWords(review.feedback, review.feedback_words.limit)"
							>		
							</textarea>
							<span class="f-right" style="font-size:12px;">
								{{review.feedback_words.remaining}}/{{review.feedback_words.limit}} words
							</span>
						</li>
						<li>
							<div class="label">
								<p>Upload Current look</p>
								<div class="photos">
									<div 
										style="display: inline-block; text-align: center;"
										v-for="(image, index) in getPhotos('current_look_photos')"
									>
										<img 
											:src="image.path"
											:alt="image.path"
											/>
										<br>
										<a 
											href="#" 
											class="del-link"
											@click.prevent="removeImage('current_look_photos', index)"
										>
											<i aria-hidden="true" class="fa fa-times"></i>
										</a>
									</div>
								</div>
								<a href="#upload-holder-current_look_photos" class="btn btn-blue popup-link">Upload</a>
							</div>
						</li>
					</ul>
				</div>
				<div id="upload-holder-current_look_photos" class="mfp-hide white-popup-block popup-holder login-popup">
					<h1>UPLOAD <span>PHOTOS</span></h1>
					<div class="form-holder">
						<dropzone 
							id="current_look_photos" 
							:url="upload_url" 
							:maxNumberOfFiles="5"
							v-on:vdropzone-success="fileUploadSuccess"
							v-on:vdropzone-removed-file="fileUploadRemove"
						>
							<input type="hidden" name="type" value="current_look_photos">
							<input type="hidden" name="type_id" v-model="user_id">
				    	</dropzone>
					</div>
				</div>
				<div class="btn-holder">
					<a href="#" class="btn btn-blue-b" @click.prevent="postReview">Submit Review</a>
				</div>
			</div>
		</div>
		<!--POPUPS-->
		<div id="thankyou-pop" class="popup-holder review-pop white-popup-block mfp-hide">
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
		</div>
	</div>
</template>

<style>
	.photos img {
		display: inline-block;
	    vertical-align: top;
	    max-width: 105px;
	    width: 100%;
	    margin: 10px 8px;
	}
	
	a.del-link {
	    color: #cb4e4e;
	    font-size: 14px;
	}
</style>

<script>
	import Dropzone from 'vue2-dropzone'
	const FEEDBACK_WORDS_LIMIT = 10;
	export default {
		data() {
			return {
				user_id: userId,
				upload_url: apiBaseUrl + 'rest/images',
				review: {
					feedback: '',
					quality_of_service: 0,
					professionalism: 0,
					value: 0,
					recommended: null,
					by_user_id: userId,
					for_user_id: this.$route.params.for_user_id,
					record_id: this.$route.params.record_id,
					record_type: this.$route.params.record_type,
					current_look_photos: [],
					feedback_words: {
						remaining: FEEDBACK_WORDS_LIMIT,
						limit: FEEDBACK_WORDS_LIMIT
					}
				},
				professional: {
					is_loading: true,
					item: null,
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
		created() {
			this.fetchPro();
		},
		components: {
			Dropzone
		},
		methods: {
			setRatings(field, rate) {
				this.review[field] = rate;
			},
			postReview(e) {
				const vm = this;
				if(this.review.feedback.trim() == ''){
					let conf = confirm('You review doesn\'t have a message, do you want to continue ?');
					if(!conf){
						return false;
					}
				}
				axios
					.post(apiBaseUrl + 'rest/users/' + userId + '/reviews', {
						review: this.review
					})
					.then(function(response){
						if(response.data.messages.length > 0){
							showThankYou();
							// vm.$toastr('success', response.data.messages.join("\n"), 'Review Posting');
						}
					});
			},
			fetchPro() {
				const vm = this;
				axios
					.get(apiBaseUrl + 'rest/users/' + vm.review.for_user_id)
					.then(function(response){
						vm.professional.item = response.data;
						vm.professional.is_loading = false;
					});
			},
			removeImage(photo_list_type, index) {
				this.$delete(this.review[photo_list_type], index);
			},
			fileUploadSuccess(file, response) {
				if(response.success && response.image){
					this.review[response.image.type].push(response.image);
				}
			},

			fileUploadRemove(file, error, xhr) {
				console.log(file, error, xhr);
			},

			getPhotos(type) {
				return this.review[type].filter(photo => {
					return photo.deleted_at == null;
				});
			},

			limitWords(value, limit) {
				let wordsCount = value.match(/\S+/g).length || 0;
				if(wordsCount > limit) {
					let trimmed = value.split(/\s+/, limit).join(' ');
					this.review.feedback = trimmed + ' ';
				}else{
					this.review.feedback_words.remaining = (limit - wordsCount);
				}
			}
		}
	}

	function showThankYou() {
		$.magnificPopup.open({
			items: {
				src: '#thankyou-pop2'
			},
			type: 'inline'
		});
	}
</script>