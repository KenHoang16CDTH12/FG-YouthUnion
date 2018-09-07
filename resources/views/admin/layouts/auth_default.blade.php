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
    {!! Html::style('app-assets/css/pages/login-register.css') !!}
  </head>
  <body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <div id="app">
    <!-- ============================================ -->
    <!-- Begin Login -->
    <!-- ============================================ -->
    <router-view/>
    <!-- ============================================ -->
    <!-- End Login -->
    <!-- ============================================ -->
    </div>
    <!-- ============================================ -->
    <!-- Script -->
    <!-- ============================================ -->
    @include('admin.layouts.partials.script')
    {!! Html::script('app-assets/js/scripts/forms/form-login-register.js') !!}
    {!! Html::script('app-assets/vendors/js/forms/icheck/icheck.min.js') !!}
    {!! Html::script('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') !!}
  </body>
</html>
