require('./bootstrap');
require('vue-multiselect/dist/vue-multiselect.min.css');
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';
import Vuex from 'vuex';
import Cookies from 'js-cookie';
import Element from 'element-ui';
import VeeValidate from 'vee-validate';

Vue.use(Vuex);
Vue.use(Element, {
    size: Cookies.get('size') || 'medium', // set element-ui default size
    i18n: (key, value) => i18n.t(key, value)
});
Vue.use(VeeValidate);

window.Vue = require('vue');

//Components
Vue.component('back-button', require('./_components/BackButton.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './App.vue';
import store from './_stores';
import router from './_routers';
import i18n from './_langs'; // Internationalization
import './permission'; // permission control
import './errorLog'; // error log

// Global Event Bus
window.Events = new Vue();

// Add the router to every vue instance.
Vue.prototype.router = router;

Vue.prototype.goBack = () => {
    router.go(-1);
};
Vue.prototype.goNext = () => {
    router.go(1);
};

const app = new Vue({
    created() {
    },
    el: '#app',
    router,
    store,
    i18n
});
