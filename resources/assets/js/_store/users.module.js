import { resourceService } from '../_services';

const objName = "users";

const state = {
    all: {},
};

const actions = {
    index({ commit }, { urlPaginate, entries }) {
        commit('indexRequest');

        resourceService.index(objName, urlPaginate, entries)
            .then(
                response => commit('indexSuccess', response),
                error => commit('indexFailed', error)
            );
    },/*
    store({ commit }, object) {
        commit('storeRequest');

        resourceService.store(objName, object)
            .then(
                object => commit('storeSuccess', object),
                error => commit('storeFailed', error)
            );
    },
    update({ commit }, object) {
        commit('updateRequest');

        resourceService.update(objName, object)
            .then(
                object => commit('updateSuccess', object),
                error => commit('updateFailed', error)
            );
    },
    show({ commit }, id) {
        commit('showRequest');

        resourceService.show(objName, id)
            .then(
                object => commit('showSuccess', object),
                error => commit('showFailed', { id, error: error.toString() })
            );
    },*/
    delete({ commit }, id) {
        commit('deleteRequest', id);

        resourceService.delete(objName, id)
            .then(
                response => commit('deleteSuccess', id),
                error => commit('deleteSuccess', { id, error: error.toString() })
            );
    }
};

const mutations = {
    indexRequest(state) {
        state.all = { loading: true };
    },
    indexSuccess(state, response) {
        state.all = { items: response };
    },
    indexFailed(state, error) {
        state.all = { error };
    },/*
    storeRequest(state, object) {
        state.all = { loading: true };
    },
    storeSuccess(state, object) {
        state.all.items.data = state.all.items.data.push(object)
    },
    storeFailed(state, error) {
        state.all = { error };
    },
    updateRequest(state, object) {
        // add 'updating:true' property to obj being updated
        state.all.items = state.all.items.map(obj =>
            obj.id === object.id
                ? { ...obj, updating: true }
                : obj
        )
    },
    updateSuccess(state, object) {
        // remove object from state
        state.all.items = state.all.items.filter(obj => obj.id === object.id);
        // push new object from state
        state.all.items = state.all.items.push(object)
    },
    updateFailed(state, error) {
        state.all = { error };
    },
    showRequest(state, id) {
        // add 'showing:true' property to object being showd
        state.all.items = state.all.items.map(object =>
            object.id === id
                ? { ...object, showing: true }
                : object
        )
    },
    showSuccess(state, id) {
        // remove showd object from state
        state.all.items = state.all.items.map(object => object.id === id)
    },
    showFailure(state, { id, error }) {
        // remove 'deleting:true' property and add 'deleteError:[error]' property to object
        state.all.items = state.items.map(object => {
            if (object.id === id) {
                // make copy of object without 'showing:true' property
                const { showing, ...objectCopy } = object;
                // return copy of object with 'deleteError:[error]' property
                return { ...objectCopy, showingError: error };
            }

            return object;
        })
    },*/
    deleteRequest(state, id) {
        // add 'deleting:true' property to object being deleted
        state.all.items.data = state.all.items.data.map(object =>
            object.id === id
                ? { ...object, deleting: true }
                : object
        )
    },
    deleteSuccess(state, id) {
        // remove deleted object from state
        state.all.items.data = state.all.items.data.filter(object => object.id !== id)
    },
    deleteFailure(state, { id, error }) {
        // remove 'deleting:true' property and add 'deleteError:[error]' property to object
        state.all.items.data = state.items.data.map(object => {
            if (object.id === id) {
                // make copy of object without 'deleting:true' property
                const { deleting, ...objectCopy } = object;
                // return copy of object with 'deleteError:[error]' property
                return { ...objectCopy, deleteError: error };
            }

            return object;
        })
    }
};

export const users = {
    namespaced: true,
    state,
    actions,
    mutations
};
