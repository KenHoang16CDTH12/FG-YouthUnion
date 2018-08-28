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
    @include('admin.dashboard.partials.style')
  </head>
  <body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <!-- ============================================ -->
    <!-- Begin Header_navbar -->
    <!-- ============================================ -->
    @include('admin.layouts.partials.header_navbar')
    <!-- ============================================ -->
    <!-- End Header_navbar -->
    <!-- ============================================ -->
    <!-- ============================================ -->
    <!-- Begin Main_menu -->
    <!-- ============================================ -->
    @include('admin.layouts.partials.main_menu')
    <!-- ============================================ -->
    <!-- End Main_menu -->
    <!-- ============================================ -->
    <!-- ============================================ -->
    <!-- Begin Content -->
    <!-- ============================================ -->
    <div class="app-content content" id="app-content-dashboard">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          @yield('content-body')
        </div>
      </div>
    </div>
    <!-- ============================================ -->
    <!-- End Content -->
    <!-- ============================================ -->
    <!-- ============================================ -->
    <!-- Begin Footer -->
    <!-- ============================================ -->
    @include('admin.layouts.partials.footer')
    <!-- ============================================ -->
    <!-- End Footer -->
    <!-- ============================================ -->
    <!-- ============================================ -->
    <!-- Script -->
    <!-- ============================================ -->
    @include('admin.dashboard.partials.script')
  </body>
</html>
