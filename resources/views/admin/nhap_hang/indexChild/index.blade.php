@extends('admin.layouts.master')

@section('title','Quản lý nhập hàng')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <a href="{{ route('nhap_hang.index') }}" class="need-popup" data-content="Danh sách phiếu nhập">
                <i class="blue small angle double left circular fitted icon"></i></a>
            Phiếu nhập ngày {{ $phieuNhapParent->ngay_nhap }} ({{ $phieuNhapParent->tenNhanVien() }})
            @if(\App\PhieuNhap::find($phieuNhapParent->id)->da_cap_nhat == false)
                <a href="{{ route('cap_nhat_so_luong', [$phieuNhapParent->id]) }}"
                   class="ui green label need-popup" data-content="Cập nhật số lượng sản phẩm vào kho">
                    <i class="check open fitted icon"></i> Cập nhật vào kho
                </a>
            @endif
        </h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <form action="{{ route('nhap_hang.destroy', [0]) }}" method="post">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <button type="submit" class="ui small red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()"
            >
                <i class="delete fitted icon"></i>
                <strong>Xóa </strong>
            </button>
            <button type="button" class="ui small blue button" onclick="$('#modal-them-ncc').modal('show')">
                <i class="add fitted icon"></i>
                <strong>Thêm mới </strong>
            </button>

            @include('admin.nhap_hang.indexChild.table')
        </form>

        @include('admin.nhap_hang.indexChild.modals')
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('chon-het-phieu-nhap');

        // bindDataTable('bang-nha-cung-cap');
    </script>
@endpush