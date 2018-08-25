@extends('admin.layouts.auth_default')

@section('title')
    Login
@endsection

@section('content-body')
<div class="content-body">
    <!-- ============================================ -->
    <!-- Begin Flexbox-container -->
    <!-- ============================================ -->
    @include('admin.auth.partials.flexbox')
    <!-- ============================================ -->
    <!-- End Flexbox-container -->
    <!-- ============================================ -->
</div>
@endsection
