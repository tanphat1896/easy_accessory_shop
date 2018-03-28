@extends('admin.layouts.master')

@section('title', 'Chi tiết sản phẩm ')

@section('content')
    <h3 class="ui dividing header">
        <a href="{{ route('san_pham.index') }}" class="ui blue label"><i class="left chevron icon"></i> Trở lại</a>
        {{ $sanPham->getName() }}
    </h3>

    <div class="ui top attached tabular menu">
        <a class="item active" data-tab="first">Thông tin</a>
        <a class="item" data-tab="second">Mô tả sản phẩm</a>
    </div>

    @include('admin.san_pham_chi_tiet.tab_thong_tin')
    @include('admin.san_pham_chi_tiet.tab_bai_viet')
@endsection

@push('script')
    <script>
        $('.ui.tabular.menu .item').tab();
    </script>
@endpush