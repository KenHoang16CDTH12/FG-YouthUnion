import { authService } from '../_services';
import { router } from '../_helpers';

const auth = JSON.parse(localStorage.getItem('auth'));

const state = auth
    ? { status: { loggedIn: true }, auth }
    : { status: {}, auth: null };

const actions = {
    login({ dispatch, commit }, { email, password, remember_me }) {
        commit('loginRequest', { email });

        authService.login(email, password, remember_me)
            .then(
                auth => {
                    commit('loginSuccess', auth);
                    router.push('/dashboard');
                },
                error => {
                    commit('loginFailure', error);
                    dispatch('alert/error', error, { root: true });
                }
            );
    },
    logout({ commit }) {
        authService.logout();
        commit('logout');
    }
};


const mutations = {
    loginRequest(state, auth) {
        state.status = { loggingIn: true };
        state.auth = auth;
    },
    loginSuccess(state, auth) {
        state.status = { loggedIn: true };
        state.auth = auth;
    },
    loginFailure(state) {
        state.status = {};
        state.auth = null;
    },
    logout(state) {
        state.status = {};
        state.auth = null;
    }
};

export const account = {
    namespaced: true,
    state,
    actions,
    mutations
};
