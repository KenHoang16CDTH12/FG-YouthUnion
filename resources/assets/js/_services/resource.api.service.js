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

function _index(objName, urlPaginate, query) {
    const requestOptions = {
        method: 'GET',
        headers: { ...authHeader(), ...contentType(), ...accept() }
    };
    /**
    * query = {'entries', 'searchText', 'sort'};
    */
    query.entries = query.entries || 10;
    query.searchText = query.searchText || '';
    query.sort = query.sort || 'asc';
    console.log(query.sort);
    if (urlPaginate) urlPaginate = `${urlPaginate}&entries=${query.entries}&sort=${query.sort}&searchText=${query.searchText}`
    else urlPaginate = `${url}/${objName}?entries=${query.entries}&sort=${query.sort}&searchText=${query.searchText}`;
    console.log(urlPaginate);
    return fetch(urlPaginate, requestOptions).then(handleResponse);
}

function _store(objName, object) {
    console.log(object);
    const requestOptions = {
        method: 'POST',
        headers: { ...authHeader(), ...contentType(), ...accept() },
        body: JSON.stringify(object)
    };
    return fetch(`${url}/${objName}`, requestOptions)
            .then(handleResponse);
}

function _update(objName, object) {
    const requestOptions = {
        method: 'PUT',
        headers: { ...authHeader(), ...contentType(), ...accept() },
        body: JSON.stringify(object)
    };

    return fetch(`${url}/${objName}/${object.id}`, requestOptions).then(handleResponse);
}

function _show(objName, id) {
    const requestOptions = {
        method: 'GET',
        headers: { ...authHeader(), ...contentType(), ...accept() }
    };

    return fetch(`${url}/${objName}/${id}`, requestOptions).then(handleResponse);
}

// prefixed function name with underscore because delete is a reserved word in javascript
function _delete(objName, id) {
    const requestOptions = {
        method: 'DELETE',
        headers: { ...authHeader(), ...contentType(), ...accept() }
    };

    return fetch(`${url}/${objName}/${id}`, requestOptions).then(handleResponse);
}

