@extends('admin.layouts.master')

@section('title', 'Quản lý loại sản phẩm')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">Quản lý loại sản phẩm</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <form action="{{ route('loai_sp.destroy', [0]) }}" method="post" class="ui form">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <div class="field">
                <button type="submit" class="ui small red delete button need-popup"
                        data-content="Xóa các mục vừa chọn"
                        onclick="return confirmDelete()"
                >
                    <i class="delete fitted icon"></i>
                    <strong>Xóa </strong>
                </button>
                <button type="button" class="ui small blue button" onclick="$('#modal-them-loai-sp').modal('show')">
                    <i class="add fitted icon"></i>
                    <strong>Thêm mới </strong>
                </button>
            </div>

            @include('admin.loai_sp.table')

        </form>

        @include('admin.loai_sp.modals')
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('chon-het-loai-sp');

        // bindDataTable('bang-loai-sp');
    </script>
@endpush
