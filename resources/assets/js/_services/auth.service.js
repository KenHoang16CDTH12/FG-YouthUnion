import { url } from '../_helpers';
import { authHeader } from '../_helpers';
import { contentType } from '../_helpers';
import { handleResponse } from '../_helpers';

export const authService = {
    login,
    user,
    logout
};

function login(email, password, remember_me) {
    const requestOptions = {
        method: 'POST',
        headers: { ...contentType() },
        body: JSON.stringify({ email, password, remember_me })
    };

    return fetch(`${url}/login`, requestOptions).then(handleResponse);
}

function user() {
    const requestOptions = {
        method: 'GET',
        headers: { ...authHeader(), ...contentType() }
    };
    console.log(requestOptions)
    return fetch(`${url}/user`, requestOptions).then(handleResponse);
}

function logout(token) {
    const requestOptions = {
        method: 'GET',
        headers: { ...authHeader(), ...contentType() }
    };

    return fetch(`${url}/logout`, requestOptions).then(handleResponse);
}
