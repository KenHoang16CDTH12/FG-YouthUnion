import { url } from '../_helpers';
import { accept } from '../_helpers';
import { authHeader } from '../_helpers';
import { contentType } from '../_helpers';
import { getUserID } from '../_utils/auth'
import { handleResponse } from '../_helpers';

export const notificationService = {
    index: _index,
    store: _store,
    show: _show,
    delete: _delete,
    clear: _clear
};

function _index(urlPaginate, query) {
    const requestOptions = {
        method: 'GET',
        headers: { ...authHeader(), ...contentType(), ...accept() }
    };
    /**
    * query = {'entries', 'searchText', 'sort'};
    */
    console.log(query);
    query.entries = query.entries || 10;
    query.searchText = query.searchText || '';
    query.sort = query.sort || 'asc';
    if (urlPaginate) urlPaginate = `${urlPaginate}&user_id=${getUserID()}&entries=${query.entries}&sort=${query.sort}&searchText=${query.searchText}`;
    else urlPaginate = `${url}/notifications?user_id=${getUserID()}&entries=${query.entries}&sort=${query.sort}&searchText=${query.searchText}`;
    return fetch(urlPaginate, requestOptions).then(handleResponse);
}

function _store(object) {
    const requestOptions = {
        method: 'POST',
        headers: { ...authHeader(), ...contentType(), ...accept() },
        body: JSON.stringify(object)
    };
    return fetch(`${url}/notifications`, requestOptions)
            .then(handleResponse);
}

function _show(id) {
    const requestOptions = {
        method: 'GET',
        headers: { ...authHeader(), ...contentType(), ...accept() }
    };

    return fetch(`${url}/notifications/${id}?user_id=${getUserID()}`, requestOptions).then(handleResponse);
}

// prefixed function name with underscore because delete is a reserved word in javascript
function _delete(id) {
    const requestOptions = {
        method: 'DELETE',
        headers: { ...authHeader(), ...contentType(), ...accept() }
    };

    return fetch(`${url}/notifications/${id}?user_id=${getUserID()}`, requestOptions).then(handleResponse);
}

function _clear() {
    const requestOptions = {
        method: 'DELETE',
        headers: { ...authHeader(), ...contentType(), ...accept() }
    };

    return fetch(`${url}/notifications?user_id=${getUserID()}`, requestOptions).then(handleResponse);
}

