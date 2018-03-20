<template>
	<div class="content-container app-client-req-details client-appointment edit-profile">
		<div class="inner-title">
			<h3>My Profile
				<span class="f-right" style="color:#423857; font-size:12px; margin-top:5px;">All fields marked with an asterisk <span style="color:#cb4e4e;">(*)</span> are required.</span>
			</h3>
		</div>
		<Loader
			v-show="is_loading"
		>
		</Loader>
		<div class="form-holder" v-show="!is_loading">
			<ul class="clearfix pro-details">
				<li class="half-width f-left">
					<label for="">Select Category*</label>
					<vSelect
						multiple
						name="category"
						:value.sync="profile_info.owner_profile.category_decoded" 
						:options="category_options"
						v-validate="'required'"
						></vSelect>
						<span class="has-error">{{ errors.first('category') }}&nbsp;</span>
				</li>
				<li class="half-width f-right">
					<label for="">Business Name</label>
					<input 
							type="text" 
							name="business name"
							v-model="profile_info.owner_profile.business_name"
						>
					<span class="has-error">&nbsp;</span>
				</li>
				<li class="half-width f-left">
					<label for="">Title*</label>
					<select name="" id="" v-model="profile_info.owner_profile.title">
						<option :value="title_option" v-for="title_option in title_options">{{title_option}}</option>
					</select>
					<span class="has-error">{{ errors.first('title') }}&nbsp;</span>
				</li>
				<li class="half-width f-right">
					<label for="">Name*</label>
					<input 
						type="text" 
						name="name" 
						v-validate="'required'"
						v-model="profile_info.owner_profile.name"
						:class="{'has-error': errors.has('name')}"
					>
					<span class="has-error">{{ errors.first('name') }}&nbsp;</span>
				</li>
				<li class="half-width f-left">
					<label for="">Email Address*</label>
					<input 
						type="text" 
						name="email" 
						v-validate="'required'"
						v-model="profile_info.email"
						:class="{'has-error': errors.has('email')}"
					>
					<span class="has-error">{{ errors.first('email') }}&nbsp;</span>
				</li>
				<li class="half-width f-right">
					<label for="">Phone Number*</label>
					<input 
						type="text" 
						name="phone number" 
						v-validate="'required'"
						v-model="profile_info.phone_number"
						:class="{'has-error': errors.has('phone number')}"
					>
					<span class="has-error">{{ errors.first('phone number') }}&nbsp;</span>
				</li>
				<li class="full-width note f-left">
					<p><span>Note:</span> Mobile trucks can use a professional account to manage daily locations.</p>
				</li>
				<li class="full-width f-left">
					<label for="">Address</label>
					<input type="text" name="" v-model="profile_info.owner_profile.address">
				</li>
				<li class="half-width f-left">
					<label for="">City *</label>
					<input 
						type="text" 
						name="city" 
						v-model="profile_info.owner_profile.city"
						v-validate="'required'"
						:class="{'has-error': errors.has('city')}"
					>
					<span class="has-error">{{ errors.first('city') }}&nbsp;</span>
				</li>
				<li class="half-width f-right">
					<label for="">State *</label>
					<input 
						type="text" 
						name="state" 
						v-model="profile_info.owner_profile.state"
						v-validate="'required'"
						:class="{'has-error': errors.has('state')}"
					>
					<span class="has-error">{{ errors.first('state') }}&nbsp;</span>
				</li>
				<li class="full-width note f-left">
					<label for="">Rental agreement *</label>
					<textarea 
						name="rental agreement" 
						rows="8" 
						cols="80" 
						v-model="profile_info.owner_profile.general_space_description"
						v-validate="'required'"
						:class="{'has-error': errors.has('rental agreement')}"
						placeholder="Edit Sample Rental Agreement" 
						>
					</textarea>
					<span class="has-error">{{ errors.first('rental agreement') }}&nbsp;</span>
				</li>
			</ul>
			<ProfilePicture
				:profile_pic="profile_info.profile_pic"
				@onProfilePicSelect="chooseProfilePic"
				@onProfilePicRemove="removeProfilePic"
			>
			</ProfilePicture>
		</div>
		<div class="form-holder book-rental full-cnt" v-show="!is_loading">
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
		<div class="btn-holder" v-show="!is_loading">
			<p><span>Note:</span> Save changes before you view!</p>
			<button 
				class="btn btn-blue" 
				@click="saveProfile">
				Save and Update		
			</button>
			<a 
				:href="'/profile-view/'+user_id+'/owner'" 
				class="btn btn-violet-bright"
				target="_blank">
				View my Profile
			</a>
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
	import ProfilePicture from '../../global/profile/edit/ProfilePicture.vue'
	export default {
		data() {
			return {
				user_id: userId,
				upload_url: apiBaseUrl + 'rest/images',
				is_loading: true,
				save_hit: false,
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
				title_options: [
					'Mr.', 
					'Ms.', 
					'Mrs.'
				],
				category_options: settings.owner_categories
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
			// this.ifLeavingPage();

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
			ProfilePicture,
		},

		methods: {

			saveProfile() {
				const vm = this;
					vm
						.$validator
						.validateAll()
						.then((valid)=>{
							if(valid){
								axios
								.put(
									apiBaseUrl + 'rest/users/' + userId, 
									vm.profile_info
								)
								.then((response)=>{
									vm.$toastr('success', 'Profile details successfully updated.', 'Profile Update');
								},(error)=>{
									vm.$toastr('error', 'Something went wrong. Please try again later.', 'Profile Update');
								});
							}else{
								vm.$toastr('error', 'Oops, there were errors in the form. Please check and resubmit.', 'Profile Update');
								$('body,html').animate({
									scrollTop: $('input.has-error,textarea.has-error,select.has-error').first().offset().top
								});
							}
						})
						.catch((error)=>{
							console.log(error)
						});	
			},

			removeImage(image) {
				image['deleted_at'] = Date.now();
			},

			fetchData(){
				const vm = this;
					axios
						.get(
							apiBaseUrl + 'rest/users/' + userId
						)
						.then(function(response){
							vm.profile_info = response.data;
							vm.is_loading = false;
						}, (error)=>{
							vm.$toastr('error', 'Something went wrong. Please try again later.', 'Profile Update');
							vm.is_loading = false;
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

			getPhotos(type) {
				return this.profile_info[type].filter(photo => {
					return photo.deleted_at == null;
				});
			},

			chooseProfilePic(profile_pic) {
				this.profile_info.profile_pic = profile_pic;
			},

			removeProfilePic(profile_pic) {
				$('[type="file"]').val('');
				$('[type="file"]').change();
				this.profile_info.profile_pic.name = '/frontsite/images/sitl-img.png';
				this.profile_info.profile_pic.path =  '/frontsite/images/sitl-img.png';
			}
		}
	}
</script>