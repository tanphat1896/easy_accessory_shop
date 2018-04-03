@extends('admin.layouts.master')

@section('title', 'Chi tiết khuyến mãi')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing center aligned header">
            {{--<div class="ui basic segment no-padding no-margin left floated">--}}
                <a href="{{ route('khuyen_mai.index') }}" class="need-popup force-left" data-content="Danh sách khuyến mãi">
                    <i class="blue small angle double left circular fitted icon"></i></a>
            {{--</div>--}}
            Danh sách sản phẩm được áp dụng khuyến mãi <span class="ui red large label">{{ $sale->percent() }}%</span>
        </h3>
        <div class="ui four column padded grid">
            <div class="column">
                <i class="calendar outline fitted icon"></i> Ngày bắt đầu: <strong>{{ $sale->start() }}</strong>
            </div>
            <div class="column">
                <i class="calendar outline fitted icon"></i> Ngày kết thúc: <strong>{{ $sale->end() }}</strong>
            </div>
        </div>

        @include('admin.khuyen_mai.show.table_sale_products')

        @include('admin.khuyen_mai.show.table_search_products')
    </div>
@endsection

@push('script')
    <script>
        $('.ui.tabular.menu .item').tab();
    </script>
@endpush