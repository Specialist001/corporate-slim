@extends('site.layout')

@section('header')
    @include('site.header')
@endsection

@section('content')
    @yield('center_content')
@endsection

@section('footer')
    @include('site.footer')
@endsection

@push('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@endpush

