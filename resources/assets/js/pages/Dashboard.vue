<template>
  <div>
  <!-- ============================================ -->
  <!-- Begin Navbar -->
  <!-- ============================================ -->
  <menu-navbar></menu-navbar>
  <!-- ============================================ -->
  <!-- End Navbar -->
  <!-- ============================================ -->
  <!-- ============================================ -->
  <!-- Begin Sidebar -->
  <!-- ============================================ -->
  <menu-sidebar></menu-sidebar>
  <!-- ============================================ -->
  <!-- End Sidebar -->
  <!-- ============================================ -->
  <!-- ============================================ -->
  <!-- Begin Content -->
  <!-- ============================================ -->
  <router-view></router-view>
  <!-- ============================================ -->
  <!-- End Content -->
  <!-- ============================================ -->
  <!-- ============================================ -->
  <!-- Begin Footer -->
  <!-- ============================================ -->
  <activity-footer></activity-footer>
  <!-- ============================================ -->
  <!-- End Footer -->
  <!-- ============================================ -->
  </div>
</template>
<script>
import MenuNavbar from '../components/MenuNavbar.vue';
import MenuSidebar from '../components/MenuSidebar.vue';
import ActivityFooter from '../components/ActivityFooter.vue';

export default {
    name: 'dashboard',
    components: { MenuNavbar, MenuSidebar, ActivityFooter }
}
</script>
