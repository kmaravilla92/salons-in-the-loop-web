export default [
	{
		path: '/dashboard',
		component: require('../components/user_accounts/owners/pages/Dashboard.vue'),
		name: 'owner.dashboard',
		in_menu: true,
		meta: {
	      title: 'Dashboard', 
	      in_menu: true,
	      requires_dashboard: true,
	      has_children: false,
	      children: []
	    }
	},
	{
		path: '/profile-edit',
		component: require('../components/user_accounts/owners/pages/ProfileEdit.vue'),
		name: 'owner.profile-edit',
		meta: {
	      title: 'My Profile',
	      in_menu: true,
	      requires_dashboard: true,
	      has_children: false,
	      children: []
	    }
	},
	{
		
		path: '/posted-rentals',  
		component: require('../components/user_accounts/owners/pages/PostedRentals.vue'),
		name: 'owner.posted-rentals',
		meta: {
	      title: 'My Posted Rentals',
	      in_menu: true,
	      requires_dashboard: true,
	      has_children: false,
	      children: []
	    }
	},
	{
		
		path: '/posted-rentals/:id', 
		title: 'My Posted Rental Details', 
		component: require('../components/user_accounts/owners/pages/PostedRentalDetails.vue'),
		name: 'owner.posted-rentals.details',
		meta: {
	      title: 'My Posted Rental Details',
	      in_menu: false,
	      requires_dashboard: true,
	      has_children: false,
	      children: []
	    }
	},
	{
		path: '/posted-help-requests', 
		component: require('../components/user_accounts/owners/pages/PostedHelpRequests.vue'),
		name: 'owner.posted-help-requests',
		meta: {
	      title: 'My Posted Help Request',
	      in_menu: true,
	      requires_dashboard: true,
	      has_children: false,
	      children: []
	    }
	},
	{
		path: '/posted-help-requests/:id', 
		component: require('../components/user_accounts/owners/pages/PostedHelpRequestDetails.vue'),
		name: 'owner.posted-help-requests.details',
		meta: {
	      title: 'My Posted Help Request Details',
	      in_menu: false,
	      requires_dashboard: true,
	      has_children: false,
	      children: []
	    }
	},
	{
		path: '/block-and-unblock',
		component: require('../components/user_accounts/owners/pages/BlockUnblockPros.vue'),
		name: 'owner.block-unblock',
		meta: {
	      title: 'Block / Unblock', 
	      in_menu: true,
	      requires_dashboard: true,
	      has_children: false,
	      children: []
	    }
	},
	{
		path: '/reviews-and-ratings', 
		component: require('../components/user_accounts/owners/pages/ReviewRatings.vue'),
		name: 'owner.review-ratings',
		meta: {
	      title: 'Reviews and Ratings',
	      in_menu: true,
	      requires_dashboard: true,
	      has_children: false,
	      children: []
	    }
	},
	{
		path: '/account-settings',
		component: require('../components/user_accounts/owners/pages/AccountSettings.vue'),
		name: 'owner.account-settings',
		meta: {
	      title: 'Account Setting', 
	      in_menu: true,
	      requires_dashboard: true,
	      has_children: false,
	      children: []
	    }
	},
	{
		path: '/payment-history',
		component: require('../components/user_accounts/global/pages/PaymentHistory.vue'),
		name: 'owner.payment-history',
		meta: {
	      title: 'Payment History', 
	      in_menu: true,
	      requires_dashboard: true,
	      has_children: false,
	      children: []
	    }
	},
	{
		path: '/payment-information',
		component: require('../components/user_accounts/global/pages/PaymentInfo.vue'),
		name: 'owner.payment-information',
		meta: {
	      title: 'Payment Info',
	      in_menu: true,
	      requires_dashboard: true,
	      has_children: false,
	      children: []
	    }
	},
	{
		path: '/request-nearby-help',
		component: require('../components/user_accounts/owners/pages/RequestNearbyHelpMain.vue'),
		name: 'owner.request-nearby-help',
		meta: {
	      title: 'Request Nearby Help',
	      in_menu: false,
	      requires_dashboard: false,
	      has_children: false,
	      children: []
	    },
	    children: [
	    	{
				path: ':posted_help_request_id?/step-1', 
				name: 'owner.request-nearby-help.step-1', 
				component: require('../components/user_accounts/owners/pages/RequestNearbyHelpStep1.vue'),
				meta: {
					title: 'Request Nearby Help',
					in_menu: false,
					requires_dashboard: false,
					has_children: false,
					children: []
				}
			},
			{
				path: ':posted_help_request_id/step-2', 
				name: 'owner.request-nearby-help.step-2', 
				component: require('../components/user_accounts/owners/pages/RequestNearbyHelpStep2.vue'),
				meta: {
					title: 'Request Nearby Help',
					in_menu: false,
					requires_dashboard: false,
					has_children: false,
					children: []
				}
			},
			{
				path: ':posted_help_request_id/step-3', 
				name: 'owner.request-nearby-help.step-3', 
				component: require('../components/user_accounts/owners/pages/RequestNearbyHelpStep3.vue'),
				meta: {
					title: 'Request Nearby Help',
					in_menu: false,
					requires_dashboard: false,
					has_children: false,
					children: []
				}
			},
			{
				path: ':posted_help_request_id/step-4', 
				name: 'owner.request-nearby-help.step-4', 
				component: require('../components/user_accounts/owners/pages/RequestNearbyHelpStep4.vue'),
				meta: {
					title: 'Request Nearby Help',
					in_menu: false,
					requires_dashboard: false,
					has_children: false,
					children: []
				}
			},
	    ]
	},
]