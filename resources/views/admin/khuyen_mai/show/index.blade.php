@extends('admin.layouts.master')

@section('title', 'Chi tiết khuyến mãi')

@section('content')
    @include('sharing.components.message')
    @include('sharing.components.error')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header">

            <a href="{{ route('khuyen_mai.index') }}" class="need-popup force-left"
               data-content="Danh sách chương trình khuyến mãi">
                <i class="blue small angle double left circular icon"></i></a>

            <a href="{{ route('khuyen_mai.show', [$sale->parent_id]) }}" class="need-popup force-left"
               data-content="Khuyến mãi cha">
                <i class="blue small angle left circular icon"></i></a>

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

        <h3 class="ui blue-text dividing header">Danh sách sản phẩm</h3>

        <form action="{{ route('khuyen_mai.destroy', [0]) }}" method="post">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <input type="hidden" name="sale-id" value="{{ $sale->id }}">

            <button type="submit" class="ui small red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()">

                <i class="delete fitted icon"></i>
                <strong>Xóa </strong>

            </button>

            @if (! $sale->overdue())
                <button type="button" class="ui small blue button" onclick="$('#modal-add-product').modal('show')">
                    <i class="add fitted icon"></i>
                    <strong>Thêm sản phẩm</strong>
                </button>
            @endif

            <div class="ui divider small-td-margin hidden"></div>

            @include('admin.khuyen_mai.show.table_sale_products')

        </form>

        @include('admin.khuyen_mai.show.modal_search_products')
    </div>
@endsection



@push('script')
    <script>
        bindSelectAll('select-all-current');

        // bindDataTable('table-sale-product', true);
    </script>
@endpush