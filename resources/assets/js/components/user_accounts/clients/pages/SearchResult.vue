<template>
	<div class="content-container app-client-req-details help-req  dashboard-owner booked-rental search-client-req-details search-listing">
		<div class="inner-title">
			<h3>Search Result(s) Found : <span style="color:#000000;">{{ search.results.length }}</span>
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
				<div class="pro-holder" v-for="result in search.results">
					<div class="img-over">
						<div class="img-holder">
							<img 
								:src="result.profile_pic" 
								:alt="result.profile_pic"
							>
						</div>
						<div class="onoff-holder">
							<img 
								:src="result.presence_image" 
								:alt="result.presence_image">
						</div>
					</div>
					<h3>{{ result.full_name }}</h3>
					<h5>Nails</h5>
					<p><!-- Square Town, Square City, Colorado - CO, 11010 -->{{ result.address }}</p>
					<div class="rating-holder">
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
					</div>
					<a 
						:href="'/profile-view/'+result.id+'/professional'"  
						class="btn btn-grey-b"
						target="_blank" 
					>
							See My Profile
					</a>
				</div>
			</div>
			<div class="pagination-holder clearfix" v-if="search.results.length > 10">
				<div class="f-left">
				</div>
				<div class="pagination f-right">
					<a href="#">First</a>
					<a href="#">Previous</a>
					<a href="#">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#">Next</a>
					<a href="#">Last</a>
				</div>
			</div>

		</div>

	</div>
</template>

<script>
	import * as firebase from 'firebase';
	import {firebase_config} from '../../../../config/firebase';

	var app = firebase.initializeApp(firebase_config);
	var firebase_db = app.database();
	var pros_ref = firebase_db.ref('professionals'); 
	
	export default {
		data(){
			return {
				search: {
					results: [],
					filters: {
						looking_for: '',
						nearby: ''
					},
					sort: 'all'
				}
			}
		},

		mounted() {
			$('#main-wrapper').addClass('client-req app-client-req-details app-req-listing help-req-listing');
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			$('.client-bg-dark.banner-search').show();
			$( ".sort-link" ).click(function() {
			  $( ".sort" ).slideToggle( "slow", function() {
			    // Animation complete.
			  });
			});
		},

		destroyed() {
			$('#main-wrapper').removeClass('client-req app-client-req-details app-req-listing help-req-listing');
			this.$parent.sidebar.show = true;
			this.$parent.in_user_dashboard = true;
			$('.client-bg-dark.banner-search').hide();
		},
		
		created() {
			this.$parent.sidebar.show = false;
			this.$parent.in_user_dashboard = false;
			$('.client-bg-dark.banner-search').show();
			$( ".sort-link" ).click(function() {
			  $( ".sort" ).slideToggle( "slow", function() {
			    // Animation complete.
			  });
			});

			this.fetchData();
		},

		watch: {
			'$route': 'fetchData'
		},

		methods: {
			sortResults(sort_value){
				var vm = this;
					vm.search.results = vm.search.results.sort(function(a, b){
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

						return 0;
					});
			},
			fetchData(){
				var vm = this;
					axios
						.get(apiBaseUrl + 'search/pros')
						.then(function(response) {
							var pros = response.data;
							pros_ref.on('value', function(snapshot){
								if(snapshot.val()){
									vm.search.results = _.map(snapshot.val(), function(pro){
										pro = pros[pro.id]
										pro['presence_image'] = pro.is_online ? '/frontsite/images/online-status.png' : '/frontsite/images/offline-status.png';
										return pro;
									});
								}
							});
						});
			}
		}
	}
</script>