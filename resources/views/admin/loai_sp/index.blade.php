@extends('admin.layouts.master')

@section('title', 'Quản lý loại sản phẩm')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">Quản lý loại sản phẩm</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <form action="{{ route('loai_sp.destroy', [0]) }}" method="post">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            @include('admin.loai_sp.table')

            <button type="submit" class="ui red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()"
            >
                <i class="delete icon"></i>
                <strong>Xóa </strong>
            </button>
            <button type="button" class="ui blue button" onclick="$('#modal-them-loai-sp').modal('show')">
                <i class="add icon"></i>
                <strong>Thêm mới </strong>
            </button>
        </form>

        @include('admin.loai_sp.modals')
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('chon-het-loai-sp');

        bindDataTable('bang-loai-sp');
    </script>
@endpush
