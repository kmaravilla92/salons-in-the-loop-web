<template>
	<div class="content-container app-client-req-details app-req-listing">
    <div class="inner-title">
      <h3>Applied Clients’s Request
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
            <div class="pro-applied">
              <label for="">{{application.posted_request.professionals_applied_count}}</label>
              <p> Professionals Applied</p>
            </div>
            <div class="btn-holder">            
              <router-link 
                :to="{name:'professional.clients-posted-requests.applied.details', params: { id: application.posted_request.id } }"
                class="btn btn-blue">
                SEE DETAILS
              </router-link>
            </div>
          </div>
        </li>
      </ul>
      <div class="pagination-holder clearfix" v-if="applications.length > 0">
        <div class="f-left">
          <p>Showing 8 out of 8 of Applied Client’s Request</p>
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
  import axios from 'axios';
	export default {
    data() {
      return {
        applications: {
          items: [],
          is_loading: false,
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
    methods: {
      fetchApplications() {
        const vm = this;
          axios
          .get(
            apiBaseUrl + 'rest/professionals/'+userId+'/client/posted-requests/applications'
          )
          .then(function(response) {
            vm.applications = {
              items: response.data,
              is_loading: false
            };
          }, function(error) {
            vm.applications.is_loading = false;
            console.log('error', error);
            alert('Something went wrong. Please try again later');
          });
      },
    }
	}
</script>