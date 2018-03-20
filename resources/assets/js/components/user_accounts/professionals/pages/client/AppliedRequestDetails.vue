<template>
	<div class="content-container app-client-req-details">
    <div class="inner-title">
      <h3>Client Request Applied Details</h3>
    </div>
    <Loader
      v-if="is_loading"
    >
    </Loader>
    <div class="request-details" v-if="!is_loading">
      <div class="clearfix title-details">
        <div class="f-left">
          <p><span>User Types </span>{{posted_request.category_csv}}</p>
          <h3>{{posted_request.title}} </h3>
          <label for=""><span>Posted</span> {{posted_request.created_at}}</label>
        </div>
        <div class="f-right">
          <p>Budget</p>
          <h5>${{posted_request.budget}}</h5>
        </div>
      </div>
      <div class="content">
        <p>{{posted_request.message}} </p>
        <label for=""><i class="fa fa-calendar" aria-hidden="true"></i> {{posted_request.desired_date}}</label>
        <label for=""><i class="fa fa-clock-o" aria-hidden="true"></i>  {{posted_request.desired_time}} <!--   -   <i class="fa fa-clock-o" aria-hidden="true"></i>  12:00 pm        --></label>{{full_address}}</label>
      </div>
      <div class="pro-details">
        <div class="status">
          <i class="fa fa-check" aria-hidden="true"></i>
          <label for="">Hired</label>
          <hr class="f-right">
        </div>

        <div class="pro-holder">
          <div class="img-holder">
            <div class="img-over">
              <img 
                :src="professional.profile_pic" 
                :alt="professional.profile_pic"
              >
            </div>
            <a 
              :href="'/profile-view/'+professional.id+'/professional'" 
              class="btn btn-red-b"
              target="_blank">
              See Profile
            </a>
          </div>
          <div class="information">
            <h3>{{professional.full_name}}</h3>
            <p>{{professional.full_address}}</p>
            <div class="rating">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
            </div>
          </div>
          <div class="description">
            <p>{{application.proposal}} </p>
          </div>
        </div>
        <div class="payment">
          <ul>
            <li class="clearfix">
              <p class="f-left">Amount</p>
              <p class="f-right">Status</p>
            </li>
            <li class="clearfix">
              <p class="f-left">$10.00</p>
              <p class="f-right"><span>Released</span></p>
            </li>
            <li class="clearfix">
              <p class="f-left">$90.00</p>
              <p class="f-right">Not yet released</p>
            </li>
          </ul>
          <p class="total">Total: $100.00</p>
        </div>
      </div>
      <div class="btn-holder write-review">
          <a href="#" class="btn btn-red-b">WRITE REVIEW</a>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        application: null,
        professional: null,
        client: null,
        posted_request: null,
        is_loading: true
      }
    },
    created() {
      this.fetchApplication();
    },
    '$route': 'fetchApplication',
    methods: {
      fetchApplication() {
        const vm = this;
          axios
          .get(
            apiBaseUrl + 'rest/professionals/'+userId+'/client/posted-requests/applications/' + this.$route.params.id
          )
          .then((response)=>{
            vm.application = response.data;
            vm.professional = vm.application.professional;
            vm.posted_request = vm.application.posted_request;
            vm.client = vm.application.posted_request.client;
            vm.is_loading = false;
          }, (error)=>{
            vm.is_loading = false;
            vm.$toastr('error', 'Something went wrong. Please try again later.', 'Applied Requests List');
          });
      },
    }
  }
</script>