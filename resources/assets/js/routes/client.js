export default [
	{
		path: '/dashboard',  
		component: require('../components/user_accounts/clients/pages/dashboard/Main.vue'),
		meta: {
      title: 'Dashboard',
      in_menu: true,
      requires_dashboard: true,
      has_children: false,
      children: []
    }
	},
	{
		path: '/profile', 
		component: require('../components/user_accounts/clients/pages/ProfileEdit.vue'),
		in_menu: true,
    meta: {
      title: 'My Profile',
      in_menu: true,
      requires_dashboard: true,
      has_children: false,
      children: []
    }
	},
	{
		path: '/posted-requests', 
    name: 'client.posted-requests',
		title: 'My Posted Requests', 
		component: require('../components/user_accounts/clients/pages/PostedRequests.vue'),
		in_menu: true,
    meta: {
      title: 'My Posted Requests',
      in_menu: true,
      requires_dashboard: true,
      has_children: false,
      children: []
    }
	},
  {
  	path: '/posted-requests/:id', 
    name: 'client.posted-requests.details',
  	title: 'My Posted Requests Details', 
  	component: require('../components/user_accounts/clients/pages/PostedRequestDetails.vue'),
    meta: {
      title: 'My Posted Requests Details',
      in_menu: false,
      requires_dashboard: true,
      has_children: false,
      children: []
    }
  },
	{
		path: '/appointments', 
    name: 'client.appointments',
		title: 'My Appointments', 
		component: require('../components/user_accounts/clients/pages/Appointments.vue'),
		in_menu: true,
    meta: {
      title: 'My Appointments',
      in_menu: true,
      requires_dashboard: true,
      has_children: false,
      children: []
    }
	},
    {
    	path: '/appointments/:id', 
    	component: require('../components/user_accounts/clients/pages/AppointmentsDetails.vue'), 
      meta: {
        title: 'My Appointments Details',
        in_menu: false,
        requires_dashboard: true,
        has_children: false,
        children: []
      }
    },
	{
		path: '/profile-view-requests', 
		component: require('../components/user_accounts/clients/pages/ViewProfileRequest.vue'),
		in_menu: true,
    meta: {
      title: 'Request to View Profile',
      in_menu: true,
      requires_dashboard: true,
      has_children: false,
      children: []
    }
	},
	{
		path: '/reviews-and-ratings', 
		component: require('../components/user_accounts/global/reviews/List.vue'),
		in_menu: true,
    meta: {
      title: 'Reviews and Ratings',
      in_menu: true,
      requires_dashboard: true,
      has_children: false,
      children: []
    },
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
		component: require('../components/user_accounts/clients/pages/AccountSettings.vue'),
		in_menu: true,
    meta: {
      title: 'Account Settings',
      in_menu: true,
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
      in_menu: true,
      requires_dashboard: true,
      has_children: false,
      children: []
    }
	},
	{
		path: '/payment-info', 
		component: require('../components/user_accounts/global/pages/PaymentInfo.vue'),
		in_menu: true,
    meta: {
      title: 'Payment Information',
      in_menu: true,
      requires_dashboard: true,
      has_children: false,
      children: []
    }
	},
  {
  	path: '/search', 
    name: 'client.search', 
  	component: require('../components/user_accounts/clients/pages/SearchResult.vue'),
    meta: {
      title: 'Search',
      in_menu: false,
      requires_dashboard: false,
      has_children: false,
      children: []
    }
  },
  {
    path: '/name-my-own-price', 
    name: 'client.name-my-own-price', 
    component: require('../components/user_accounts/clients/pages/NameMyOwnPrice.vue'),
    meta: {
      title: 'Search',
      in_menu: false,
      requires_dashboard: false,
      has_children: false,
      children: []
    },
    children: [
      {
        path: ':id?', 
        name: 'client.name-my-own-price.step-1', 
        component: require('../components/user_accounts/clients/pages/NameMyOwnPriceStep1.vue'),
        meta: {
          title: 'Search',
          in_menu: false,
          requires_dashboard: false,
          has_children: false,
          children: []
        }
      },
      {
        path: ':id?/pre-payment', 
        name: 'client.name-my-own-price.pre-payment', 
        component: require('../components/user_accounts/clients/pages/NameMyOwnPricePrePayment.vue'),
        meta: {
          title: 'Search',
          in_menu: false,
          requires_dashboard: false,
          has_children: false,
          children: []
        }
      },
      {
        path: ':id?/final', 
        name: 'client.name-my-own-price.complete', 
        component: require('../components/user_accounts/clients/pages/NameMyOwnPriceComplete.vue'),
        meta: {
          title: 'Search',
          in_menu: false,
          requires_dashboard: false,
          has_children: false,
          children: []
        }
      }
    ]
  },
  {
    path: '/:pro_id/waiting-list/sign-in', 
    name: 'client.waiting-list.step1', 
    component: require('../components/user_accounts/clients/pages/WaitingList.vue'),
    meta: {
      title: 'Search',
      in_menu: false,
      requires_dashboard: false,
      has_children: false,
      children: []
    },
    children: [
      {
        path: ':waiting_list_id?/step-1', 
        name: 'client.waiting-list.step-1', 
        component: require('../components/user_accounts/clients/pages/WaitingListStep1.vue'),
        meta: {
          title: 'Search',
          in_menu: false,
          requires_dashboard: false,
          has_children: false,
          children: []
        }
      },
      {
        path: ':waiting_list_id?/step-2', 
        name: 'client.waiting-list.step-2', 
        component: require('../components/user_accounts/clients/pages/WaitingListStep2.vue'),
        meta: {
          title: 'Search',
          in_menu: false,
          requires_dashboard: false,
          has_children: false,
          children: []
        }
      },
      {
        path: ':waiting_list_id?/step-3', 
        name: 'client.waiting-list.step-3', 
        component: require('../components/user_accounts/clients/pages/WaitingListStep3.vue'),
        meta: {
          title: 'Search',
          in_menu: false,
          requires_dashboard: false,
          has_children: false,
          children: []
        }
      },
    ]
  },
  {
    path: '/book-appointment/:pro_id', 
    name: 'client.book-appointment', 
    component: require('../components/user_accounts/clients/pages/book_appointment/Main.vue'),
    meta: {
      title: 'Search',
      in_menu: false,
      requires_dashboard: false,
      has_children: false,
      children: []
    },
    children: [
      {
        path: 'step-1', 
        name: 'client.book-appointment.step-1', 
        component: require('../components/user_accounts/clients/pages/book_appointment/Step1.vue'),
        meta: {
          title: 'Search',
          in_menu: false,
          requires_dashboard: false,
          has_children: false,
          children: []
        }
      },
      {
        path: 'step-2', 
        name: 'client.book-appointment.step-2', 
        component: require('../components/user_accounts/clients/pages/book_appointment/Step2.vue'),
        meta: {
          title: 'Search',
          in_menu: false,
          requires_dashboard: false,
          has_children: false,
          children: []
        }
      },
      {
        path: 'step-3', 
        name: 'client.book-appointment.step-3', 
        component: require('../components/user_accounts/clients/pages/book_appointment/Step3.vue'),
        meta: {
          title: 'Search',
          in_menu: false,
          requires_dashboard: false,
          has_children: false,
          children: []
        }
      },
      {
        path: 'step-3/summary', 
        name: 'client.book-appointment.step-3.summary', 
        component: require('../components/user_accounts/clients/pages/book_appointment/Step3Summary.vue'),
        meta: {
          title: 'Search',
          in_menu: false,
          requires_dashboard: false,
          has_children: false,
          children: []
        }
      },
      {
        path: 'step-4', 
        name: 'client.book-appointment.step-4', 
        component: require('../components/user_accounts/clients/pages/book_appointment/Step4.vue'),
        meta: {
          title: 'Search',
          in_menu: false,
          requires_dashboard: false,
          has_children: false,
          children: []
        }
      },
      {
        path: 'step-5', 
        name: 'client.book-appointment.step-5', 
        component: require('../components/user_accounts/clients/pages/book_appointment/Step5.vue'),
        meta: {
          title: 'Search',
          in_menu: false,
          requires_dashboard: false,
          has_children: false,
          children: []
        }
      },
    ],
  },
]