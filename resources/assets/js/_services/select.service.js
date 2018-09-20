import { url } from '../_helpers';
import { accept } from '../_helpers';
import { authHeader } from '../_helpers';
import { contentType } from '../_helpers';
import { handleResponse } from '../_helpers';

export const selectService = {
    dataSelect: _get
};

function _get(objName) {
    const requestOptions = {
        method: 'GET',
        headers: { ...authHeader(), ...contentType(), ...accept() }
    };
    console.log(`${url}/${objName}/select`);
    return fetch(`${url}/${objName}/select`, requestOptions).then(handleResponse);
}

