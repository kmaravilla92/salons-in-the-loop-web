import Vue from 'vue';
import VeeValidate from 'vee-validate';
import VueRouter from 'vue-router';
import VueToastr from '@deveodk/vue-toastr';
import '@deveodk/vue-toastr/dist/@deveodk/vue-toastr.css'
import Routes from './routes';

require('./bootstrap');

Vue.use(VueRouter);
Vue.use(VeeValidate);
Vue.use(VueToastr, {
    defaultPosition: 'toast-top-right',
});
Vue.use(VueGrecaptcha, {
  sitekey: settings.grecaptcha.sitekey
});

const user_type = $('[name="user_type"]').last().val();
const routes = Routes[user_type];

const router = new VueRouter({
    routes
});

router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.has_children)){
        return next(false);
    }
    return next();
});

Vue.component('Sidebar', require('./components/user_accounts/global/Sidebar.vue'));
Vue.component('Loader', require('./components/global/Loader.vue'));
Vue.component('DashboardIconTile', require('./components/user_accounts/global/dashboard/IconTile.vue'));
Vue.component('PaymentForm', require('./components/global/PaymentForm.vue'));

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

const notificationsPopupApp = new Vue({
    data() {
        return {
            user: user
        }
    },
    template: '<PopupNotifications :user="user"></PopupNotifications>',
    components: {
        PopupNotifications: require('./components/global/Notifications/Popup.vue')
    }
}).$mount('#popup-notifications');