<template>
	<div class="request-details">
		<div class="clearfix title-details">
			<div class="f-left">
				<p><span>professional types &nbsp;</span> {{content.category_csv}}</p>
				<h3 class="salon-client-review">{{content.title}} </h3>
				<label for=""><span>Posted</span> {{content.created_at}}</label>
			</div>
			<div class="f-right" v-if="record_type_map[content.full_class_name] == 'client_posted_request'">
				<p>BUDGET</p>
				<h5>${{content.budget}}</h5>
			</div>
			<div class="f-right" v-if="record_type_map[content.full_class_name] == 'owner_help_request'">
				<p>RENTAL PRICE</p>
				<h5>${{content.weekly_total}}</h5>
			</div>
			<div class="f-right" v-if="record_type_map[content.full_class_name] == 'owner_space_rental'">
				<p>WEEKLY BUDGET</p>
				<h5>${{content.rate_price}}</h5>
			</div>
		</div>
		<div class="content">
			<p>{{content.message}}</p>
			<hr>
			<div class="clearfix">
			 	<div class="half-width f-left">
					<label for="" v-if="record_type_map[content.full_class_name] == 'client_posted_request'"><i class="fa fa-calendar" aria-hidden="true"></i>  {{content.desired_date}} {{content.desired_time}} </label>
					<label for="" v-if="['owner_help_request', 'owner_space_rental'].indexOf(record_type_map[content.full_class_name]) > -1"><i class="fa fa-calendar" aria-hidden="true"></i>  {{content.start_date}} {{content.start_time}} - {{content.end_date}} {{content.end_time}} </label> <br>
					<label for=""><i class="fa fa-map-marker" aria-hidden="true"></i> {{content.full_address}}</label>
				</div>
				<Write
					:content="content"
					:ratingRange="ratingRange"
					:hasReview="hasReview"
					:record_type_map="record_type_map"
				></Write>
			</div>
		</div>
		<Feedback
			:content="content"
			:ratingRange="ratingRange"
			:hasReview="hasReview"
			:record_type_map="record_type_map"
		></Feedback>
	</div>
</template>

<script>
	import Feedback from './includes/list_item/Feedback.vue'
	import Write from './includes/list_item/Write.vue'
	export default {
		props: {
			review: {
				type: Object,
				required: true,
			},
			record_type_map: {
				type: Object,
				required: true,
			},
		},
		computed: {
			hasReview() {
				return this.content.review != null;
			},
			ratingRange() {
				let range = [];
				if(this.content.review == null){
					return range;
				}
				for(let i = 0; i < this.content.review.overall_rating; i++) {
					range.push(i);
				}
				return range;
			}
		},
		data() {
			return {
				content: this.review
			}
		},
		components: {
			Feedback,
			Write,
		},
		methods: {
			shareReview() {
				alert('FEATURE UNDERDEVELOPMENT!');
			}
		}
	}
</script>