@extends('layouts.dashboard_default')

@section('title')
    Dashboard
@endsection

@section('content-body')
    @include('dashboard.partials.card_pull_up')
    @include('dashboard.partials.table_style')
@endsection
