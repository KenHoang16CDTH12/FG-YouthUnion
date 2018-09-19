import { getToken } from '../_utils/auth'
export function authHeader() {
    // return authorization header with oauth2
    if (getToken()) {
        return { 'Authorization': 'Bearer ' + getToken() };
    } else {
        return {};
    }
}

export function accept() {
  return { 'Accept': 'application/json' };
}

export function contentType() {
 return { 'Content-Type': 'application/json' };
}

export function xRequestedWith() {
  return { 'X-Requested-With': 'XMLHttpRequest' };
}
