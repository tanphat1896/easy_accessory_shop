@extends('admin.layouts.master')

@section('title', 'Chi tiết sản phẩm ')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <a href="{{ route('san_pham.index') }}" class="need-popup" data-content="Danh sách sản phẩm">
                <i class="blue small angle double left circular fitted icon"></i></a>
            {{ $sanPham->getName() }}
            <a href="{{ route('san_pham.edit', [$sanPham->id]) }}" class="ui blue label">
                <i class="edit fitted icon"></i> Sửa
            </a>
        </h3>

        <div class="ui top attached tabular menu">
            <a class="item active" data-tab="first">Thông tin</a>
            <a class="item" data-tab="second">Mô tả sản phẩm</a>
            <a class="item" data-tab="third">Bình luận</a>
            <a class="item" data-tab="four">Ảnh chi tiết ({{ $sanPham->hinhAnhs->count() }})</a>
        </div>


        @include('admin.san_pham.show.tab_thong_tin')

        @include('admin.san_pham.show.tab_bai_viet')

        @include('admin.san_pham.show.tab_comments')

        @include('admin.san_pham.edit.detail_images')

    </div>
@endsection