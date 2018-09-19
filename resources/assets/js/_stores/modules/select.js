import { selectService } from '../../_services';

const state = {
    all: {},
};

const actions = {
    getRoles({ commit }, { objName }) {
        commit('getRequest');

        selectService.getRoles(objName)
            .then(
                response => commit('getSuccess', response),
                error => commit('getFailed', error)
            );
    }
};

const mutations = {
    getRequest(state) {
        state.all = { loading: true };
    },
    getSuccess(state, response) {
        state.all = { items: response };
    },
    getFailed(state, error) {
        state.all = { error };
    }
};

const select = {
    namespaced: true,
    state,
    actions,
    mutations,
};

export default select

