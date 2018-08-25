@extends('admin.layouts.dashboard_default')

@section('title')
    Dashboard
@endsection

@section('content-body')
    @include('admin.dashboard.partials.card_pull_up')
    @include('admin.dashboard.partials.table_style')
@endsection
