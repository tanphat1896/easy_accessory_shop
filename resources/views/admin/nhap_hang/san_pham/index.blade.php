@extends('admin.layouts.master')

@section('title','Chi tiết nhập hàng')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <a href="{{ route('nhap_hang.index') }}" class="need-popup" data-content="Danh sách phiếu nhập">
                <i class="blue small angle double left circular fitted icon"></i></a>
            Chi tiết phiếu nhập
            @if(\App\PhieuNhap::find($id)->da_cap_nhat == false)
                <a href="{{ route('cap_nhat_so_luong', [$id]) }}"
                   class="ui green label need-popup" data-content="Cập nhật số lượng sản phẩm vào kho">
                    <i class="check open fitted icon"></i> Cập nhật vào kho
                </a>
            @endif
        </h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <form action="{{ route('chi_tiet_nhap_hang.destroy', [0]) }}" method="post">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <input type="hidden" name="phieu-nhap-id" value="{{ $id }}">

            <button type="submit" class="ui small red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()"
            >
                <i class="delete fitted icon"></i>
                <strong>Xóa </strong>
            </button>
            <button type="button" class="ui small blue button"
                    onclick = "$('#modal-them-phieu-nhap-san-pham').modal('show')">
                <i class="add fitted icon"></i>
                <strong>Thêm mới </strong>
            </button>

            @include('admin.nhap_hang.san_pham.table')
        </form>

        @include('admin.nhap_hang.san_pham.modal')
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('chon-het-san-pham-phieu-nhap');

        // bindDataTable('bang-nha-cung-cap');
    </script>
@endpush