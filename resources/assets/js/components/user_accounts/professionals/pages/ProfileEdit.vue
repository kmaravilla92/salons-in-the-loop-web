<template>
	<div class="content-container app-client-req-details client-appointment edit-profile">
		<div class="inner-title">
			<h3>My Profile
				<span class="f-right" style="color:#423857; font-size:12px; margin-top:5px;">All fields marked with an asterisk <span style="color:#cb4e4e;">(*)</span> are required.</span>
			</h3>
		</div>
		<Loader
			v-if="is_loading"
			text="LOADING SERVICE HOURS ..."
		>
		</Loader>
		<div class="form-holder" v-show="!is_loading">
			<ul class="clearfix pro-details">
				<li class="full-width f-left">
					<label for="">Select Category (up to 5)*</label>
					<vSelect
						multiple
						:value.sync="profile_info.pro_profile.category_decoded" 
						:options="professional_types"
						>
					</vSelect>
				</li>
				<li class="half-width f-left">
					<label for="">First Name*</label>
					<input 
						type="text"
						name="first name"
						v-validate="'required'"
						v-model="profile_info.first_name"
						:class="{'has-error': errors.has('first name')}"
					>
				</li>
				<li class="half-width f-right">
					<label for="">Last Name*</label>
					<input 
						type="text"
						name="last name"
						v-validate="'required'"
						v-model="profile_info.last_name"
						:class="{'has-error': errors.has('last name')}"
					>
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
				<li class="full-width f-left">
					<label for="">Address <span class="f-right">( Enter the address for the area that you would like to receive requests )</span></label>
					<input 
						type="text"
						v-model="profile_info.pro_profile.address"
					>
				</li>
				<li class="half-width f-left">
					<label for="">City *</label>
					<input 
						type="text" 
						name="city" 
						v-validate="'required'"
						v-model="profile_info.pro_profile.city"
						:class="{'has-error': errors.has('city')}"
					>
					<span class="has-error">{{ errors.first('city') }}&nbsp;</span>
				</li>
				<li class="half-width f-right">
					<label for="">State *</label>
					<input 
						type="text" 
						name="state" 
						v-validate="'required'"
						v-model="profile_info.pro_profile.state"
						:class="{'has-error': errors.has('state')}"
					>
					<span class="has-error">{{ errors.first('state') }}&nbsp;</span>
				</li>
				<li class="half-width f-left">
					<label for="">Zipcode *</label>
					<input 
						type="text" 
						name="zip code" 
						v-validate="'required'"
						v-model="profile_info.pro_profile.zipcode"
						:class="{'has-error': errors.has('zip code')}"
					>
					<span class="has-error">{{ errors.first('zip code') }}&nbsp;</span>
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
				<h3>Cancellation Policy</h3>
			</div>
			<div class="form-holder" v-show="!is_loading">
				<ul class="clearfix pro-details">
					<li class="full-width">
						<label for="">Cancellation Policy*</label>
						<textarea 
							id="" 
							cols="30" 
							rows="10"
							name="cancellation policy" 
							v-validate="'required'"
							v-model="profile_info.pro_profile.cancellation_policy"
							:class="{'has-error': errors.has('cancellation policy')}"
						>
						</textarea>
					</li>
				</ul>
			</div>
		</div>

		<div class="form-holder book-rental full-cnt" v-show="!is_loading">
			<div class="inner-title">
				<h3>Social Media Links</h3>
			</div>
			<div class="form-holder" v-show="!is_loading">
				<ul class="clearfix pro-details">
					<li class="full-width">
						<label for="">Facebook URL</label>
						<input 
							type="text" 
							name="facebook URL"
							v-model="profile_info.pro_profile.social_link_facebook"
							:class="{'has-error': errors.has('facebook URL')}"
						>
					</li>
					<li class="full-width">
						<label for="">Instagram URL</label>
						<input 
							type="text" 
							name="instagram URL"
							v-model="profile_info.pro_profile.social_link_instagram"
							:class="{'has-error': errors.has('instagram URL')}"
						>
					</li>
					<li class="full-width">
						<label for="">Twitter URL</label>
						<input 
							type="text" 
							name="twitter URL"
							v-model="profile_info.pro_profile.social_link_twitter"
							:class="{'has-error': errors.has('twitter URL')}"
						>
					</li>
				</ul>
			</div>
		</div>

		<div class="form-holder book-rental full-cnt" v-show="!is_loading">
			<div class="inner-title">
				<h3>My Photos</h3>
			</div>
			<label for="">Add /  UPLOAD up to 20 images only</label>
			<div class="photos">
				<div 
					style="display: inline-block; text-align: center;"
					v-for="(image, index) in getPhotos('pro_photos')"
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
				<span href="#upload-holder-pro_photos" class="btn btn-blue popup-link">UPLOAD</span>
			</div>
		</div>

		<div class="form-holder book-rental full-cnt" v-show="!is_loading">
			<div class="inner-title">
				<h3>Upload photo of your license  <span>( optional )</span></h3>
			</div>
			<div class="photos">
				<div 
					style="display: inline-block; text-align: center;"
					v-for="(image, index) in getPhotos('license_photos')"
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
				<span href="#upload-holder-license_photos" class="btn btn-blue popup-link">UPLOAD</span>
			</div>
		</div>
		<div class="btn-holder" v-show="!is_loading">
			<p><span>Note:</span> Save changes before you view!</p>
			<button 
				class="btn btn-blue"
				@click.prevent="saveProfile"
			>
				Save and Update
			</button>
			<a 
				:href="'/profile-view/'+user_id+'/professional'" 
				class="btn btn-violet-bright"
				target="_blank">
				View my Profile
			</a>
			<!-- <p>*Note for the programmer. View my profile button will show up after clicking save and update button</p> -->
		</div>
		<div id="upload-holder-pro_photos" class="mfp-hide white-popup-block popup-holder login-popup">
			<h1>UPLOAD <span>PHOTOS</span></h1>
			<div class="form-holder">
				<dropzone 
					id="pro_photos" 
					:url="upload_url" 
					:maxNumberOfFiles="20"
					v-on:vdropzone-success="fileUploadSuccess"
					v-on:vdropzone-removed-file="fileUploadRemove"
				>
					<input type="hidden" name="type" value="pro_photos">
					<input type="hidden" name="type_id" v-model="user_id">
		    	</dropzone>
			</div>
		</div>

		<div id="upload-holder-license_photos" class="mfp-hide white-popup-block popup-holder login-popup">
			<h1>UPLOAD <span>PHOTOS</span></h1>
			<div class="form-holder">
				<dropzone 
					id="license_photos" 
					:url="upload_url" 
					:maxNumberOfFiles="20"
					v-on:vdropzone-success="fileUploadSuccess"
					v-on:vdropzone-removed-file="fileUploadRemove"
				>
					<input type="hidden" name="type" value="license_photos">
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
	import axios from 'axios'
	import Dropzone from 'vue2-dropzone'
	import vSelect from 'vue-select'
	import ProfilePicture from '../../global/profile/edit/ProfilePicture.vue'

	export default {
		data() {
			return {
				user_id: userId,
				upload_url: apiBaseUrl + 'rest/images',
				is_loading: true,
				profile_info: {
					user_id: userId,
					first_name: '',
					last_name: '',
					email: '',
					phone_number: '',
					profile_pic: {
						path: '',
						name: ''
					},
					pro_photos: [],
					license_photos: [],
					pro_profile: {
						category: [],
						category_decoded: [],
						address: '',
						city: '',
						state: '',
						zipcode: '',
						cancellation_policy: '',
						social_link_facebook: '',
						social_link_instagram: '',
						social_link_twitter: ''
					}
				},
				professional_types: settings.professional_types,
			}
		},

		mounted(){
			$(function(){
				$('.popup-link').magnificPopup({
					type: 'inline',
					preloader: false
				});
				if($(".menu-listing" ).length > 0){
					$(".menu-listing" ).accordion({
						collapsible: true,
						heightStyle: "content",
						header: "> ul > li > a"
					});
				}
			});
		},

		created(){
			this.fetchData();
		},

		watch: {
			'$route' : 'fetchData'
		},

		components: {
			Dropzone,
			vSelect,
			ProfilePicture
		},

		methods: {
			saveProfile() {
				var vm = this;
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
				var vm = this;
					axios
						.get(
							apiBaseUrl + 'rest/users/' + userId
						)
						.then(function(response){
							vm.profile_info = response.data;
							vm.is_loading = false;
						}, function(error) {
							vm.is_loading = false;
							vm.$toastr('error', 'Something went wrong. Please try again later.', 'Profile Update');
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