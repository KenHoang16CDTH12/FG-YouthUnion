export function authHeader() {
    // return authorization header with oauth2
    let auth = JSON.parse(localStorage.getItem('auth'));

    if (auth && auth.access_token) {
        return { 'Authorization': 'Bearer ' + auth.access_token };
    } else {
        return {};
    }
}

export const accept = { 'Accept': 'application/json' };

export const contentType = { 'Content-Type': 'application/json' };

export const xRequestedWith = { 'X-Requested-With': 'XMLHttpRequest' };
