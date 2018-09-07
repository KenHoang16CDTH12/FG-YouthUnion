require('./bootstrap');
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';
import Vuex from 'vuex';
import VeeValidate from 'vee-validate';
import VueInternationalization from 'vue-i18n';
import Locale from './vue-i18n-locales.generated';

Vue.use(Vuex);
Vue.use(VeeValidate);
Vue.use(VueInternationalization);
window.Vue = require('vue');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

<<<<<<< HEAD
 
/*============================================
*   Common
*============================================*/
Vue.component('navbar', require('./components/common/Navbar.vue'));
Vue.component('sidebar', require('./components/common/Sidebar.vue'));
Vue.component('footerr', require('./components/common/Footer.vue'));
/*============================================
*   //
*============================================*/
Vue.component('users', require('./components/Users.vue'));

const app = new Vue({
    el: '#root'
=======
import App from './app/App';
import { store } from './_store';
import { router } from './_helpers';

// setup fake backend
//import { configureFakeBackend } from './_helpers';
//configureFakeBackend();
//Options
const lang = localStorage.getItem('lang') ? localStorage.getItem('lang') : 'en';
// or however you determine your current app locale

const i18n = new VueInternationalization({
    locale: lang,
    messages: Locale
});

new Vue({
    created() {
    },
    el: '#app',
    i18n,
    components: {
    },
    router,
    store,
    render: h => h(App)
>>>>>>> 2256b5e18133d3855b72c57acfdfe51f6877a847
});
