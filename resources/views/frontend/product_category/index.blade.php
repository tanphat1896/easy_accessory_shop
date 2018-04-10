@extends('frontend.layouts.master')

@section('title', $productType->getName())

@section('content')
    @include('frontend.product_category.filter')
    <div class="ui basic segment">

        <h2 class="ui dividing header">Sản phẩm: {{ $productType->getName() }}</h2>

        <div class="ui six column computer four column tablet stackable grid">
            @foreach($products as $product)
                <div class="column">
                    <div class="ui fluid link card" onclick="window.location.href='{{ '/chi-tiet/' . $product->slug }}'">
                        <div class="image">
                            @if($product->so_luong > 5)
                                {{--<div class="ui red right corner  label">Mới</div>--}}
                                <div class="ui red right ribbon  label">Mới</div>
                            @endif
                            {{--<div class="ui dimmer">--}}
                            {{--<div class="content">--}}
                            {{--<div class="center">--}}
                            {{--<a class="ui icon inverted button"><i class="cart icon"></i></a>--}}
                            {{--<a class="ui icon inverted button"><i class="eye icon"></i></a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <img class="lazyload" data-src="{{ asset($product->anh_dai_dien) }}">
                        </div>
                        <div class="content">
                            <p>{{ $product->ten_san_pham }}</p>
                            <p class="no-margin"><strong>{{ number_format($product->gia) }} đ</strong>
                                @if ($product->so_luong < 1)
                                    <span class="ui red label">Hết hàng</span>
                                @endif
                                {{--@if (!empty($product->sales()->first()))--}}
                                    {{--<span class="ui small red label"> -{{ $product->sale()->percent() }}%</span>--}}
                                {{--@endif--}}
                            </p>
                            @component('sharing.components.star')
                                {{ $product->diem_danh_gia }}
                            @endcomponent
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="ui basic segment center aligned">
            {{ $products->render('vendor.pagination.smui') }}
        </div>

            
    </div>
@endsection
@push('script')
    <script>
        $("img.lazyload").lazyload();
    </script>
@endpush