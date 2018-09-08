import Vue from 'vue';
import Vuex from 'vuex';

import { alert } from './alert.module';
import { account } from './account.module';
import { users } from './users.module';
import { namhocs } from './namhocs.module';
import { khoas } from './khoas.module';
import { lops } from './lops.module';
import { lcdoans } from './lcdoans.module';
import { hockys } from './hockys.module';

Vue.use(Vuex);

export const store = new Vuex.Store({
    modules: {
        alert,
        account,
        users,
        namhocs,
        khoas,
        lops,
        lcdoans,
        hockys
    }
});