
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');
import Vuex from 'vuex';
import Vuelidate from 'vuelidate';


Vue.use(Vuelidate)

Vue.use(Vuex);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import router from './router';
import store from './store';
import MenuSidebar from './components/MenuSidebar.vue';
import MenuNavbar from './components/MenuNavbar.vue';
import ActivityFooter from './components/ActivityFooter.vue';
import Error from './components/error/Error.vue';

//Layout s
Vue.component('application-layout', require('./layouts/ApplicationView.vue'));
//Forms
Vue.component('form-login', require('./components/auth/Login.vue'));
//Card
Vue.component('card-footer', require('./components/CardFooter.vue'));
//Options
Vue.component('paginator', require('./components/Paginator.vue'));

// Global Event Bus
window.Events = new Vue();

// Add the router to every vue instance.
Vue.prototype.router = router;

Vue.prototype.goBack = () => {
    router.go(-1);
};


// Vue.prototype.isAdmin = window.App.user ? window.App.user.is_admin : false;

// import {Alert} from './utilities';
// Vue.prototype.Alert = Alert;


const app = new Vue({
    created() {
    },
    el: '#app',
    components: {
      MenuNavbar,
      MenuSidebar,
      ActivityFooter,
      Error
    },
    router,
    store: store
});
