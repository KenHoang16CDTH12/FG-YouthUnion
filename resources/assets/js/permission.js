import router from './_routers'
import store from './_stores'
import { Message } from 'element-ui'
import NProgress from 'nprogress' // progress bar
import 'nprogress/nprogress.css'// progress bar style
import { getToken } from './_utils/auth' // getToken from cookie

NProgress.configure({ showSpinner: false })// NProgress Configuration

// permission judge function
function hasPermission(roles, permissionRoles) {
  if (roles.indexOf('admin') >= 0) return true // admin permission passed directly
  if (!permissionRoles) return true
  return roles.some(role => permissionRoles.indexOf(role) >= 0)
}

const whiteList = ['/login', '/auth-redirect']// no redirect whitelist

router.beforeEach((to, from, next) => {
  NProgress.start() // start progress bar
  if (getToken()) { // determine if there has token
    /* has token*/
    if (to.path === '/login') {
      next({ path: '/' })
      NProgress.done() // if current page is dashboard will not trigger	afterEach hook, so manually handle it
    } else {
      if (store.getters.role === '') { // Determine whether the current user has pulled the user_info information
        store.dispatch('user').then(res => { // Pull user_info
          const role = res.data.role.type // note: role must be a array! such as: ['admin','client', ...]
          store.dispatch('GenerateRoutes', { role }).then(() => { // Generate accessible routing tables based on roles
             router.addRoutes(store.getters.addRouters) // Dynamically add accessible routing tables
             next({ ...to, replace: true }) // hack Method to ensure addRoutes completed ,set the replace: true so the navigation will not leave a history record
           })
        }).catch((err) => {
          store.dispatch('FedLogOut').then(() => {
            Message.error(err || 'Verification failed, please login again')
            next({ path: '/' })
          })
        })
      } else {
        // No need to dynamically change permissions can be directly next () delete the following permission judgment ↓
        if (hasPermission(store.getters.role, to.meta.roles)) {
          next()
        } else {
          next({ path: '/401', replace: true, query: { noGoBack: true }})
        }
        // Can be deleted ↑
      }
    }
  } else {
    /* has no token*/
    if (whiteList.indexOf(to.path) !== -1) { // In the free login whitelist, go directly
      next()
    } else {
      next(`/login?redirect=${to.path}`) // Otherwise all redirect to the login page
      NProgress.done() // if current page is login will not trigger afterEach hook, so manually handle it
    }
  }
})

router.afterEach(() => {
  NProgress.done() // finish progress bar
})
