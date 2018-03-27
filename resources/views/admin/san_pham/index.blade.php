@extends('admin.layouts.master')

@section('title', 'Sản phẩm')

@section('content')
    <div class="ui dividing header center aligned no-margin-bottom">Quản lý sản phẩm</div>

    @include('admin.san_pham.filter')

    @include('admin.san_pham.table')
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