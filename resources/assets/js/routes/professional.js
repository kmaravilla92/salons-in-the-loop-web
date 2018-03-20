import _ from 'lodash';

var children = {
  '/my-profile': [
    {
      path: '/my-profile/edit', 
      component: require('../components/user_accounts/professionals/pages/ProfileEdit.vue'),
      in_menu: false,
      meta: {
        title: 'My Profile',
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
      path: '/my-profile/services',
      name: 'professional.services', 
      title: 'My Services', 
      component: require('../components/user_accounts/professionals/pages/Services.vue'),
      in_menu: false,
      meta: {
        title: 'My Services',
        requires_dashboard: true,
        has_children: false,
        childness: {
          in_menu: true
        },
        children: []
      }
    },
    {
      path: '/my-profile/service-hours',
      name: 'professional.services-hours', 
      title: 'My Service Hours', 
      component: require('../components/user_accounts/professionals/pages/ServiceHours.vue'),
      in_menu: false,
      meta: {
        title: 'My Service Hours',
        requires_dashboard: true,
        has_children: false,
        childness: {
          in_menu: true
        },
        children: []
      }
    },
  ],
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
      name: 'professional.client.posted-requests.applied',
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
      name: 'professional.client.bookings',
      component: require('../components/user_accounts/professionals/pages/client/Bookings.vue'),
      in_menu: false,
      meta: {
        title: 'Booked Appointments',
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
      path: '/client/bookings/:id', 
      name: 'professional.client.bookings.single',
      component: require('../components/user_accounts/professionals/pages/client/BookingDetails.vue'),
      in_menu: false,
      meta: {
        title: 'Booked Appointments',
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
      path: '/owner/posted-rentals/:posted_rental_id/book',
      name: 'professional.owner.posted-rentals.book', 
      component: require('../components/user_accounts/professionals/pages/salon_owner/BookRental.vue'),
      in_menu: false,
      meta: {
        title: 'Search for Rentals',
        in_menu: false,
        requires_dashboard: true,
        has_children: false,
        childness: {
          in_menu: false
        },
        children: []
      },
      children: [
        {
          path: 'step-1',
          name: 'professional.owner.posted-rentals.book.step-1', 
          component: require('../components/user_accounts/professionals/pages/salon_owner/BookRentalStep1.vue'),
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
          path: 'step-2',
          name: 'professional.owner.posted-rentals.book.step-2', 
          component: require('../components/user_accounts/professionals/pages/salon_owner/BookRentalStep2.vue'),
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
          path: 'step-3',
          name: 'professional.owner.posted-rentals.book.step-3', 
          component: require('../components/user_accounts/professionals/pages/salon_owner/BookRentalStep3.vue'),
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
          path: 'step-4',
          name: 'professional.owner.posted-rentals.book.step-4', 
          component: require('../components/user_accounts/professionals/pages/salon_owner/BookRentalStep4.vue'),
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
      ]
    },
    {
      path: '/owner/posted-rentals/search',
      name: 'professional.owner.posted-rentals.search', 
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
      name: 'professional.owner.booked-rentals',
      component: require('../components/user_accounts/professionals/pages/salon_owner/BookedRentals.vue'),
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
      path: '/owner/booked-rentals/:rental_id', 
      name: 'professional.owner.booked-rentals.details',
      component: require('../components/user_accounts/professionals/pages/salon_owner/BookedRentalsDetails.vue'),
      in_menu: false,
      meta: {
        title: 'Search Help Request',
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
      path: '/owner/help-requests/search', 
      name: 'professional.owner.help-requests.search',
      component: require('../components/user_accounts/professionals/pages/search/OwnerHelpRequests.vue'),
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
      path: '/owner/help-requests/search/:id', 
      name: 'professional.owner.help-requests.search.details',
      component: require('../components/user_accounts/professionals/pages/search/OwnerHelpRequestDetails.vue'),
      in_menu: false,
      meta: {
        title: 'Help Request Applied',
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
      path: '/owner/help-requests/applied', 
      name: 'professional.owner.help-requests.applied',
      component: require('../components/user_accounts/professionals/pages/salon_owner/AppliedHelpRequests.vue'),
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
    },
    {
      path: '/owner/help-requests/applied/:id', 
      name: 'professional.owner.help-requests.applied.details',
      component: require('../components/user_accounts/professionals/pages/salon_owner/AppliedHelpRequestDetails.vue'),
      in_menu: false,
      meta: {
        title: 'Help Request Applied',
        in_menu: false,
        requires_dashboard: true,
        has_children: false,
        childness: {
          in_menu: false
        },
        children: []
      }
    }
  ],
  '/calendar': [
    {
      path: '/calendar/view/:pro_id?', 
      component: require('../components/user_accounts/professionals/pages/calendar/View.vue'),
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
      path: '/calendar/view/day/:day/edit',
      name: 'professional.calendar.day.edit',
      component: require('../components/user_accounts/professionals/pages/calendar/EditDay.vue'),
      in_menu: false,
      meta: {
        title: 'Edit Calendar Day',
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
      path: '/calendar/appointments',
      // component: require('../components/user_accounts/professionals/pages/calendar/Appointments.vue'),
      component: require('../components/user_accounts/professionals/pages/client/Bookings.vue'),
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
      path: '/calendar/settings/edit',
      component: require('../components/user_accounts/professionals/pages/calendar/Settings.vue'),
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
    path: '/my-profile', 
    title: 'My Profile', 
    component: require('../components/user_accounts/professionals/pages/ProfileEdit.vue'),
    in_menu: true,
    meta: {
      title: 'My Profile', 
      requires_dashboard: true,
      has_children: true,
      children: []
    }
  },
  {
    path: '/client', 
    title: 'Client Connections', 
    component: require('../components/user_accounts/professionals/pages/search/ClientsPostedRequests.vue'),
    in_menu: true,
    meta: {
      title: 'Client Connections',
      requires_dashboard: true,
      has_children: true,
      children: []
    }
  },
  {
    path: '/salon-owner', 
    title: 'Jobs', 
    component: require('../components/user_accounts/professionals/pages/search/OwnerPostedRentals.vue'),
    in_menu: true,
    meta: {
      title: 'Jobs',
      requires_dashboard: true,
      has_children: true,
      children: []
    }
  },
  {
    path: '/calendar', 
    title: 'My Calendar', 
    component: require('../components/user_accounts/professionals/pages/ProfileEdit.vue'),
    in_menu: true,
    meta: {
      title: 'My Calendar',
      requires_dashboard: true,
      has_children: true,
      children: []
    }
  },
  {
    path: '/reviews-and-ratings', 
    component: require('../components/user_accounts/global/reviews/List.vue'),
    name: 'professional.review-ratings',
    meta: {
        title: 'Reviews and Ratings',
        in_menu: true,
        requires_dashboard: true,
        has_children: false,
        children: []
      }
  },
  {
    path: '/reviews-and-ratings/write-a-review/:record_type/:record_id/:for_user_id',
    name: 'client.write-a-review',
    component: require('../components/user_accounts/global/reviews/Write.vue'), 
    meta: {
      title: 'Reviews and Ratings - Write a Review',
      in_menu: false,
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