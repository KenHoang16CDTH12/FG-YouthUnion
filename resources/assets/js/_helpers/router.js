import Vue from 'vue';
import Router from 'vue-router';
import LoginPage from '../pages/Login.vue';
import DashboardPage from '../pages/Dashboard.vue';
import UsersDashboard from '../pages/dashboards/Users.vue';
import NamhocsDashboard from '../pages/dashboards/Namhocs.vue';
<<<<<<< HEAD
import KhoasDashboard from '../pages/dashboards/Khoas.vue';
=======
import ClassesDashboard from '../pages/dashboards/Classes.vue';
>>>>>>> design classes 01

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
        path: 'users',
        component: UsersDashboard
       },
       {
        path: 'namhocs',
        component: NamhocsDashboard
       },
       {
<<<<<<< HEAD
        path: 'khoas',
        component: KhoasDashboard
=======
        path: 'classes',
        component: ClassesDashboard
>>>>>>> design classes 01
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

