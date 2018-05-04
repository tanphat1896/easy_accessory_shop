@extends('admin.layouts.master')

@section('title', $parentSale->ten_km)

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <a href="{{ route('khuyen_mai.index') }}"><i class="angle small left circular fitted icon"></i></a>
            Chi tiết: {{ $parentSale->ten_km }}
        </h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <form action="{{ route('khuyen_mai.destroy', [0]) }}" method="post">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <button type="submit" class="ui small red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()"
            >
                <i class="delete fitted icon"></i>
                <strong>Xóa </strong>
            </button>

            @if(! $parentSale->overdue())
                <button type="button" class="ui small blue button" onclick="$('#modal-them-km').modal('show')">
                    <i class="add fitted icon"></i>
                    <strong>Thêm mới </strong>
                </button>
            @endif

            <div class="ui divider small-td-margin hidden"></div>

            @include('admin.khuyen_mai.child_sale.table')
        </form>

        @if (! $parentSale->overdue())
            @include('admin.khuyen_mai.child_sale.modals')
        @endif
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('chon-het-km');

        // bindDataTable('bang-loai-sp');
    </script>
@endpush
