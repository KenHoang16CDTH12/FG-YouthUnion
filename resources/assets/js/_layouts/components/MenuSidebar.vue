<template>
  <!-- ============================================ -->
<!-- Begin Main_menu -->
<!-- ============================================ -->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <!-- ============================================ -->
    <!-- Begin Main-menu-content -->
    <!-- ============================================ -->
    <div class="main-menu-content">
        <!-- ============================================ -->
        <!-- Begin Navigation-->
        <!-- ============================================ -->
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <!-- ============================================ -->
            <!-- Sidebar item-->
            <!-- ============================================ -->
            <li class=" nav-item">
                <router-link tag="a" :to="{ name: 'dashboard' }" class="menu-item">
                    <i class="la la-home"></i>
                    <span class="menu-title">Dashboard</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link tag="a" :to="{ name: 'notification.index' }" class="menu-item">
                    <i class="ficon ft-bell"></i>
                    <span class="menu-title">Notification</span>
                </router-link>
            </li>
            <li class="nav-item has-sub"><a><i class="la la-table"></i><span class="menu-title">Table</span><span class="badge badge badge-info badge-pill float-right mr-2">1</span></a>
                <ul class="menu-content">
                    <li>
                        <router-link tag="a" :to="{ name: 'users.index' }" class="menu-item">Users</router-link>
                    </li>
                </ul>
            </li>

            <li class=" navigation-header">
            <span data-i18n="nav.category.support">Activity Management</span>
            <li class="nav-item has-sub"><a><i class="la la-briefcase"></i><span class="menu-title">Activity</span><span class="badge badge badge-info badge-pill float-right mr-2">1</span></a>
                <ul class="menu-content">
                    <li>
                        <router-link tag="a" :to="{ name: 'activity.type.index' }" class="menu-item">Type</router-link>
                    </li>
                </ul>
            </li>

            </li>
            <li class=" navigation-header">
            <span data-i18n="nav.category.support">Support</span>
            </li>
            <li class=" nav-item"><a href="https://www.facebook.com/AndroidDeveloper.MinhHoang.HueIC.IT"><i class="la la-whatsapp"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">FGDev Contact</span></a>
            </li>
            <li class=" nav-item">
            <a href="https://github.com/KenHoang16CDTH12/FG-YouthUnion"><i class="la la-github"></i>
                <span class="menu-title" data-i18n="nav.support_documentation.main">Github</span>
            </a>
            </li>
        </ul>
        <!-- ============================================ -->
        <!-- End Navigation-->
        <!-- ============================================ -->
    </div>
    <!-- ============================================ -->
    <!-- End Main-menu-content -->
    <!-- ============================================ -->
</div>
<!-- ============================================ -->
<!-- End Main_menu -->
<!-- ============================================ -->
</template>
<script>
import { mapGetters } from 'vuex'

export default {
  data() {
    return {
    }
  },
  created() {
  },
  computed: {
    ...mapGetters([
      'permission_routers',
    ])
  }
}
</script>
