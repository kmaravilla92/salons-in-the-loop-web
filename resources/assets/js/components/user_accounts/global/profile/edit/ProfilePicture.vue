<template>
	<div class="upload-img">
		<h3>Upload Profile Photo</h3>
		<div class="img-uploaded">
			<div class="img-uploaded-overlay">
				
			</div>
			<a href="#" @click.prevent="removeProfilePic" class="remove-profile-pic" title="Remove profile picture">
				<i class="fa fa-close"></i>
			</a>
			<img 
				:src="profile_pic.path" 
				:alt="profile_pic.name"
			>
			<input type="hidden" v-model="profile_pic.name">
		</div>
		<div class="upload-btn">
			<input type="file" @change="chooseProfilePic">
			<span class="btn btn-blue ease">UPLOAD</span>
		</div>
	</div>
</template>

<style>
	.img-uploaded {
		position: relative;
	}

	.img-uploaded .img-uploaded-overlay {
		opacity: 0;
		position: absolute;
		width: 100%;
		height: 100%;
		background-color: #eee;
		text-align: right;
	}

	.img-uploaded:hover .img-uploaded-overlay {
		opacity: 0.5;
	}

	.img-uploaded .remove-profile-pic {
		opacity: 0;
		position: absolute;
		width: 40px;
		height: 40px;
		top: 0;
		bottom: 0;
		margin: auto;
		left: 0;
		right: 0;
		display: inline-block;
	}

	.img-uploaded:hover .remove-profile-pic {
		opacity: 1;
		-webkit-transition: none;
		-moz-transition: none;
		transition: none;
	}

	.img-uploaded .remove-profile-pic .fa-close {
		color: #cb4e4e;
		font-size: 40px;
	}
</style>

<script>
	export default {
		props: ['profile_pic', 'onProfilePicSelect', 'onProfilePicRemove'],
		methods: {
			chooseProfilePic(e){
				var vm = this;
				var file_reader = new FileReader();
				var form_data = new FormData();
					form_data.append('type', 'user_profile_pic');
					form_data.append('type_id', this.user_id);
					file_reader.onload = function(event){
						form_data.append('file', e.target.files[0]);
						axios
							.post(
								apiBaseUrl + 'rest/images',
								form_data,
								{
									'Content-Type': 'multipart/form-data'
								}
							)
							.then(function(response) {
								var data = response.data;
								if(data.success && data.image){
									var image = data.image;
										vm.$emit('onProfilePicSelect', image);
								}
							})
					};
					file_reader.readAsDataURL(e.target.files[0]);
			},
			removeProfilePic() {
				this.$emit('onProfilePicRemove', null);
			}
		}
	}
</script>