@extends('admin.layouts.master')

@section('title', 'Sửa sản phẩm ')

@section('content')
    @include('admin.layouts.components.error_msg')
    @include('admin.layouts.components.success_msg')

    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
             <a href="{{ route('san_pham.index') }}" class="need-popup" data-content="Danh sách sản phẩm">
                 <i class="small angle double left circular fitted icon"></i></a>
             <a href="{{ route('san_pham.show', [$sanPham->id]) }}"  class="need-popup" data-content="Chi tiết">
                 <i class="small angle left circular fitted icon"></i></a>
            Sửa đổi: {{ $sanPham->getName() }}
        </h3>

        <div class="ui top attached tabular menu">
            <a class="item active" data-tab="first">Thông tin</a>
            <a class="item" data-tab="second">Ảnh chi tiết ({{ $sanPham->hinhAnhs->count() }})</a>
            {{--<a class="item" data-tab="third">Thông số kỹ thuật</a>--}}
        </div>

        @include('admin.san_pham.edit.tab_thong_tin')

        {{--@include('admin.san_pham.edit.tab_thong_so')--}}

        @include('admin.san_pham.edit.tab_anh')
    </div>
@endsection

@push('script')
    <script>
        $('.ui.tabular.menu .item').tab();
    </script>
@endpush