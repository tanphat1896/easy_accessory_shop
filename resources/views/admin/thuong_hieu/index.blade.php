@extends('admin.layouts.master')

@section('title', 'Quản lý thương hiệu')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">Quản lý thương hiệu</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <form action="{{ route('thuong_hieu.destroy', [0]) }}" method="post">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <button type="submit" class="ui small red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()"
            >
                <i class="delete fitted icon"></i>
                <strong>Xóa </strong>
            </button>
            <button type="button" class="ui small blue button" onclick="$('#modal-them-thuong-hieu').modal('show')">
                <i class="add fitted icon"></i>
                <strong>Thêm mới </strong>
            </button>

            <div class="ui divider small-td-margin hidden"></div>

            @include('admin.thuong_hieu.table')

            <button type="submit" class="ui small red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()"
                    >
                <i class="delete fitted icon"></i>
                <strong>Xóa </strong>
            </button>
            <button type="button" class="ui small blue button" onclick="$('#modal-them-thuong-hieu').modal('show')">
                <i class="add fitted icon"></i>
                <strong>Thêm mới </strong>
            </button>
        </form>

        @include('admin.thuong_hieu.modals')
    </div>
@endsection

@push('script')
    <script>
        bindDataTable('bang-thuong-hieu');

        bindSelectAll('chon-het-thuong-hieu');

    </script>
@endpush
