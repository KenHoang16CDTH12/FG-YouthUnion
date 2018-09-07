<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="loading">
  <head>
    <!-- ============================================ -->
    <!-- Icon -->
    <!-- ============================================ -->
    @include('admin.layouts.partials.icon')
    <!-- ============================================ -->
    <!-- Meta -->
    <!-- ============================================ -->
    @include('admin.layouts.partials.meta')
    <title>@yield('title')</title>
    <!-- ============================================ -->
    <!-- Style -->
    <!-- ============================================ -->
    @include('admin.layouts.partials.style')
  </head>
  <body class="vertical-layout vertical-menu-modern 2-columns menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<<<<<<< HEAD
    <div id="root">
=======
    <div id="app">
>>>>>>> 2256b5e18133d3855b72c57acfdfe51f6877a847
    <!-- ============================================ -->
    <!-- Begin Navbar -->
    <!-- ============================================ -->
<<<<<<< HEAD
    <navbar></navbar>
=======
    <menu-navbar></menu-navbar>
>>>>>>> 2256b5e18133d3855b72c57acfdfe51f6877a847
    <!-- ============================================ -->
    <!-- End Navbar -->
    <!-- ============================================ -->
    <!-- ============================================ -->
    <!-- Begin Sidebar -->
    <!-- ============================================ -->
<<<<<<< HEAD
    <sidebar></sidebar>
=======
    <menu-sidebar></menu-sidebar>
>>>>>>> 2256b5e18133d3855b72c57acfdfe51f6877a847
    <!-- ============================================ -->
    <!-- End Sidebar -->
    <!-- ============================================ -->
    <!-- ============================================ -->
    <!-- Begin Content -->
    <!-- ============================================ -->
<<<<<<< HEAD
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          @yield('content-body')
        </div>
      </div>
    </div>
=======
    <router-view></router-view>
>>>>>>> 2256b5e18133d3855b72c57acfdfe51f6877a847
    <!-- ============================================ -->
    <!-- End Content -->
    <!-- ============================================ -->
    <!-- ============================================ -->
    <!-- Begin Footer -->
    <!-- ============================================ -->
<<<<<<< HEAD
    <footerr></footerr>
=======
    <activity-footer></activity-footer>
>>>>>>> 2256b5e18133d3855b72c57acfdfe51f6877a847
    <!-- ============================================ -->
    <!-- End Footer -->
    <!-- ============================================ -->
    </div>
    <!-- ============================================ -->
    <!-- Script -->
    <!-- ============================================ -->
<<<<<<< HEAD
    @include('admin.dashboard.partials.script')
=======
    @include('admin.layouts.partials.script')
>>>>>>> 2256b5e18133d3855b72c57acfdfe51f6877a847
    </div>
  </body>
</html>
