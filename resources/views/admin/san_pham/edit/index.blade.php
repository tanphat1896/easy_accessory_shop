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

        <form action="{{ route('san_pham.update', [$sanPham->id]) }}" method="post" enctype="multipart/form-data"
              class="ui form static" id="form-thong-tin-san-pham">

            <div class="ui top attached tabular menu">
                <a class="item active" data-tab="first">Thông tin</a>
                <a class="item" data-tab="third">Mô tả sản phẩm</a>
            </div>

            @include('admin.san_pham.edit.tab_thong_tin')

            @include('admin.san_pham.edit.tab_bai_viet')
        </form>


    </div>
@endsection