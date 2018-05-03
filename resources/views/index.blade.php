@extends('frontend.layouts.master')

@section('title', 'Trang chủ')

@php $shopInfo = \App\CuaHang::find(1); @endphp

@section('content')
    @include('sharing.components.error')

    <div class="ui basic segment">

        @include('frontend.index.slider_news')

        @include('frontend.index.sale_product')

        @include('frontend.index.new_product')

    </div>
@endsection

@push('script')
    @include('frontend.plugin.fb_chat')
    @include('frontend.plugin.tawkto_chat')
@endpush