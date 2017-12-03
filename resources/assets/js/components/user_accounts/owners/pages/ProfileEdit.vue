<template>
	<div class="content-container app-client-req-details client-appointment edit-profile">
		<div class="inner-title">
			<h3>My Profile
				<span class="f-right" style="color:#423857; font-size:12px; margin-top:5px;">All fields marked with an asterisk <span style="color:#cb4e4e;">(*)</span> are required.</span>
			</h3>
		</div>
		<div class="form-holder">
			<ul class="clearfix pro-details">
				<li class="half-width f-left">
					<label for="">Select Category*</label>
					<vSelect
						multiple
						:value.sync="profile_info.owner_profile.category_decoded" 
						:options="category_options"
						></vSelect>
					<!-- <select class="category-drop" name="" multiple v-model="profile_info.owner_profile.category_decoded">
						<option value="Barber">Barber</option>
						<option value="Hair Stylist">Hair Stylist</option>
						<option value="Nail Artist">Nail Artist</option>
					</select> -->
				</li>
				<li class="half-width f-right">
					<label for="">Business Name</label>
					<input type="text" name="" v-model="profile_info.owner_profile.business_name">
				</li>
				<li class="half-width f-left">
					<label for="">Title*</label>
					<!-- <select class="" name="">
						<option></option>
						<option></option>
					</select> -->
					<input type="text" name="" v-model="profile_info.owner_profile.title">
				</li>
				<li class="half-width f-right">
					<label for="">Name*</label>
					<input type="text" name="" v-model="profile_info.owner_profile.name">
				</li>
				<li class="half-width f-left">
					<label for="">Email Address*</label>
					<input type="text" name="" v-model="profile_info.email">
				</li>
				<li class="half-width f-right">
					<label for="">Phone Number*</label>
					<input type="text" name="" v-model="profile_info.phone_number">
				</li>
				<li class="full-width note f-left">
					<p><span>Note</span> for mobile users please leave field as <span>blank</span> for pending location</p>
				</li>
				<li class="full-width f-left">
					<label for="">Address</label>
					<input type="text" name="" v-model="profile_info.owner_profile.address">
				</li>
				<li class="half-width f-left">
					<label for="">City *</label>
					<input type="text" name="" v-model="profile_info.owner_profile.city">
				</li>
				<li class="half-width f-right">
					<label for="">State *</label>
					<input type="text" name="" v-model="profile_info.owner_profile.state">
				</li>
				<li class="full-width note f-left">
					<label for="">General Space Description*</label>
					<textarea name="name" rows="8" cols="80" v-model="profile_info.owner_profile.general_space_description"></textarea>
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
				<h3>Gallery</h3>
			</div>
			<label for="">Add /  upload photos up to 10 images only</label>
			<div class="photos">
				<div 
					style="display: inline-block; text-align: center;"
					v-for="(image, index) in getPhotos('gallery_photos')"
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
				<span href="#upload-holder-gallery-photos" class="btn btn-blue popup-link">UPLOAD PHOTOS</span>
			</div>
		</div>
		<div class="btn-holder">
			<button  class="btn btn-blue" @click="saveProfile">Save and Update</button>
			<a 
				:href="'/profile-view/'+user_id+'/owner'" 
				class="btn btn-violet-bright"
				target="_blank">
				View my Profile
			</a>
			<!-- <p>*Note for the programmer. View my profile button will show up after clicking save and update button</p> -->
		</div>
		<div id="upload-holder-gallery-photos" class="mfp-hide white-popup-block popup-holder login-popup">
			<h1>UPLOAD <span>PHOTOS</span></h1>
			<div class="form-holder">
				<dropzone 
					id="gallery_photos" 
					:url="upload_url" 
					:maxNumberOfFiles="20"
					v-on:vdropzone-success="fileUploadSuccess"
					v-on:vdropzone-removed-file="fileUploadRemove"
				>
					<input type="hidden" name="type" value="gallery_photos">
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
	import vSelect from 'vue-select'
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
					gallery_photos: [],
					owner_profile: {
						category: [],
						category_decoded: [],
						business_name: '',
						title: '',
						name: '',
						address: '',
						city: '',
						state: '',
						general_space_description: '',
					}
				},
				category_options: [
					'Hair Salon',
					'Barber Shop',
					'Nail Salon',
					'Pop Up Salon',
					'Wax Center',
					'Braiding Salon',
					'Hair Replacement Clinic',
					'Beauty Spa',
					'Tanning Salon',
					'Boutique',
					'Salon Suites',
					'Other'
				],
			}
		},

		mounted(){

			$('.popup-link').magnificPopup({
				type: 'inline',
				preloader: false
			});

			$(function(){
				console.log($(".category-drop").length)
				console.log($(".category-drop").select2());
			});
		},

		created(){
			this.fetchData();

			$('.popup-link').magnificPopup({
				type: 'inline',
				preloader: false
			});

			$(function(){
				console.log($(".category-drop").length)
				console.log($(".category-drop").select2());
			});
		},

		watch: {
			'$route' : 'fetchData'
		},

		components: {
			Dropzone,
			vSelect,
		},

		methods: {

			saveProfile() {
				console.log(this.profile_info);
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
							console.log(response.data);
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