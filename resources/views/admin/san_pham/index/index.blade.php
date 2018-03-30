@extends('admin.layouts.master')

@section('title', 'Sản phẩm')

@section('content')
    <div class="ui blue raised segment">
        <div class="ui dividing header center aligned no-margin-bottom">Quản lý sản phẩm</div>

        <a class="ui blue small button" href="{{ route('san_pham.create') }}">
            <i class="plus icon fitted"></i>
            Thêm mới
        </a>

        @include('admin.san_pham.index.filter')

        <div class="ui divider small-td-margin"></div>

        @include('admin.san_pham.index.table')
    </div>
@endsection

@push('script')
    <script>
        bindDataTable('bang-sp');

        $('#sp-filter').popup({
            inline     : true,
            hoverable  : true,
            position   : 'bottom left',
            on: 'click',
            delay: {
                show: 300,
                hide: 2000
            }
        });
    </script>
@endpush