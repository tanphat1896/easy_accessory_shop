@extends('admin.layouts.master')

@section('title','Chi tiết đơn hàng')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">Chi tiết đơn hàng</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <form action="" method="post">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <button type="submit" class="ui small red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()"
            >
                <i class="delete fitted icon"></i>
                <strong>Xóa </strong>
            </button>
            <button type="button" class="ui small blue button">
                <i class="add fitted icon"></i>
                <strong>Thêm mới </strong>
            </button>

            @include('admin.nhap_hang.san_pham.table')

            <button type="submit" class="ui small red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()"
            >
                <i class="delete fitted icon"></i>
                <strong>Xóa </strong>
            </button>
            <button type="button" class="ui small blue button">
                <i class="add fitted icon"></i>
                <strong>Thêm mới </strong>
            </button>
        </form>

        {{--@include('admin.nhap_hang.index.modals')--}}
    </div>
@endsection