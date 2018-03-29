@extends('admin.layouts.master')

@section('title', 'Quản lý nhà cung cấp')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">Quản lý nhà cung cấp</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <form action="{{ route('nha_cung_cap.destroy', [0]) }}" method="post">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            @include('admin.nha_cung_cap.table')

            <button type="submit" class="ui red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()"
            >
                <i class="delete icon"></i>
                <strong>Xóa </strong>
            </button>
            <button type="button" class="ui blue button" onclick="$('#modal-them-nha-cung-cap').modal('show')">
                <i class="add icon"></i>
                <strong>Thêm mới </strong>
            </button>
        </form>

        @include('admin.nha_cung_cap.modals')
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('chon-het-nha-cung-cap');

        bindDataTable('bang-nha-cung-cap');
    </script>
@endpush
