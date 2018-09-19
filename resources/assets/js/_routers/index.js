import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

/* Layout */
import Layout from '../_layouts/Layout.vue'

/* Router Modules */
//import componentsRouter from './modules/components'
//import chartsRouter from './modules/charts'
//import tableRouter from './modules/table'
//import nestedRouter from './modules/nested'

/** note: Submenu only appear when children.length>=1
 *  detail see  https://panjiachen.github.io/vue-element-admin-site/guide/essentials/router-and-nav.html
 **/

/**
* hidden: true                   if `hidden:true` will not show in the sidebar(default is false)
* alwaysShow: true               if set true, will always show the root menu, whatever its child routes length
*                                if not set alwaysShow, only more than one route under the children
*                                it will becomes nested mode, otherwise not show the root menu
* redirect: noredirect           if `redirect:noredirect` will no redirect in the breadcrumb
* name:'router-name'             the name is used by <keep-alive> (must set!!!)
* meta : {
    roles: ['admin','editor']     will control the page roles (you can set multiple roles)
    title: 'title'               the name show in submenu and breadcrumb (recommend set)
    icon: 'svg-name'             the icon show in the sidebar,
    noCache: true                if true ,the page will no be cached(default is false)
  }
**/
export const constantRouterMap = [
  {
    path: '/redirect',
    component: Layout,
    hidden: true,
    children: [
      {
        path: '/redirect/:path*',
        component: () => import('../_views/redirect/Index')
      }
    ]
  },
  {
    path: '/login',
    component: () => import('../_views/login/Index'),
    hidden: true
  },
  {
    path: '/auth-redirect',
    component: () => import('../_views/login/Authredirect'),
    hidden: true
  },
  {
    path: '/404',
    component: () => import('../_views/errorPage/404'),
    hidden: true
  },
  {
    path: '/401',
    component: () => import('../_views/errorPage/401'),
    hidden: true
  },
  {
    path: '',
    component: Layout,
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        component: () => import('../_views/dashboard/Index'),
        name: 'dashboard',
        meta: { title: 'dashboard', icon: 'dashboard', noCache: true }
      }
    ]
  },
  {
    path: '/documentation',
    component: Layout,
    redirect: '/documentation/index',
    children: [
      {
        path: 'index',
        component: () => import('../_views/documentation/Index'),
        name: 'Documentation',
        meta: { title: 'documentation', icon: 'documentation', noCache: true }
      }
    ]
  },
]

export default new Router({
  // mode: 'history', // require service support
  scrollBehavior: () => ({ y: 0 }),
  routes: constantRouterMap
})


export const asyncRouterMap = [
  {
    path: '/table',
    component: Layout,
    redirect: '/table/users',
    children: [
      {
        path: 'users',
        component: () => import('../_views/table/users/Index'),
        name: 'users.index',
        meta: { title: 'userList', icon: 'table', noCache: true }
      },
      {
        path: 'users/add',
        component: () => import('../_views/table/users/Add'),
        name: 'users.create',
        meta: { title: 'createUser', icon: 'edit' }
      },
      {
        path: 'users/edit/:id(\\d+)',
        component: () => import('../_views/table/users/Show'),
        name: 'users.edit',
        meta: { title: 'editUser', icon: 'edit', noCache: true },
        hidden: true
      },
    ]
  },
  { path: '*', redirect: '/404', hidden: true }
]

// export const router = new Router({
//   mode: 'history',
//   routes: [
//     // // {
//     //     path: '/login',
//     //     name: 'login',
//     //     component: require('../_pages/Login.vue')
//     // },
//     // {
//     //     path: '/home',
//     //     redirect: '/dashboard'
//     // },
//     // {
//     //     path: '/',
//     //     redirect: '/dashboard',
//     // },
//     // {
//     //     path: '/dashboard',
//     //     name: 'dashboard',
//     //     component: require('../_pages/Dashboard.vue'),
//     //     meta: { title: 'dashboard', icon: 'dashboard' }
//     // },
//     // {
//     //     path: '/tables/users',
//     //     name: 'users.index',
//     //     component: require('../_pages/tables/users/Index.vue'),
//     //     meta: { title: 'tables', icon: 'tables' }
//     // },
//     // {
//     //     path: '/tables/users/create',
//     //     name: 'users.create',
//     //     component: require('../_pages/tables/users/Add.vue'),
//     // },
//     // {
//     //     path: '/tables/users/:id',
//     //     name: 'users.show',
//     //     component: require('../_pages/tables/users/Show.vue'),
//     //     meta: { title: 'tables', icon: 'tables' },
//     //     props: true,
//     // },
//     // {
//     //     path: '*',
//     //     name: 'Error',
//     //     component: require('../_pages/errors/Error.vue'),
//     //     meta: { title: 'errors', icon: 'errors', noCache: true }
//     // }
//   ]
// });

// router.beforeEach((to, from, next) => {
//   // redirect to login page if not logged in and trying to access a restricted page
//   const publicPages = ['/login'];
//   const authRequired = !publicPages.includes(to.path);
//   const loggedIn = localStorage.getItem('auth');

//   if (authRequired && !loggedIn) {
//     return next('/login');
//   }

//   next();
// })
