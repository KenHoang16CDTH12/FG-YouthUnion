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
    <title>FGDev</title>
    <!-- ============================================ -->
    <!-- Style -->
    <!-- ============================================ -->
    @include('admin.layouts.partials.style')
  </head>
  <body class="vertical-layout vertical-menu-modern 2-columns menu-expanded fixed-navbar pace-done" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <div id="app">
        <router-view/>
    </div>
    <!-- ============================================ -->
    <!-- Script -->
    <!-- ============================================ -->
    @include('admin.layouts.partials.script')
  </body>
</html>

