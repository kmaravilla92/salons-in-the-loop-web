import _ from 'lodash';

var children = {
  '/client': [
    {
      path: '/client/posted-requests/search', 
      component: require('../components/user_accounts/professionals/pages/search/ClientsPostedRequests.vue'),
      in_menu: false,
      meta: {
        title: 'Search Client\'s Requests',
        in_menu: false,
        requires_dashboard: true,
        has_children: false,
        childness: {
          in_menu: true
        },
        children: []
      }
    },
    {
      path: '/client/posted-requests/applied', 
      component: require('../components/user_accounts/professionals/pages/client/AppliedRequests.vue'),
      in_menu: false,
      meta: {
        title: 'Client Requests Applied',
        in_menu: false,
        requires_dashboard: true,
        has_children: false,
        childness: {
          in_menu: true
        },
        children: []
      }
    },
    {
      path: '/client/posted-requests/applied/:id',  
      name: 'professional.clients-posted-requests.applied.details',
      component: require('../components/user_accounts/professionals/pages/client/AppliedRequestDetails.vue'),
      in_menu: false,
      meta: {
        title: 'Client Applied Request Details',
        in_menu: false,
        requires_dashboard: true,
        has_children: false,
        childness: {
          in_menu: false
        },
        children: []
      }
    },
    {
      path: '/client/bookings', 
      component: require('../components/user_accounts/professionals/pages/client/Bookings.vue'),
      in_menu: false,
      meta: {
        title: 'Client Bookings',
        in_menu: false,
        requires_dashboard: true,
        has_children: false,
        childness: {
          in_menu: true
        },
        children: []
      }
    },
    {
      path: '/client/waiting-list', 
      component: require('../components/user_accounts/professionals/pages/client/WaitingList.vue'),
      in_menu: false,
      meta: {
        title: 'Client Waiting List',
        in_menu: false,
        requires_dashboard: true,
        has_children: false,
        childness: {
          in_menu: true
        },
        children: []
      }
    }
  ],
  '/salon-owner': [
    {
      path: '/owner/posted-rentals/search',
      component: require('../components/user_accounts/professionals/pages/search/OwnerPostedRentals.vue'),
      in_menu: false,
      meta: {
        title: 'Search for Rentals',
        in_menu: false,
        requires_dashboard: true,
        has_children: false,
        childness: {
          in_menu: true
        },
        children: []
      }
    },
    {
      path: '/owner/posted-rentals/search/:id',
      name: 'professional.owner.posted-rentals.search.details', 
      component: require('../components/user_accounts/professionals/pages/search/OwnerPostedRentalDetails.vue'),
      in_menu: false,
      meta: {
        title: 'Search for Rental Details',
        in_menu: false,
        requires_dashboard: false,
        has_children: false,
        childness: {
          in_menu: false
        },
        children: []
      }
    },
    {
      path: '/owner/booked-rentals', 
      component: require('../components/user_accounts/professionals/pages/client/AppliedRequestDetails.vue'),
      in_menu: false,
      meta: {
        title: 'Booked Rentals',
        in_menu: false,
        requires_dashboard: true,
        has_children: false,
        childness: {
          in_menu: true
        },
        children: []
      }
    },
    {
      path: '/client/applied-requests/:id', 
      component: require('../components/user_accounts/professionals/pages/client/AppliedRequestDetails.vue'),
      in_menu: false,
      meta: {
        title: 'Search Help Request',
        in_menu: false,
        requires_dashboard: true,
        has_children: false,
        childness: {
          in_menu: true
        },
        children: []
      }
    },
    {
      path: '/client/applied-requests/:id', 
      component: require('../components/user_accounts/professionals/pages/client/AppliedRequestDetails.vue'),
      in_menu: false,
      meta: {
        title: 'Help Request Applied',
        in_menu: false,
        requires_dashboard: true,
        has_children: false,
        childness: {
          in_menu: true
        },
        children: []
      }
    }
  ],
  '/calendar': [
    {
      path: '/client/applied-requests/:id', 
      component: require('../components/user_accounts/professionals/pages/client/AppliedRequestDetails.vue'),
      in_menu: false,
      meta: {
        title: 'View Calendar',
        in_menu: false,
        requires_dashboard: true,
        has_children: false,
        childness: {
          in_menu: true
        },
        children: []
      }
    },
    {
      path: '/client/applied-requests/:id',
      component: require('../components/user_accounts/professionals/pages/client/AppliedRequestDetails.vue'),
      in_menu: false,
      meta: {
        title: 'Client Appointments',
        in_menu: false,
        requires_dashboard: true,
        has_children: false,
        childness: {
          in_menu: true
        },
        children: []
      }
    },
    {
      path: '/client/applied-requests/:id',
      component: require('../components/user_accounts/professionals/pages/client/AppliedRequestDetails.vue'),
      in_menu: false,
      meta: {
        title: 'Create/Edit Calendar',
        in_menu: false,
        requires_dashboard: true,
        has_children: false,
        childness: {
          in_menu: true
        },
        children: []
      }
    }
  ]
}

var routes = [
  {
    path: '/dashboard', 
    title: 'Dashboard', 
    component: require('../components/user_accounts/professionals/pages/dashboard/Main.vue'),
    in_menu: true,
    meta: {
      title: 'Dashboard',
      requires_dashboard: true,
      has_children: false,
      children: []
    }
  },
  {
    path: '/profile-edit', 
    title: 'My Profile', 
    component: require('../components/user_accounts/professionals/pages/ProfileEdit.vue'),
    in_menu: true,
    meta: {
      title: 'My Profile', 
      requires_dashboard: true,
      has_children: false,
      children: []
    }
  },
  {
    path: '/client', 
    title: 'Client', 
    component: require('../components/user_accounts/professionals/pages/ProfileEdit.vue'),
    in_menu: true,
    meta: {
      title: 'Client',
      requires_dashboard: true,
      has_children: true,
      children: []
    }
  },
  {
    path: '/salon-owner', 
    title: 'Salon Owner', 
    component: require('../components/user_accounts/professionals/pages/ProfileEdit.vue'),
    in_menu: true,
    meta: {
      title: 'Salon Owner',
      requires_dashboard: true,
      has_children: true,
      children: []
    }
  },
  {
    path: '/calendar', 
    title: 'Calendar', 
    component: require('../components/user_accounts/professionals/pages/ProfileEdit.vue'),
    in_menu: true,
    meta: {
      title: 'Calendar',
      requires_dashboard: true,
      has_children: true,
      children: []
    }
  },
  {
    path: '/review-and-ratings', 
    title: 'Review and Ratings', 
    component: require('../components/user_accounts/professionals/pages/ReviewRatings.vue'),
    in_menu: true,
    meta: {
      title: 'Review and Ratings',
      requires_dashboard: true,
      has_children: false,
      children: []
    }
  },
  {
    path: '/account-settings', 
    title: 'Account Settings', 
    component: require('../components/user_accounts/professionals/pages/AccountSettings.vue'),
    in_menu: true,
    meta: {
      title: 'Account Settings',
      requires_dashboard: true,
      has_children: false,
      children: []
    }
  },
  {
    path: '/payment-history', 
    title: 'Payment History', 
    component: require('../components/user_accounts/global/pages/PaymentHistory.vue'),
    in_menu: true,
    meta: {
      title: 'Payment History',
      requires_dashboard: true,
      has_children: false,
      children: []
    }
  },
  {
    path: '/payment-information', 
    title: 'Payment Information', 
    component: require('../components/user_accounts/global/pages/PaymentInfo.vue'),
    in_menu: true,
    meta: {
      title: 'Payment Information',
      requires_dashboard: true,
      has_children: false,
      children: []
    }
  },
  {
    path: '/clients/posted-requests/search',
    name: 'professional.clients-posted-requests-search', 
    title: 'Clients Posted Requests Search', 
    component: require('../components/user_accounts/professionals/pages/search/ClientsPostedRequests.vue'),
    in_menu: false,
    meta: {
      title: 'Clients Posted Requests Search',
      requires_dashboard: true,
      has_children: false,
      children: []
    }
  },
  {
    path: '/clients/posted-requests/search/:id',
    name: 'professional.clients-posted-requests-search-details', 
    title: 'Clients Posted Requests Search Details', 
    component: require('../components/user_accounts/professionals/pages/search/ClientPostedRequestDetails.vue'),
    in_menu: false,
    meta: {
      title: 'Clients Posted Requests Search Details',
      requires_dashboard: true,
      has_children: false,
      children: []
    }
  },
  {
    path: '/services',
    name: 'professional.services', 
    title: 'Services', 
    component: require('../components/user_accounts/professionals/pages/Services.vue'),
    in_menu: false,
    meta: {
      title: 'Services',
      requires_dashboard: true,
      has_children: false,
      children: []
    }
  },
  {
    path: '/service-hours',
    name: 'professional.services-hours', 
    title: 'Services', 
    component: require('../components/user_accounts/professionals/pages/ServiceHours.vue'),
    in_menu: false,
    meta: {
      title: 'Services',
      requires_dashboard: true,
      has_children: false,
      children: []
    }
  },
]

var routes_list = []

_.each(routes, function(route,index){
  if(route.meta.has_children){
    if(typeof children[route.path] != 'undefined'){
      route.meta.children = _.filter(children[route.path], function(child_route){
        return child_route.meta.childness.in_menu
      })
      routes_list.push(route)
      _.each(children[route.path], function(child_route){
        routes_list.push(child_route)
      })
    }
  }else{
    routes_list.push(route)
  }
})

export default routes_list