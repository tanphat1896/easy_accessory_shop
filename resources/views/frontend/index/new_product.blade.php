<div class="ui top attached segment">
    <h4 class="ui header">Sản phẩm mới
        <a href="{{ route('product.special', ['new']) }}" class="ui blue label">Xem thêm</a>
    </h4>
</div>
<div class="ui attached segment">
    <div class="ui six column computer four column tablet stackable grid">
        @foreach($newProducts as $plainProduct)
            <div class="column">
                <div class="ui fluid link card center-aligned"
                     onclick="window.location.href='{{ '/chi-tiet/' . $plainProduct->slug }}'">
                    <div class="image">
                        @if (!empty($plainProduct->gia_tri_km))
                            <span class="ui red right ribbon label"> -{{ $plainProduct->gia_tri_km }}%</span>
                        @endif
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
</div>
@push('script')
    <script>
        $("img.lazyload").lazyload();
    </script>
@endpush