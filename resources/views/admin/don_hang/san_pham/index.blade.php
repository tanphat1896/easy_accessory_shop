@extends('admin.layouts.master')

@section('title', 'Chi tiết đơn hàng')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <a href="{{ route('don_hang.index') }}" class="need-popup" data-content="Danh sách đơn hàng">
                <i class="blue small angle double left circular fitted icon"></i></a>

            Đơn hàng "{{ $donHang->ma_don_hang }}"

            @if($donHang->tinh_trang == 0)
                <a href="{{ route('duyet_don', [$donHang->id]) }}" class="ui teal label"
                onclick="return confirm('Bạn chắc chắn muốn duyệt đơn hàng này?')">
                    <i class="check open fitted icon"></i>
                    Duyệt
                </a>
                <a href="{{ route('duyet_don', [$donHang->id]) }}" class="ui orange label"
                   onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng?')">
                    <i class="remove open fitted icon"></i>
                    Hủy
                </a>
            @endif

            <a href="{{ URL::previous() }}" class="ui label" style="float: right"><i class="print open fitted icon"></i> In</a>

        </h3>


        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        @include('admin.don_hang.san_pham.thong_tin')
        @include('admin.don_hang.san_pham.table')

        @if($donHang->tinh_trang == 0)
            <a href="{{ route('duyet_don', [$donHang->id]) }}" class="ui teal label"
               onclick="return confirm('Bạn chắc chắn muốn duyệt đơn hàng này?')">
                <i class="check open fitted icon"></i>
                Duyệt
            </a>
            <a href="{{ route('duyet_don', [$donHang->id]) }}" class="ui orange label"
               onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng?')">
                <i class="remove open fitted icon"></i>
                Hủy
            </a>
        @endif
    </div>
@endsection

@push('script')
    <script>
        $('.ui.tabular.menu .item').tab();
    </script>
@endpush