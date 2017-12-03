<template>
	<div class="content-container app-client-req-details client-appointment edit-profile">
		<div class="inner-title">
			<h3>My Profile

				<span class="f-right" style="color:#423857; font-size:12px; margin-top:5px;">All fields marked with an asterisk <span style="color:#cb4e4e;">(*)</span> are required.</span>
			</h3>

		</div>
		<div class="form-holder">
			<ul class="clearfix pro-details">
				<li class="full-width f-left">
					<label for="">Select Category*</label>
					<select class="category-drop" name="" multiple>
						<option value="">Barber</option>
						<option value="">Hair Stylist</option>
						<option value="">Nail Artist</option>
					</select>
				</li>
				<li class="half-width f-left">
					<label for="">First Name</label>
					<input type="text" name="" value="">
				</li>
				<li class="half-width f-right">
					<label for="">Last Name</label>
					<input type="text" name="" value="">
				</li>
				<li class="half-width f-left">
					<label for="">Email Address*</label>
					<input type="text" name="" value="">
				</li>
				<li class="half-width f-right">
					<label for="">Phone Number*</label>
					<input type="text" name="" value="">
				</li>
				<li class="full-width f-left">
					<label for="">Address <span class="f-right">( Enter the address for the area that you would like to receive requests )</span></label>
					<input type="text" name="" value="">
				</li>
				<li class="half-width f-left">
					<label for="">City *</label>
					<input type="text" name="" value="">
				</li>
				<li class="half-width f-right">
					<label for="">State *</label>
					<input type="text" name="" value="">
				</li>
			</ul>
			<div class="upload-img">
				<h3>Upload Profile Photo</h3>
				<div class="img-uploaded">
					<img src="/frontsite/images/no-img.jpg" alt="">
				</div>
				<div class="upload-btn">
					<input type="file" name="" value="">
					<span class="btn btn-blue ease">UPLOAD PHOTOS</span>
				</div>
			</div>
		</div>

		<div class="form-holder book-rental full-cnt">
			<div class="inner-title">
				<h3>My Photos</h3>
			</div>
			<label for="">Add /  upload photos up to 20 images only</label>
			<div class="upload">
				<input type="file" name="" value="">
				<span class="btn btn-blue">UPLOAD</span>
			</div>
		</div>

		<div class="form-holder book-rental full-cnt">
			<div class="inner-title">
				<h3>Upload photo of your license  <span>( optional )</span></h3>
			</div>
			<div class="upload">
				<input type="file" name="" value="">
				<span class="btn btn-blue">UPLOAD</span>
			</div>
		</div>
		<div class="btn-holder">
			<button  class="btn btn-blue">Save and Update</button>
			<a href="#" class="btn btn-violet-bright">View my Profile</a>
			<!-- <p>*Note for the programmer. View my profile button will show up after clicking save and update button</p> -->
		</div>
	</div>
</template>
<script>
	export default {
		mounted(){
			$(function(){
				if($(".menu-listing" ).length > 0){
			    $(".menu-listing" ).accordion({
			      collapsible: true,
			      heightStyle: "content",
			      header: "> ul > li > a"
			    });
			  }
			})
		}
	}
</script>