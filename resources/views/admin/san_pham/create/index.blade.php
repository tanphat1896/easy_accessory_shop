@extends('admin.layouts.master')

@section('title', 'Thêm sản phẩm ')

@section('content')
    @include('admin.layouts.components.error_msg')
    @include('admin.layouts.components.success_msg')

    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <a href="{{ route('san_pham.index') }}" class="need-popup" data-content="Danh sách sản phẩm">
                <i class="small angle double left circular fitted icon"></i></a>
            Thêm mới sản phẩm
        </h3>

        <div class="ui top attached tabular menu">
            <a class="item active" data-tab="first">Thông tin</a>
            <a class="item" data-tab="third">Mô tả sản phẩm</a>
        </div>

        @include('admin.san_pham.create.tab_thong_tin')

        @include('admin.san_pham.create.tab_bai_viet')
    </div>
@endsection

@push('script')
    <script>
        $('.ui.tabular.menu .item').tab();
    </script>
@endpush