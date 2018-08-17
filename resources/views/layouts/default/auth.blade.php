<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="loading">
  <head>
    <title>@yield('title')</title>
    <!-- ============================================ -->
    <!-- Style -->
    <!-- ============================================ -->
    @include('src.auth.style')
  </head>
  <body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <!-- ============================================ -->
        <!-- Content-body -->
        <!-- ============================================ -->
        @yield('content-body')
      </div>
    </div>
    <!-- ============================================ -->
    <!-- Script -->
    <!-- ============================================ -->
    @include('src.auth.script')
  </body>
</html>
