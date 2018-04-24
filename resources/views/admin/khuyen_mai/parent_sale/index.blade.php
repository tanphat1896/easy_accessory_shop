@extends('admin.layouts.master')

@section('title', 'Quản lý khuyến mãi')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">Quản lý khuyến mãi</h3>

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
            <button type="button" class="ui small blue button" onclick="$('#modal-them-km').modal('show')">
                <i class="add fitted icon"></i>
                <strong>Thêm mới </strong>
            </button>

            <div class="ui divider small-td-margin hidden"></div>

            @include('admin.khuyen_mai.parent_sale.table')

            <button type="submit" class="ui small red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()"
            >
                <i class="delete fitted icon"></i>
                <strong>Xóa </strong>
            </button>
            <button type="button" class="ui small blue button" onclick="$('#modal-them-km').modal('show')">
                <i class="add fitted icon"></i>
                <strong>Thêm mới </strong>
            </button>
        </form>

        @include('admin.khuyen_mai.parent_sale.modals')
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('chon-het-km');

        // bindDataTable('bang-loai-sp');
    </script>
@endpush
