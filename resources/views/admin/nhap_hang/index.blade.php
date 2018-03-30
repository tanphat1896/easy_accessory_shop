@extends('admin/layouts/master')

@section('title','Quản lý nhập hàng')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">Quản lý nhập hàng</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <form action="" method="post">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            @include('admin.nhap_hang.table')

            <button type="submit" class="ui red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()"
            >
                <i class="delete icon"></i>
                <strong>Xóa </strong>
            </button>
            <button type="button" class="ui blue button" onclick="$('#modal-them-phieu-nhap').modal('show')">
                <i class="add icon"></i>
                <strong>Thêm mới </strong>
            </button>
        </form>
    </div>
@endsection