export function authHeader() {
    // return authorization header with jwt token
    let auth = JSON.parse(localStorage.getItem('auth'));

    if (auth && auth.access_token) {
        return { 'Authorization': 'Bearer ' + auth.token };
    } else {
        return {};
    }
}
