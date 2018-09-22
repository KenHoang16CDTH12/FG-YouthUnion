<template>
<!-- ============================================ -->
<!-- Begin Header_navbar -->
<!-- ============================================ -->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow">
    <!-- ============================================ -->
    <!-- Begin navbar-wrapper -->
    <!-- ============================================ -->
    <div class="navbar-wrapper">
        <!-- ============================================ -->
        <!-- Begin navbar-header -->
        <!-- ============================================ -->
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="#">
                <img class="brand-logo" alt="Logo" src="../../_assets/images/logo/logo.png">
                <h3 class="brand-text">FGDeveloper</h3>
                </a>
            </li>
            <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
            <li class="nav-item d-md-none">
                <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
            </li>
            </ul>
        </div>
        <!-- ============================================ -->
        <!-- End navbar-header -->
        <!-- ============================================ -->
        <!-- ============================================ -->
        <!-- Begin navbar-container -->
        <!-- ============================================ -->
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
            <!-- =================================== -->
            <!-- Navbar Item Left -->
            <!-- =================================== -->
            </ul>
            <ul class="nav navbar-nav float-right">
            <!-- =================================== -->
            <!-- Navbar Item Right -->
            <!-- =================================== -->
                <profile/>
                <!-- =================================== -->
                <!-- Profile -->
                <!-- =================================== -->
                <!-- =================================== -->
                <!-- Language option -->
                <!-- =================================== -->
                <lang-select/>
                <!-- =================================== -->
                <!-- Notification -->
                <!-- =================================== -->
                <notification/>
                <!-- =================================== -->
                <!-- Screenfull -->
                <!-- =================================== -->
                <screenfull/>
            </ul>
            </div>
        </div>
        <!-- ============================================ -->
        <!-- End navbar-container -->
        <!-- ============================================ -->
    </div>
    <!-- ============================================ -->
    <!-- End navbar-wrapper -->
    <!-- ============================================ -->
</nav>
<!-- ============================================ -->
<!-- End Header_navbar -->
<!-- ============================================ -->
</template>

<script>
import Profile from './nav-items/Profile.vue'
import LangSelect from './nav-items/LangSelect.vue'
import Notification from './nav-items/Notification.vue'
import Screenfull from './nav-items/Screenfull.vue'

export default {
  components: {
    Profile, LangSelect, Notification, Screenfull
  }
}
</script>
