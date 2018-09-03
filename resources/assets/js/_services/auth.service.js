import { authHeader } from '../_helpers';
const url = "http://127.0.0.1:8000/api/v1";
export const authService = {
    login,
    logout
};

function login(email, password, remember_me) {
    const requestOptions = {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
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
    // remove auth from local storage to log auth out
    localStorage.removeItem('auth');
}

function handleResponse(response) {
    return response.text().then(text => {
        const data = text && JSON.parse(text);
        if (!response.ok) {
            if (response.status === 401) {
                // auto logout if 401 response returned from api
                logout();
                location.reload(true);
            }

            const error = (data && data.message) || response.statusText;
            return Promise.reject(error);
        }

        return data;
    });
}
