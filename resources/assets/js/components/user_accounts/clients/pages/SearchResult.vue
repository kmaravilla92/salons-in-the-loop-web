<template>
	<section id="main-wrapper" class="inner dashboard dashboard-pro client-req app-client-req-details app-req-listing help-req-listing" style="padding-bottom: 479px;">
		<div class="banner-container clearfix client-bg-dark banner-search banner-search-rental">
			<div class="wrapper client-pro-search">
				<div class="search-holder f-left form-holder">
					<label for="">I am looking for </label>
					<vSelect
						multiple
						:value.sync="search.filters.professional_type" 
						:options="search.professional_types"
						></vSelect>
					<label for="">Nearby</label>
					<input type="text" placeholder="Enter a search area, city, state or zip" v-model="search.filters.nearby">
					<button type="button" name="button" class="" @click.prevent="searchProfessionals(false, 1)"><i class="fa fa-search" aria-hidden="true"></i></button>
					<a class="advanced-link">Advanced Search</a>
					<div class="advanced-holder clearfix">
						<input type="text" v-model="search.filters.pro_name" placeholder="Enter professional name">
						<input type="text" v-model="search.filters.pro_phone_number" placeholder="Enter professional contact number">
					</div>
				</div>
			</div>
		</div>
		<div class="wrapper">
			<div class="content-container app-client-req-details help-req dashboard-owner booked-rental search-client-req-details search-listing">
			<div class="inner-title">
				<h3>Search Result(s) Found : <span style="color:#000000;">{{ search.results.items.length }}</span>
					<div class="sort-holder f-right">
						<a class="sort-link">Sort by  <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
						<ul class="sort">
							<li><a href="#" @click.prevent="sortResults('all')">All</a></li>
							<li><a href="#" @click.prevent="sortResults('top_rated')">Top Ratings </a></li>
							<li><a href="#" @click.prevent="sortResults('nearest')">Near me</a></li>
							<li><a href="#" @click.prevent="sortResults('online')">Online</a></li>
							<li><a href="#" @click.prevent="sortResults('offline')">Offline</a></li>
						</ul>
					</div>
				</h3>
			</div>
			<div class="request-details featured-pro">
				<div class="listing-holder block-unb">
					<div class="note">
						<p><i class="fa fa-circle" aria-hidden="true" style="color:#35760e;"></i>ONLINE <i class="fa fa-circle" aria-hidden="true" style="color:#cb4e4e;"></i>OFFLINE |   Online profesionals can accept request immediately and offline cannot accept request until they are online.</p>
					</div>
					<br><br>
					<Loader
						v-if="search.is_loading"
					>
					</Loader>
					<div 
						class="pro-holder" 
						v-if="!search.is_loading"
						v-for="item in search.results.items">
						<div class="img-over">
							<div class="img-holder">
								<img 
									:src="item.profile_pic" 
									:alt="item.profile_pic"
								>
							</div>
							<div class="onoff-holder">
								<img 
									:src="item.presence_image" 
									:alt="item.presence_image">
							</div>
						</div>
						<h3>{{item.full_name}}</h3>
						<h5>{{item.pro_profile.category_csv}}</h5>
						<p>{{item.profile.full_address}}</p>
						<StarRatings :rating="item.profile.review_rating_count">
						</StarRatings>
						<a 
							:href="'/profile-view/'+item.id+'/professional'"  
							class="btn btn-grey-b"
							target="_blank" 
						>
							See My Profile
						</a>
					</div>
					<div v-if="search.is_searching && !search.results.items.length">
						<br><br><br>
						<div class="note t-center">
							<p class="t-center">
								Email <a href="mailto:search@salonsintheloop.com">search@salonsintheloop.com</a> if you would like to have professionals to register in this area.
							</p>
						</div>
						<br><br><br>
					</div>
				</div>
				<div class="pagination-holder clearfix">
					<div class="pagination">
						<pagination 
							:records="search.results.total"
							:perPage="search.results.per_page"
							:countText="search.results.count_text"
							@paginate="setPage">
						</pagination>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
</template>

<script>
	import * as firebase from 'firebase';
	import {firebase_config} from '../../../../config/firebase'
	import vSelect from 'vue-select'
	import {Pagination} from 'vue-pagination-2'
	import StarRatings from './../../global/StarRatings.vue'

	var app = firebase.initializeApp(firebase_config)
	var firebase_db = app.database()
	var pros_ref = firebase_db.ref('professionals') 
	
	export default {
		data(){
			return {
				search: {
					is_loading: true,
					is_searching: false,
					results: {
						items: [],
						total: 0,
						current_page: 1,
						per_page: settings.pagination.per_page,
						count_text: 'Showing {from} to {to} of {count} found Professionals.',
					},
					filters: {
						professional_type: [],
						nearby: '',
						pro_name: '',
						pro_phone_number: ''
					},
					sort: 'all',
					professional_types: settings.professional_types,
				}
			}
		},

		mounted() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			this.$root.main.show = false;
			$( ".sort-link" ).click(function() {
			  $( ".sort" ).slideToggle( "slow", function() {
			    // Animation complete.
			  })
			});
			$( ".advanced-link" ).click(function() {
			  $( ".advanced-holder" ).slideToggle( "slow", function() {
			    // Animation complete.
			  });
			});
		},

		destroyed() {
			this.$parent.sidebar.show = true;
			this.$parent.in_user_dashboard = true;
			this.$root.main.show = true;
		},
		
		created() {
			this.searchProfessionals(true, 1)
		},

		watch: {
			'$route': 'searchProfessionals'
		},

		components: {
			vSelect,
			Pagination,
			StarRatings
		},

		methods: {
			sortResults(sort_value){
				var vm = this;
					vm.search.results.items = vm.search.results.items.sort(function(a, b){
						if(sort_value == 'online'){
							if(a.is_online){
								return -1;
							}else if(!a.is_online){
								return 1;
							}else{
								return 0;
							}
						}

						if(sort_value == 'offline'){
							if(a.is_online){
								return 1;
							}else if(!a.is_online){
								return -1;
							}else{
								return 0;
							}
						}

						if(sort_value == 'top_rated'){
							return b.pro_profile.review_rating_count - a.pro_profile.review_rating_count;
						}

						return 0;
					})
			},

			setPage(page){
				this.searchProfessionals(false, page)
			},

			searchProfessionals(first_time, page){
				var vm = this;

					if(!first_time){
						vm.search.is_searching = true;
					}

					vm.search.is_loading = true;

					axios
						.get(apiBaseUrl + 'search/pros', {
							params: {
								'filters[professional_type]': vm.search.filters.professional_type,
								'filters[nearby]': vm.search.filters.nearby,
								'filters[pro_name]': vm.search.filters.pro_name,
								'filters[pro_phone_number]': vm.search.filters.pro_phone_number,
								page: page
							}
						})
						.then((response)=>{
							var pros = response.data.data;
							vm.search.results.items = _.map(pros, function(pro){
								pro = pros[pro.id]
								pro['presence_image'] = pro.is_online ? '/frontsite/images/online-status.png' : '/frontsite/images/offline-status.png';
								return pro;
							})
							vm.search.results.total = response.data.total;
							
							vm.search.is_loading = false;

							// pros_ref.on('value', function(snapshot){
							// 	if(snapshot.val()){
							// 		vm.search.results = _.map(snapshot.val(), function(pro){
							// 			pro = pros[pro.id]
							// 			pro['presence_image'] = pro.is_online ? '/frontsite/images/online-status.png' : '/frontsite/images/offline-status.png';
							// 			return pro;
							// 		})
							// 	}
							// })
						},(error)=>{
							vm.$toastr('error', 'Something went wrong. Please try again later.', 'Profile Update')
							vm.search.is_loading = false;
						})
			}
		}
	}
</script>