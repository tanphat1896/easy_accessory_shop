@extends('admin.layouts.master')

@section('title', 'Sản phẩm - Kho hàng')

@push('style')
    <style>
        .ui.top.attached.tabular {
            border-width: 0 0 1px 0 !important;
            border-color: lightgray;
            border-style: solid;
        }
        .bottom.attached.tab.segment {
            border: none !important;
            padding: 10px 0 0 0;
        }
        .tabular.menu .item.active {
            border: none;
            border-bottom: 3px solid #2185d0 !important;
        }
    </style>
@endpush

@section('content')
    <div class="ui blue raised segment">

        <h3 class="ui dividing header">Thống kê sản phẩm</h3>

        <div class="ui top attached tabular menu">
            <a class="item {{ Request::has('lim') ? '': 'active' }}" data-tab="first">Tổng quan</a>
            <a class="item {{ Request::has('lim') ? 'active' : '' }}" data-tab="second">Mua nhiều</a>
            <a class="item" data-tab="third">Hết hàng/Ngừng k.doanh</a>
        </div>

        @include('admin.dashboard.product.general')
        @include('admin.dashboard.product.product_hot_unsold')
        @include('admin.dashboard.product.product_out_stop')

    </div>

    @include('admin.dashboard.account.export')
@endsection



@push('script')
    <script>

    </script>
@endpush