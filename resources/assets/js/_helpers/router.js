import Vue from 'vue';
import Router from 'vue-router';
import LoginPage from '../pages/Login.vue';
import LayoutPage from '../pages/Layout.vue';
import DashboardIndex from '../pages/dashboards/Index.vue';
import UsersTable from '../pages/tables/Users.vue';
import NamhocsTable from '../pages/tables/Namhocs.vue';
import KhoasTable from '../pages/tables/Khoas.vue';
import LopsTable from '../pages/tables/Lops.vue';
import LCDoansTable from '../pages/tables/LCDoans.vue';
import HockysTable from '../pages/tables/Hockys.vue';

Vue.use(Router);

export const router = new Router({
  mode: 'history',
  routes: [
    {
      path: '/login',
      component: LoginPage
    },
    {
      path: '/',
      component: LayoutPage,
      meta: {
        requiresAuth: true
      },
      children: [
         {
          path: 'dashboard',
          component: DashboardIndex,
         }
      ]
    },
    {
      path: '/tables',
      name: 'tables',
      component: LayoutPage,
      meta: {
        requiresAuth: true
      },
      children: [
       {
        path: 'users',
        name: 'tables-users',
        component: UsersTable
       },
       {
        path: 'namhocs',
        name: 'tables-namhocs',
        component: NamhocsTable
       },
       {
        path: 'khoas',
        name: 'tables-khoas',
        component: KhoasTable
       },
       {
        path: 'lops',
        name: 'tables-lops',
        component: LopsTable
       },
       {
        path: 'lcdoans',
        name: 'tables-lcdoans',
        component: LCDoansTable
       },
       {
        path: 'hockys',
        name: 'tables-hockys',
        component: HockysTable
       }
      ]
    },

    // otherwise redirect to dashboard
    { path: '*', redirect: '/dashboard' }

    /*
     {
        path: '*',
        name: '404',
        component: require('../pages/errors/Error404.vue')
      }
    */
  ]
});

router.beforeEach((to, from, next) => {
  // redirect to login page if not logged in and trying to access a restricted page
  const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
  const currentAuth = localStorage.getItem('auth');

  if (requiresAuth && !currentAuth) {
    next('/login');
  } else if (to.path == '/login' && currentAuth) {
    next('/');
  } else {
    next();
  }
});
