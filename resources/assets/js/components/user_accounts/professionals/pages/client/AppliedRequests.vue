<template>
	<div class="content-container app-client-req-details app-req-listing">
    <div class="inner-title">
      <h3>Applied Clients’s Request
        <div class="sort-holder f-right">
          <a class="sort-link">Sort by  <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
          <ul class="sort">
            <li><a href="#" @click.prevent="alert('FEATURE UNDER DEVELOPMENT')">All</a></li>
            <li><a href="#" @click.prevent="alert('FEATURE UNDER DEVELOPMENT')">Pending Jobs</a></li>
            <li><a href="#" @click.prevent="alert('FEATURE UNDER DEVELOPMENT')">Completed</a></li>
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
      <p
        v-if="!applications.items.length && !applications.is_loading"
      >
        No applications available.
      </p>
      <ul>
        <li
          v-for="application in applications.items"
          >
          <div class="clearfix title-details">
            <div class="f-left">
              <p><span>User Types </span>Barber, Hair Stylist,...</p>
              <h3>{{application.posted_request.title}} </h3>
              <label for=""><span>Posted</span> {{application.posted_request.created_at}}</label>
            </div>
            <div class="f-right">
              <p>Budget</p>
              <h5>$ {{application.posted_request.budget}}</h5>
            </div>
          </div>
          <div class="content">
            <p>{{application.posted_request.description}} </p>
          </div>
          <div class="content-listing">
            <div class="info">
              <p><i class="fa fa-calendar" aria-hidden="true"></i> {{application.posted_request.desired_date}}</p>
              <p><i class="fa fa-clock-o" aria-hidden="true"></i>  {{application.posted_request.desired_time}}</p>
              <p><i class="fa fa-map-marker" aria-hidden="true"></i>  {{application.posted_request.full_address}}</p>
            </div>
            <div class="pro-applied" style="visibility: hidden;">
              <label for="">{{application.posted_request.professionals_applied_count}}</label>
              <p> Professionals Applied</p>
            </div>
            <div class="btn-holder">            
              <router-link 
                :to="{name:'professional.clients-posted-requests.applied.details', params: { id: application.id } }"
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

<style>
  .sort li {
    padding: 0 !important;
  }
</style>

<script>
  import {Pagination} from 'vue-pagination-2'
	export default {
    data() {
      return {
        applications: {
          items: [],
          is_loading: true,
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
      setPage(page){
        this.applications.current_page = page;
        this.fetchApplications();
      },
      fetchApplications() {
        const vm = this;
          axios
          .get(
            apiBaseUrl + 'rest/professionals/'+userId+'/client/posted-requests/applications',
            {
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
            vm.$toastr('error', 'Something went wrong. Please try again later.', 'Applied Requests List');
          });
      },
    }
	}
</script>