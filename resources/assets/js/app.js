
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 
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
});
