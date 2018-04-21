@extends('frontend.layouts.master')

@section('title', $productType->getName())

@section('content')
    @include('frontend.product_category.filter')
    <div class="ui basic segment">

        <h3 class="ui dividing header">Sản phẩm: {{ $productType->getName() }}</h3>

        <div class="ui six column computer four column tablet stackable grid">
            @foreach($products as $plainProduct)
                <div class="column">
                    <div class="ui fluid link card center-aligned"
                         onclick="window.location.href='{{ '/chi-tiet/' . $plainProduct->slug }}'">
                        <div class="image">
                            @if (!empty($plainProduct->gia_tri_km))
                                <span class="ui red right ribbon label"> -{{ $plainProduct->gia_tri_km }}%</span>
                            @elseif($plainProduct->so_luong > 5)
                                {{--<div class="ui red right corner  label">Mới</div>--}}
                                <div class="ui red right ribbon label">Mới</div>
                            @endif
                            {{--<div class="ui dimmer">--}}
                            {{--<div class="content">--}}
                            {{--<div class="center">--}}
                            {{--<a class="ui icon inverted button"><i class="cart icon"></i></a>--}}
                            {{--<a class="ui icon inverted button"><i class="eye icon"></i></a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <img class="lazyload" data-src="{{ asset($plainProduct->anh_dai_dien) }}">
                        </div>

                        <div class="content">

                            <p>{{ $plainProduct->ten_san_pham }}</p>

                            <p class="no-margin">

                                @if (!empty($plainProduct->gia_tri_km))
                                    <span class="old-price">{{ number_format($plainProduct->gia) }}đ</span>
                                    <span class="new-price">
                                        <strong>{{ number_format($plainProduct->gia*(1 - (float)$plainProduct->gia_tri_km/100)) }}đ</strong>
                                    </span>
                                @else
                                    <strong>{{ number_format($plainProduct->gia) }}đ</strong>
                                @endif

                                @if ($plainProduct->so_luong < 1)
                                    <span class="ui red label">Hết hàng</span>
                                @endif

                            </p>
                            @component('sharing.components.star')
                                {{ $plainProduct->diem_danh_gia }}
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