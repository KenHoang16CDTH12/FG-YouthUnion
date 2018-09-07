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
    {!! Html::style('app-assets/css/pages/error.css') !!}
  </head>
  <body class="vertical-layout vertical-menu-modern 1-column menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <div id="app">
    <!-- ============================================ -->
    <!-- Begin Error -->
    <!-- ============================================ -->
    <error></error>
    <!-- ============================================ -->
    <!-- End Error -->
    <!-- ============================================ -->
    </div>
    <!-- ============================================ -->
    <!-- Script -->
    <!-- ============================================ -->
    @include('admin.layouts.partials.script')
   </body>
</html>
