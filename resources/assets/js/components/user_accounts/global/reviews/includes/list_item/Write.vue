<template>
	<div class="half-width f-right" v-if="!hasReview">
		<div class="pro-holder">
			<div class="img-holder">
				<img 
					v-if="record_type_map[content.full_class_name] == 'client_posted_request'"
					:src="content.hired_application.professional.profile_pic" 
					:alt="content.hired_application.professional.profile_pic"
				>
				<img 
					v-if="record_type_map[content.full_class_name] == 'client_appointment'"
					:src="content.professional.profile_pic" 
					:alt="content.professional.profile_pic"
				>
			</div>
			<div class="link-holder">
				<router-link 
					:to="{name: 'client.write-a-review', params: {record_type: record_type_map[content.full_class_name], record_id: content.id, for_user_id: professionalId}}" 
					class="btn btn-violet-light"
				>
					<i class="fa fa-star" aria-hidden="true"></i> Write a review
				</router-link>
				<label>Service <br>
					Successfully Ended
				</label>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['content', 'ratingRange', 'hasReview', 'record_type_map'],
		data() {
			return {}
		},
		computed: {
			professionalId: function() {
				let professional_id = 0;
				let content = this.content;
				switch(this.record_type_map[content.full_class_name]){
					case 'client_posted_request':
						professional_id = content.hired_application.professional_id;
					break;
					case 'client_appointment':
						professional_id = content.professional_id;
					break;
					case 'owner_help_request':
						professional_id = 1;
					break;
					case 'owner_space_rental':
						professional_id = 1;
					break;
				}
				return professional_id;
			}
		}
	}
</script>