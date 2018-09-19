import Vue from 'vue';
import Vuex from 'vuex';

import getters from './getters';
import app from './modules/app';
import user from './modules/user';
import select from './modules/select';
import tagsView from './modules/tagsView';
import permission from './modules/permission';

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        app,
        user,
        select,
        tagsView,
        permission
    },
    getters
});

export default store

