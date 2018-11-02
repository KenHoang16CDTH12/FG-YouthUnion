import { url } from '../_helpers';
import { accept } from '../_helpers';
import { authHeader } from '../_helpers';
import { contentType } from '../_helpers';
import { handleResponse } from '../_helpers';

export const allService = {
    all: _all
};

function _all(objName) {
    const requestOptions = {
        method: 'GET',
        headers: { ...authHeader(), ...contentType(), ...accept() }
    };
    return fetch(`${url}/all/${objName}`, requestOptions).then(handleResponse);
}

