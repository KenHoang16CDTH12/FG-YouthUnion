import { url } from '../_helpers';
import { accept } from '../_helpers';
import { authHeader } from '../_helpers';
import { contentType } from '../_helpers';
import { handleResponse } from '../_helpers';

export const resourceService = {
    index: _index,
    store: _store,
    update: _update,
    show: _show,
    delete: _delete
};

function _index(objName, urlPaginate, entries) {
    const requestOptions = {
        method: 'GET',
        headers: { ...authHeader(), contentType, accept }
    };

    entries = entries || 10;
    if (urlPaginate) urlPaginate = `${urlPaginate}&entries=${entries}`
    else urlPaginate = `${url}/${objName}?entries=${entries}`;
    console.log(entries);
    console.log(urlPaginate);
    return fetch(urlPaginate, requestOptions).then(handleResponse);
}

function _store(objName, obj) {
    const requestOptions = {
        method: 'POST',
        headers: { ...authHeader(), contentType },
        body: JSON.stringify(obj)
    };

    return fetch(`${url}/${objName}`, requestOptions).then(handleResponse);
}

function _update(objName, user) {
    const requestOptions = {
        method: 'PUT',
        headers: { ...authHeader(), contentType },
        body: JSON.stringify(user)
    };

    return fetch(`${url}/${objName}/${user.id}`, requestOptions).then(handleResponse);
}

function _show(objName, id) {
    const requestOptions = {
        method: 'GET',
        headers:{ ...authHeader(), contentType }
    };

    return fetch(`${url}/${objName}/${id}`, requestOptions).then(handleResponse);
}

// prefixed function name with underscore because delete is a reserved word in javascript
function _delete(objName, id) {
    const requestOptions = {
        method: 'DELETE',
        headers: { ...authHeader(), contentType }
    };

    return fetch(`${url}/${objName}/${id}`, requestOptions).then(handleResponse);
}

