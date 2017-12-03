import Vue from 'vue';
import VueRouter from 'vue-router';
import Auth from './auth.js';
import routes from './routes';

require('./bootstrap');

Vue.use(VueRouter);
Vue.use(Auth);

console.log(routes);
const router = new VueRouter({
    routes
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        return Vue.auth.isAuthenticated() ? next() : next({ path: '/login' });
    }
    return next();
});

Vue.component('table-list', require('./components/TableList.vue'));

const appComponents = {
    'page-loader': require('./layouts/PageLoader.vue'),
    'top-bar': require('./layouts/TopBar.vue'),
    'side-bar': require('./layouts/SideBar.vue'),
    'main-content': require('./layouts/MainContent.vue')
};

const app = new Vue({
    router,
    components: appComponents,
    data(){
        return {
            isAuthenticated: Vue.auth.isAuthenticated()
        }
    },
    methods: {
        authenticateUser(user){
            Vue.auth.setToken(user);
            window.location.reload();
            // this.isAuthenticated = true;
            // this.$router.push('dashboard');
            // this.toggleBodyClass();
        },
        logoutUser(){
            console.log('logoutUser');
            Vue.auth.removeToken();
            window.location.reload();
            // this.isAuthenticated = false;
            // this.$router.push('login');
            // this.toggleBodyClass();
        },
        toggleBodyClass(){
           console.log('this.isAuthenticated',this.isAuthenticated)
            if(!this.isAuthenticated){
                $('body').addClass('login-page');
                // this.$router.push('login');
            }else{
                $('body').removeClass('login-page');
                // this.$router.push('dashboard');
            } 
        }
    },
    mounted(){
        this.toggleBodyClass();
    }
}).$mount('#app');