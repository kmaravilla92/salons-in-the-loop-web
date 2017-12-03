export default [
    {
        path: '/login', 
        title: 'Login', 
        component: require('./pages/Login.vue'),
        meta: { forGuest: true }
    },
    {
        path: '/dashboard', 
        title: 'Dashboard', 
        name: 'dashboard',
        component: require('./pages/Dashboard.vue'),
        meta: { requiresAuth: true }
    },
    {
        path: '/users', 
        title: 'Users', 
        name: 'users',
        component: require('./pages/Users/Index.vue'),
        children: [
            {
                path: 'list',
                title: 'Users List',
                name: 'users.list',
                component: require('./pages/Users/List.vue'),
                meta: { requiresAuth: true }
            },
            {
                path: 'create',
                title: 'Create User',
                name: 'users.create',
                component: require('./pages/Users/Edit.vue'),
                meta: { requiresAuth: true }
            }
        ],
        meta: { requiresAuth: true }
    }
]