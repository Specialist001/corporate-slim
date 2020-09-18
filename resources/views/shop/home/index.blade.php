@extends('shop.wrapper')

@section('title')
    @lang('shop.title_main')
@endsection

@section('center_content')
    @include('shop.home._slider')
    @include('shop.home._bottom-slider')
    @include('shop.home._partners')
@endsection
