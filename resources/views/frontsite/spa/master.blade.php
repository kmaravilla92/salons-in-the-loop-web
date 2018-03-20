@extends('frontsite.master')

@section('spa_content')
	<input type="hidden" name="user_type" id="user_type" value="{{$user_type}}">
	<div v-if="main.show">
		<section id="main-wrapper" class="{{$main_wrapper_class}}" style="padding-bottom: 479px;">
			<div class="banner-container clearfix client-bg-dark banner-search" style="display: none;">
				<div class="wrapper">
					<div class="search-holder f-left form-holder">
						<label for="">I am looking for </label>
						<select class="" name="">
							<option value="">Select</option>
							<option value=""></option>
						</select>
						<label for="">Nearby</label>
						<input type="text" name="" value="" placeholder="Enter a search area, city, state or zip">
						<button type="button" name="button" class=""><i class="fa fa-search" aria-hidden="true"></i></button>
					</div>
				</div>
			</div>

			<div class="banner-container clearfix pro-bg banner-search" style="display: none;">
				<div class="wrapper">
					<h3 class="f-left">Search Client Request</h3>
					<div class="search-holder f-right form-holder">
						<label for="">User Types For Client Request</label>
						<select class="" name="">
							<option value="">Select</option>
							<option value=""></option>
						</select>
						<button type="button" name="button"><i class="fa fa-search" aria-hidden="true"></i></button>
					</div>
				</div>
			</div>

			<div class="banner-container clearfix pro-bg cprs" style="display: none;">
				<div class="wrapper">
					<p class="f-left">Client Request Details</p>
					<a href="/account/professional#/dashboard" class="f-right">Back to <span style="color:#ffb1b1;">Dashboard</span></a>
				</div>
			</div>
			
			<div class="wrapper">
				<div class="title-holder" v-if="in_user_dashboard">
					<h3>Salon {{ucfirst($user_type)}} Dashboard</h3>
				</div>
				<div class="title-holder" v-if="custom_title">
					<h3 v-html="custom_title"></h3>
				</div>
				<Sidebar
					:user="user"
					:items="sidebar.nav_items"
					v-if="sidebar.show"
					>	
				</Sidebar>
				<router-view></router-view>
			</div>
		</section>
	</div>
	<div v-if="!main.show">
		<router-view></router-view>
	</div>
@endsection

@section('main_container_css', $main_container_css)