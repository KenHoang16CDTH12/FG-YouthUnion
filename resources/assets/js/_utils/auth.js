import Cookies from 'js-cookie'

const TokenKey = 'Admin-Token'

export function getToken() {
  return Cookies.get(TokenKey)
}

export function setToken(token) {
  return Cookies.set(TokenKey, token)
}

export function removeToken() {
  return Cookies.remove(TokenKey)
}

const UserIdKey = 'ID-Key'

export function getUserID() {
  return Cookies.get(UserIdKey)
}

export function setUserID(id) {
  return Cookies.set(UserIdKey, id)
}

export function removeUserID() {
  return Cookies.remove(UserIdKey)
}
