@extends('shop.layout')

@section('header')
    @include('shop.header')
@endsection

@section('basket')
    @include('shop.basket')
@endsection

@section('content')
    @yield('center_content')
@endsection

@section('footer')
    @include('shop.footer')
@endsection

@push('styles')
    <link href="{{ asset('shop/css/main.css') }}" rel="stylesheet">
@endpush

