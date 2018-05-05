@extends('admin.layouts.master')

@section('title','Quản lý nhân viên')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">Quản lý nhân viên</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <form action="{{ route('nhan_vien.destroy', [0]) }}" method="post">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <button type="submit" class="ui small red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()">
                <i class="delete fitted icon"></i>
                <strong>Xóa </strong>
            </button>
            <button type="button" class="ui small blue button" onclick="$('#modal-them-nhan-vien').modal('show')">
                <i class="add fitted icon"></i>
                <strong>Thêm mới </strong>
            </button>

            @include('admin.nhan_vien.table')
        </form>

        @include('admin.nhan_vien.reset_modals')
        @include('admin.nhan_vien.modals')
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('chon-het-nhan-vien');

        // bindDataTable('bang-nha-cung-cap');
    </script>
@endpush