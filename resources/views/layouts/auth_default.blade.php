<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="loading">
  <head>
    <!-- ============================================ -->
    <!-- Icon -->
    <!-- ============================================ -->
    @include('layouts.partials.icon')
    <!-- ============================================ -->
    <!-- Meta -->
    <!-- ============================================ -->
    @include('layouts.partials.meta')
    <title>@yield('title')</title>
    <!-- ============================================ -->
    <!-- Style -->
    <!-- ============================================ -->
    @include('auth.partials.style')
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
    @include('auth.partials.script')
  </body>
</html>
