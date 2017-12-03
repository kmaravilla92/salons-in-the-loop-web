<template>
	<div class="content-container app-client-req-details client-appointment edit-profile my-services">
		<div class="inner-title">
			<h3>My Profile

				<span class="f-right" style="color:#423857; font-size:12px; margin-top:5px;">All fields marked with an asterisk <span style="color:#cb4e4e;">(*)</span> are required.</span>
			</h3>

		</div>
		<div class="form-holder">
			<ul class="clearfix pro-details">

				<li class="half-width f-left">
					<label for="">First Name</label>
					<input type="text" v-model="profile_info.first_name">
				</li>
				<li class="half-width f-right">
					<label for="">Last Name</label>
					<input type="text" v-model="profile_info.last_name">
				</li>
				<li class="half-width f-left">
					<label for="">Email Address*</label>
					<input type="text" v-model="profile_info.email">
				</li>
				<li class="half-width f-right">
					<label for="">Phone Number*</label>
					<input type="text" v-model="profile_info.phone_number">
				</li>
				<li class="full-width f-left">
					<label for="">Address</label>
					<input type="text" v-model="profile_info.client_profile.address">
				</li>
				<li class="half-width f-left">
					<label for="">City *</label>
					<input type="text" v-model="profile_info.client_profile.city">
				</li>
				<li class="half-width f-right">
					<label for="">State *</label>
					<input type="text" v-model="profile_info.client_profile.state">
				</li>
				<li class="half-width f-left">
					<label for="">ZIP</label>
					<input type="text" v-model="profile_info.client_profile.zip_code">
				</li>
			</ul>
			<div class="upload-img">
				<h3>Upload Profile Photo</h3>
				<div class="img-uploaded">
					<img 
						:src="profile_info.profile_pic.path" 
						alt=""
					>
					<input type="hidden" v-model="profile_info.profile_pic.name">
				</div>
				<div class="upload-btn">
					<input type="file" v-on:change="chooseProfilePic">
					<span class="btn btn-blue ease">UPLOAD PHOTOS</span>
				</div>
			</div>
		</div>

		<div class="form-holder book-rental full-cnt">
			<div class="inner-title">
				<h3>Current Look</h3>
			</div>
			<label for="">Upload your images (max 5) *</label>
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
						@click.prevent="removeImage(image)"
					>
						<i aria-hidden="true" class="fa fa-times"></i>
					</a>
				</div>
			</div>
			<div class="upload">
				<span href="#upload-holder-current_look_photos" class="btn btn-blue popup-link">UPLOAD PHOTOS</span>
			</div>
		</div>
		
		<div class="form-holder book-rental full-cnt">
			<div class="inner-title">
				<h3>Desired Look</h3>
			</div>
			<label for="">Upload your images (max 20)</label>
			<div class="photos">
				<div 
					style="display: inline-block; text-align: center;"
					v-for="(image, index) in getPhotos('desired_look_photos')"
				>
					<img 
						:src="image.path"
						:alt="image.path"
						/>
					<br>
					<a 
						href="#" 
						class="del-link"
						@click.prevent="removeImage(image)"
					>
						<i aria-hidden="true" class="fa fa-times"></i>
					</a>
				</div>
			</div>
			<div class="upload">
				<span href="#upload-holder-desired_look_photos" class="btn btn-blue popup-link">UPLOAD PHOTOS</span>
			</div>
		</div>

		<div class="form-holder book-rental full-cnt">
			<div class="inner-title">
				<h3>List of allergies or health related issues that may affect your service.</h3>
			</div>
			<ul>
				<li>
					<label for="">List all on the field below</label>
				</li>
				<li v-for="(allergy, index) in profile_info.client_profile.allergy_list">
					<input type="text" v-model="allergy.title" placeholder="Allergy name goes right here">
					<a href="#" class="del-link middle-div" v-on:click.prevent="removeField('allergy_list', index, $event)"><i class="fa fa-times" aria-hidden="true"></i></a>
				</li>
			</ul>
			<div class="add-field clearfix">
				<a href="#" class="f-right" v-on:click.prevent="addField('allergy_list', $event)"><i class="fa fa-plus" aria-hidden="true"></i> Add another field </a>
			</div>

		</div>
		<div class="form-holder book-rental full-cnt">
			<div class="inner-title">
				<h3>List any color formulas or chemicals used</h3>
			</div>
			<ul>
				<li>
					<label for="">List all on the field below</label>
				</li>
				<li v-for="(chemical, index) in profile_info.client_profile.chemical_list">
					<input type="text" v-model="chemical.title" placeholder="Allergy name goes right here">
					<a href="#" class="del-link middle-div" v-on:click.prevent="removeField('chemical_list', index, $event)"><i class="fa fa-times" aria-hidden="true"></i></a>
				</li>

			</ul>
			<div class="add-field clearfix">
				<a href="#" class="f-right" v-on:click.prevent="addField('chemical_list', $event)"><i class="fa fa-plus" aria-hidden="true"></i> Add another field </a>
			</div>

		</div>
		<div class="form-holder book-rental full-cnt like-dislike clearfix">
			<div class="inner-title">
				<h3>Likes & Dislikes When Receiving Services</h3>
			</div>
			<div class="f-left half-width">
				<ul class="">
					<li>
						<label for="">List all on the field below</label>
					</li>
					<li v-for="(like, index) in profile_info.client_profile.likes">
						<input type="text" v-model="like.title" placeholder="Allergy name goes right here">
						<a href="#" class="del-link middle-div" v-on:click.prevent="removeField('likes', index, $event)"><i class="fa fa-times" aria-hidden="true"></i></a>
					</li>
				</ul>
				<div class="add-field clearfix">
					<a href="#" class="f-right" v-on:click.prevent="addField('likes', $event)"><i class="fa fa-plus" aria-hidden="true"></i> Add another field </a>
				</div>
			</div>
			<div class="f-right half-width">
				<ul class="">
					<li>
						<label for="">List all on the field below</label>
					</li>
					<li v-for="(dislike, index) in profile_info.client_profile.dislikes">
						<input type="text" v-model="dislike.title" placeholder="Allergy name goes right here">
						<a href="#" class="del-link middle-div" v-on:click.prevent="removeField('dislikes', index, $event)"><i class="fa fa-times" aria-hidden="true"></i></a>
					</li>
				</ul>
				<div class="add-field clearfix">
					<a href="#" class="f-right" v-on:click.prevent="addField('dislikes', $event)"><i class="fa fa-plus" aria-hidden="true"></i> Add another field </a>
				</div>
			</div>

		</div>
		<div class="btn-holder">
			<button 
				class="btn btn-blue" 
				@click.prevent="saveProfile">
					Save and Update
			</button>
			<a 
				:href="'/profile-view/'+user_id+'/client'" 
				class="btn btn-violet-bright"
				target="_blank">
				View my Profile
			</a>
			<!-- <p>*Note for the programmer. View my profile button will show up after clicking save and update button</p> -->
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
		<div id="upload-holder-desired_look_photos" class="mfp-hide white-popup-block popup-holder login-popup">
			<h1>UPLOAD <span>PHOTOS</span></h1>
			<div class="form-holder">
				<dropzone 
					id="desired_look_photos" 
					:url="upload_url" 
					:maxNumberOfFiles="20"
					v-on:vdropzone-success="fileUploadSuccess"
					v-on:vdropzone-removed-file="fileUploadRemove"
				>
					<input type="hidden" name="type" value="desired_look_photos">
					<input type="hidden" name="type_id" v-model="user_id">
		    	</dropzone>
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
	import axios from 'axios';
	import Dropzone from 'vue2-dropzone'

	export default {
		data() {
			return {
				user_id: userId,
				upload_url: apiBaseUrl + 'rest/images',
				profile_info: {
					first_name: '',
					last_name: '',
					email: '',
					phone_number: '',
					profile_pic: {
						path: '',
						name: ''
					},
					current_look_photos: [],
					desired_look_photos: [],
					client_profile: {
						address: '',
						city: '',
						state: '',
						zip_code: '',
						allergy_list: [
							{
								title: ''
							},
							{
								title: ''
							},
							{
								title: ''
							}
						],
						chemical_list: [
							{
								title: ''
							},
							{
								title: ''
							},
							{
								title: ''
							}
						],
						likes: [
							{
								title: ''
							},
							{
								title: ''
							},
							{
								title: ''
							}
						],
						dislikes: [
							{
								title: ''
							},
							{
								title: ''
							},
							{
								title: ''
							}
						],
					}
				}
			}
		},

		mounted(){

			$('.popup-link').magnificPopup({
				type: 'inline',
				preloader: false
			});
		},

		created(){
			this.fetchData();

			$('.popup-link').magnificPopup({
				type: 'inline',
				preloader: false
			});
		},

		watch: {
			'$route' : 'fetchData'
		},

		components: {
			Dropzone
		},

		methods: {
			
			addField(field) {
				this.profile_info.client_profile[field].push({});
			},

			removeField(field, index) {
				this.$delete(this.profile_info.client_profile[field], index);
			},

			saveProfile() {
				var vm = this;
					axios
						.put(
							apiBaseUrl + 'rest/users/' + userId, 
							vm.profile_info
						)
						.then(function(response){
							alert('Success!');
						});
			},

			removeImage(image) {
				image['deleted_at'] = Date.now();
			},

			fetchData(){
				var vm = this;
					axios
						.get(
							apiBaseUrl + 'rest/users/' + userId
						)
						.then(function(response){
							vm.profile_info = response.data;
						});
			},

			fileUploadSuccess(file, response) {
				if(response.success && response.image){
					this.profile_info[response.image.type].push(response.image);
				}
			},

			fileUploadRemove(file, error, xhr) {
				console.log(file, error, xhr);
			},

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
										vm.profile_info.profile_pic.path = image.path;
										vm.profile_info.profile_pic.name = image.name;
								}
								console.log(vm.profile_info.profile_pic)
							})
					};
					file_reader.readAsDataURL(e.target.files[0]);
			},

			getPhotos(type) {
				return this.profile_info[type].filter(photo => {
					return photo.deleted_at == null;
				});
			}
		}
	}
</script>