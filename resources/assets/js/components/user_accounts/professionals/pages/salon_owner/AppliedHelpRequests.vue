<template>
	<div class="content-container app-client-req-details app-req-listing help-req-listing">
		<div class="inner-title">
			<h3>Help Request Applied
				<div class="sort-holder f-right">
					<a class="sort-link">Sort by  <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
					<ul class="sort">
						<li><a href="#">All</a></li>
						<li><a href="#">Pending Jobs</a></li>
						<li><a href="#">Completed</a></li>
					</ul>
				</div>
			</h3>
		</div>
		<div class="request-details">
			<Loader
        v-if="applications.is_loading"
        text="LOADING POSTED REQUESTS APPLICATIONS ..."
      > 
      </Loader>
			<ul>
				<li
          v-for="application in applications.items"
          >
					<div class="clearfix title-details">
						<div class="f-left">
							<p><span>User Types </span>{{application.posted_help_request.category_csv}}</p>
							<h3>{{application.posted_help_request.title}} </h3>
							<label for=""><span>Posted</span> <!-- Today10/26/2017 -->{{application.posted_help_request.created_at}}</label>
						</div>
						<div class="f-right">
							<p>Weekly Total</p>
							<h5>${{application.posted_help_request.weekly_total}}</h5>
						</div>
					</div>
					<div class="content">
						<p>{{application.posted_help_request.description}} </p>
					</div>
					<div class="content-listing">
						<ul class="info">

							<li>
								<h5>Desired Date</h5>
								<p><i class="fa fa-calendar" aria-hidden="true"></i> {{application.posted_help_request.start_date}} <span>-</span> <i class="fa fa-calendar" aria-hidden="true"></i> {{application.posted_help_request.end_date}}</p>
							</li>
							<li>
								<h5>Type / Rates</h5>
								<p> {{application.posted_help_request.rate_text}}   <span>-</span> {{application.posted_help_request.selected_days_text_short}}  </p>
							</li>
							<li>
								<h5>Desired Time</h5>
								<p> <i class="fa fa-clock-o" aria-hidden="true"></i> {{application.posted_help_request.start_time}} <span>-</span> <i class="fa fa-clock-o" aria-hidden="true"></i> {{application.posted_help_request.end_time}}</p>
							</li>
							<li>
								<h5>Address</h5>
								<p><i class="fa fa-map-marker" aria-hidden="true"></i>  {{application.posted_help_request.full_address}}</p>
							</li>
						</ul>
						<div class="btn-holder">
							<router-link 
                :to="{name:'professional.owner.help-requests.applied.details', params: { id: application.id } }"
                class="btn btn-blue">
                SEE DETAILS
              </router-link>
						</div>
					</div>
				</li>
			</ul>
			<div class="pagination-holder clearfix">
        <div class="pagination">
          <pagination 
            :records="applications.total"
            :perPage="applications.per_page"
            :countText="applications.countText"
            @paginate="setPage">
          </pagination>
        </div>
      </div>
		</div>
	</div>
</template>

<script>
  import {Pagination} from 'vue-pagination-2'
	export default {
    data() {
      return {
        applications: {
          items: [],
          is_loading: false,
          current_page: 1,
          total: 0,
          per_page: settings.pagination.per_page,
          countText: 'Showing {from} to {to} of {count} My Applied Client Requests',
        },
      }
    },
    mounted() {
      $( ".sort-link" ).click(function() {
        $( ".sort" ).slideToggle( "slow", function() {});
      });
    },
    created() {
      this.fetchApplications();
    },
    '$route': 'fetchApplications',
    components: {
    	Pagination
    },
    methods: {
    	setPage(page) {
    		this.applications.current_page = page;
    		this.fetchApplications();
    	},
      fetchApplications() {
        const vm = this;
          axios
          .get(
            apiBaseUrl + 'rest/professionals/'+userId+'/owner/posted-help-requests/applications', {
            	params: {
            		page: vm.applications.current_page
            	}
            }
          )
          .then((response)=>{
            const data = response.data;
            vm.applications.items = data.data;
            vm.applications.total = data.total;
            vm.applications.is_loading = false;
          }, (error)=>{
            vm.applications.is_loading = false;
            vm.$toastr('error', 'Something went wrong. Please try again later.', 'Applied Help Requests List');
          });
      },
    }
	}
</script>