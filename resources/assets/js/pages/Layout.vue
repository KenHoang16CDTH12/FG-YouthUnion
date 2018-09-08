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
  <div class="app-content content">
    <div class="content-wrapper">
      <!-- ============================================ -->
      <!-- Content Header-->
      <!-- ============================================ -->
      <bread-crumb/>
      <!-- ============================================ -->
      <!-- Content Body-->
      <!-- ============================================ -->
      <router-view/>
    </div>
  </div>
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
import BreadCrumb from '../components/BreadCrumb.vue';
import ActivityFooter from '../components/ActivityFooter.vue';

export default {
    name: 'layout',
    components: { MenuNavbar, BreadCrumb, MenuSidebar, ActivityFooter }
}
</script>
