<template>
	<div class="pro-details" v-if="hasReview">
		<div class="pro-holder">
			<div class="img-holder">
				<div class="img-over">
					<img 
						v-if="['client_posted_request', 'owner_help_request'].indexOf(record_type_map[content.full_class_name]) > -1"
						:src="content.hired_application.professional.profile_pic" 
						:alt="content.hired_application.professional.profile_pic"
					>
					<img 
						v-if="record_type_map[content.full_class_name] == 'client_appointment'"
						:src="content.professional.profile_pic" 
						:alt="content.professional.profile_pic"
					>
				</div>
			</div>
			<div class="information">
				<div class="rating">
					<span>{{content.review.overall_rating}}</span>
					<p>OVERALL</p>
					<i class="fa fa-star" aria-hidden="true" v-for="i in ratingRange"></i>
				</div>
				<p>Reviewed {{content.review.created_at}}</p>
				<a href="#" class="btn btn-blue-b" @click.prevent="shareReview">Share my Review</a>
			</div>
			<div class="description">
				<p>{{content.review.feedback}} </p>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['content', 'ratingRange', 'hasReview', 'record_type_map'],
		methods: {
			shareReview() {
				alert('FEATURE UNDERDEVELOPMENT!');
			}
		}
	}
</script>