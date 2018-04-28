@extends('admin.layouts.master')
@section('title', 'Quản lý đơn hàng')
@section('content')
    <div class="ui blue raised segment">
        {{--@include('admin.don_hang.san_pham.filter')--}}

        <h3 class="ui dividing header center aligned">Quản lý đơn hàng</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        @include('admin.don_hang.index.table')
    </div>
@endsection

@push('script')
    <script>
        // bindDataTable('bang-sp');

        $('#dh-filter').popup({
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