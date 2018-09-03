import Vue from 'vue';
import Router from 'vue-router';
import LoginPage from '../pages/Login.vue';
import DashboardPage from '../pages/Dashboard.vue';
import IndexDashboard from '../pages/dashboards/Index.vue';

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
      component: DashboardPage,
      meta: {
        requiresAuth: true
      },
      children: [
       {
        path: 'dashboard',
        component: IndexDashboard
       },
      ]
    },

    // otherwise redirect to home
    { path: '*', redirect: '/' }
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

