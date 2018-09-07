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
    <title>FGDev Team</title>
    <!-- ============================================ -->
    <!-- Style -->
    <!-- ============================================ -->
    @include('admin.layouts.partials.style')
  </head>
  <body class="vertical-layout vertical-menu-modern 2-columns menu-expanded fixed-navbar pace-done" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <div id="app">
    <!-- ============================================ -->
    <!-- Render With Vuejs -->
    <!-- ============================================ -->
    </div>
    <!-- ============================================ -->
    <!-- Script -->
    <!-- ============================================ -->
    @include('admin.layouts.partials.script')
    <script>
        $(document).ready(function () {
            if(window.location.href.indexOf("login") > -1) {
                $('body').removeClass();
                $('body').addClass('vertical-layout bg-cyan bg-lighten-2 menu-expanded blank-page blank-page pace-done');
            } else {
                $('body').removeClass();
                $('body').addClass('vertical-layout vertical-menu-modern 2-columns menu-expanded fixed-navbar');
            }
        });
    </script>
  </body>
</html>

