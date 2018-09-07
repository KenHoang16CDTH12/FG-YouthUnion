import { url } from '../_helpers';
import { authHeader } from '../_helpers';
import { contentType } from '../_helpers';
import { handleResponse } from '../_helpers';

export const authService = {
    login,
    logout
};

function login(email, password, remember_me) {
    const requestOptions = {
        method: 'POST',
        headers: contentType,
        body: JSON.stringify({ email, password, remember_me })
    };

    return fetch(`${url}/login`, requestOptions)
        .then(handleResponse)
        .then(auth => {
            // login successful if there's a passport access_token in the response
            if (auth.access_token) {
                // store auth details and passport access_token in local storage to keep auth logged in between page refreshes
                $('body').removeClass();
                $('body').addClass('vertical-layout vertical-menu-modern 2-columns menu-expanded fixed-navbar');
                location.reload(true);
                localStorage.setItem('auth', JSON.stringify(auth));
            }

            return auth;
        });
}

function logout() {
    return localStorage.removeItem('auth');
}

