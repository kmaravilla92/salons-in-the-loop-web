import Vue from 'vue';
// import VeeValidate from 'vee-validate';
import VueRouter from 'vue-router';
import Routes from './routes';

require('./bootstrap');

Vue.use(VueRouter);
// Vue.use(VeeValidate);

const user_type = document.querySelector('[name="user_type"]').value;
const routes = Routes[user_type];

const router = new VueRouter({
    routes
});

Vue.component('Sidebar', require('./components/user_accounts/global/Sidebar.vue'));
Vue.component('Loader', require('./components/global/Loader.vue'));
Vue.component('DashboardIconTile', require('./components/user_accounts/global/dashboard/IconTile.vue'));

user['type'] = user_type;

const app = new Vue({
    router,
    data(){
    	return {
    		user: _.extend(user, {
                notifications : []
            }),
    		sidebar: {
                show: true,
    			nav_items: _.filter(routes, function(route){
    				return route.in_menu || route.meta.in_menu
    			})
    		},
            main: {
                show: true
            },
            in_user_dashboard: true,
            custom_title: false,
    	}
    }
}).$mount('#app');