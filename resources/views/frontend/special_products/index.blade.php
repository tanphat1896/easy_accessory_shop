@extends('frontend.layouts.master')

@section('title', $name)

@section('content')
    <div class="ui basic segment">

        <h3 class="ui dividing header">{{ $name }}</h3>

        <div class="ui six column computer four column tablet stackable grid" style="min-height: 300px">
            @foreach($products as $plainProduct)
                    <div class="column">
                        <div class="ui fluid link card center-aligned"
                             onclick="window.location.href='{{ '/chi-tiet/' . $plainProduct->slug }}'">
                            <div class="image">
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
                                        <span class="ui basic red small label">
                                            -{{ $plainProduct->gia_tri_km }}%
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

                @if ($products->count() == 0)
                    <div class="sixteen wide column">
                        <h3 class="ui header center aligned">Chưa có chương trình giảm giá nào </h3>
                    </div>
                @endif
        </div>
        <div class="ui basic segment center aligned no-padding">
            {{ $products->render('vendor.pagination.smui') }}
        </div>
    </div>
@endsection
@push('script')
    <script>
        $("img.lazyload").lazyload();
    </script>
@endpush